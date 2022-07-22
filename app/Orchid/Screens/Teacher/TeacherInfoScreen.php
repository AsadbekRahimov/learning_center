<?php

namespace App\Orchid\Screens\Teacher;

use App\Models\Expense;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Orchid\Layouts\Teacher\TeacherLessonsTable;
use App\Orchid\Layouts\Teacher\TeacherSalaryTable;
use App\Orchid\Layouts\Teacher\TeacherTasksTable;
use Orchid\Screen\Screen;
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
                'salary' => Expense::query()->where('teacher_id', $teacher->id)->count(),
                'balance' => $teacher->balance,
                'percent' => $teacher->percent,
                'lessons' => Lesson::query()->where('teacher_id', $teacher->id)->count(),
                'tasks' => ['value' => 4, 'diff' => 34], // TODO add tasks part
            ],

            'salary' => Expense::query()->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
            'lessons' => Lesson::query()->with(['group'])->where('teacher_id', $teacher->id)->orderByDesc('id')->paginate(10),
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
        return [];
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
                'Oylik to\'lovlari' => TeacherSalaryTable::class,
                'Otilgan darslari' => TeacherLessonsTable::class,
                //'Vazifalar' => TeacherTasksTable::class,
            ]),
        ];
    }
}
