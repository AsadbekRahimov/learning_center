<?php

namespace App\Orchid\Screens\Teacher;

use App\Models\Expense;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Teacher;
use App\Orchid\Layouts\PaymentSelection;
use App\Orchid\Layouts\Teacher\PaymentGroupTable;
use App\Orchid\Layouts\Teacher\TeacherGroupsTable;
use App\Orchid\Layouts\Teacher\TeacherLessonsTable;
use App\Orchid\Layouts\Teacher\TeacherSalaryTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
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
        if (\request()->has('month')){
            $date = explode('-', \request()->get('month'));
            $year = (int) $date[0];
            $month = (int) $date[1];
            $payment = Payment::select('group_id', DB::raw('sum(sum) as sum'))->with(['group.teacher'])
                ->whereIn('group_id', $teacher->groups->pluck('id')->toArray())
                ->where('status', 'paid')
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->groupBy('group_id')->get();
        } else {
            $payment = collect();
        }
        return [
            'payment' => $payment,
            'teacher' => $teacher,

            'metrics' => [
                'salary' => number_format(Expense::query()->where('teacher_id', $teacher->id)->sum('price')),
                'percent' => $teacher->percent,
                'lessons' => Lesson::query()->where('teacher_id', $teacher->id)->count(),
                'tasks' => ['value' => 4, 'diff' => 34],
            ],

            'salary' => Expense::query()->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
            'lessons' => Lesson::query()->with(['attandances'])->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
            'groups' => Group::query()->with(['students', 'teacher'])->where('teacher_id', $teacher->id)->paginate(10),
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
            Link::make('Taxrirlash')
                ->icon('settings')
                ->canSee(Auth::user()->hasAccess('platform.teachers'))
                ->href('/admin/crud/edit/teacher-resources/' . $this->teacher->id),
            Button::make('Oylik ajiratish')
                ->icon('dollar')
                ->method('giveMonthlySalary')
                ->parameters([
                    'teacher_id' => $this->teacher->id,
                    'date' => \request()->has('month') ? \request()->get('month') : null,
                ])->confirm('Siz rostdan xam ' . $this->teacher->name . ' uchun oylik maosh bermoqchimisiz?'),
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
                'Foiz' => 'metrics.percent',
                'O\'tilgan darslari' => 'metrics.lessons',
                'Vazifa' => 'metrics.tasks',
            ]),
            PaymentSelection::class,
            Layout::tabs([
                'Guruxlari' => TeacherGroupsTable::class,
                'Oylik to\'lovlari' => TeacherSalaryTable::class,
                'O\'tilgan darslari' => TeacherLessonsTable::class,
                //'Vazifalar' => TeacherTasksTable::class,
            ])->canSee(!\request()->has('month')),
            Layout::tabs([
                'Guruxlari' => PaymentGroupTable::class,
            ])->canSee(\request()->has('month')),
        ];
    }

    public function teacherSalary(Request $request)
    {
        $group = Group::query()->with(['payments', 'teacher'])->find($request->id);
        $this->giveSalary($group);
    }

    public function giveMonthlySalary(Request $request)
    {
        if (is_null($request->ids))
        {
            Alert::error('Kamida 1 ta gurux tanlangan bo\'lishi kerak!');
        } else {
            $teacher = Teacher::query()->find($request->teacher_id);
            $ids = $request->ids;
            $groups = $this->getGroups($ids);
            if(is_null($request->date))
                $message = $this->giveSalaries($groups, $teacher);
            else
                $message = $this->giveSalariesByMonth($groups, $teacher, explode('-', $request->date));
            $message ? Alert::success($message) : Alert::warning('Oylik uchun mablag\' yetarli emas');
        }
    }

    private function giveSalary(Group $group)
    {
        $salary = $group->salary() * $group->teacher->percent / 100;
        if ($salary != 0)
        {
            Expense::giveSalary($group, $salary);
            $this->teacherPayment($group, date('Y'), date('m'));
            $message = $group->teacher->name . ' uchun ' . number_format($salary) . ' so\'m maosh berildi.';
            Alert::success($message);
        } else {
            Alert::error('Oylik uchun mablag\' yetarli emas');
        }
    }


    private function giveSalaries($groups, $teacher)
    {
        $message = '';
        $salary = 0;
        $group_names = '';
        foreach ($groups as $key => $group)
        {
            $group_salary = $group->salary();
            if($key == 0)
                $message .= $group->teacher->name;

            if ($group_salary) {
                if($salary)
                    $group_names .= ', ' . $group->name;
                else
                    $group_names .= $group->name;
                $salary += $group_salary * $group->teacher->percent / 100;
            }
            $this->teacherPayment($group, date('Y'), date('m'));
        }

        if ($salary) {
            Expense::giveSalaries($teacher, $salary, $group_names, date('Y'), date('m'));
            $message .= ' uchun ' . number_format($salary) . ' so\'m maosh berildi.';
        } else {
            $message = 0;
        }
        return $message;
    }

    private function giveSalariesByMonth($groups, $teacher, $date)
    {
        $message = '';
        $salary = 0;
        $group_names = '';

        $year = $date[0];
        $month = $date[1];

        foreach ($groups as $key => $group)
        {
            $group_salary = $group->payments()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('status', 'paid')->sum('sum');

            if($key == 0)
                $message .= $group->teacher->name;

            if ($group_salary) {
                if($salary)
                    $group_names .= ', ' . $group->name;
                else
                    $group_names .= $group->name;
                $salary += $group_salary * $group->teacher->percent / 100;
            }
            $this->teacherPayment($group, $year, $month);
        }

        if ($salary) {
            Expense::giveSalaries($teacher, $salary, $group_names, $year, $month);
            $message .= ' uchun ' . number_format($salary) . ' so\'m maosh berildi.';
        } else {
            $message = 0;
        }
        return $message;
    }

    private function getGroups($ids)
    {
        $groups = [];
        foreach ($ids as $id)
        {
            $groups[] = (int)$id;
        }
        return Group::query()->with(['teacher'])->whereIn('id', $groups)->get();
    }

    private function teacherPayment(Group $group, $year, $month)
    {
        $group->payments()
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('status', 'paid')
            ->update([
                'status' => 'teacher_paid',
            ]);
    }
}
