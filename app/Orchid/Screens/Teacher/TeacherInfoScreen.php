<?php

namespace App\Orchid\Screens\Teacher;

use App\Models\Expense;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Orchid\Layouts\Teacher\TeacherGroupsTable;
use App\Orchid\Layouts\Teacher\TeacherLessonsTable;
use App\Orchid\Layouts\Teacher\TeacherSalaryTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class TeacherInfoScreen extends Screen
{
    public $teacher;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Teacher $teacher): iterable
    {
        return [
            'teacher' => $teacher,

            'metrics' => [
                'salary' => number_format(Expense::query()->where('teacher_id', $teacher->id)->sum('price')),
                'balance' => number_format($teacher->balance),
                'percent' => $teacher->percent,
                'lessons' => Lesson::query()->where('teacher_id', $teacher->id)->count(),
                'tasks' => ['value' => 4, 'diff' => 34], // TODO add tasks part
            ],

            'salary' => Expense::query()->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
            'lessons' => Lesson::query()->with(['group', 'attandances'])->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
            'groups' => Group::query()->with(['subject', 'students', 'teacher'])->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
        ];
    }

    public function description(): ?string
    {
        return 'Filial: ' . $this->teacher->branch->name;
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->teacher->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Oylik ajiratish')
                ->modal('teacherSalaryModal')
                ->method('teacherSalary')
                ->icon('dollar')
                ->parameters([
                    'teacher_id' => $this->teacher->id,
                    'teacher' => $this->teacher->name,
                    'branch_id' => $this->teacher->branch_id,
                ])->canSee(Auth::user()->hasAccess('platform.giveSalary')),
            Link::make('Taxrirlash')
                ->icon('settings')
                ->canSee(Auth::user()->hasAccess('platform.teachers'))
                ->href('/admin/crud/edit/teacher-resources/' . $this->teacher->id),
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.teacherInfo'
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'To\'lov' => 'metrics.salary',
                'Hisob' => 'metrics.balance',
                'Foiz' => 'metrics.percent',
                'Dars' => 'metrics.lessons',
                'Vazifa' => 'metrics.tasks',
            ]),
            Layout::tabs([
                'Guruxlari' => TeacherGroupsTable::class,
                'Oylik to\'lovlari' => TeacherSalaryTable::class,
                'O\'tilgan darslari' => TeacherLessonsTable::class,
                //'Vazifalar' => TeacherTasksTable::class,
            ]),

            Layout::modal('teacherSalaryModal', [
                Layout::rows([
                    Input::make('price')->type('number')->title('Moqdori')->required(),
                ]),
            ])->title('Oylik ajiratish')->applyButton('Ajiratish')->closeButton('Yopish'),
        ];
    }

    public function teacherSalary(Request $request)
    {
        Expense::giveSalary($request);
        $teacher = Teacher::query()->find($request->teacher_id);
        $teacher->balance -= $request->price;
        $teacher->save();
        $message = $teacher->name . ' uchun ' . $request->price . ' som maosh berildi.';
        Alert::success($message);
    }
}
