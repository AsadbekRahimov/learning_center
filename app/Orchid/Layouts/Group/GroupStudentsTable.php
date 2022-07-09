<?php

namespace App\Orchid\Layouts\Group;

use App\Models\Student;
use App\Models\StudentGroup;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class GroupStudentsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'students';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */

    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Ism')->render(function (StudentGroup $student) {
                return Link::make($student->student->name)->route('platform.addStudentToGroup', ['student' => $student->student_id]);
            })->cantHide(),
            TD::make('balance', 'Hisob')->render(function (StudentGroup $student) {
                return Button::make(number_format($student->student->balance))->type(Color::SUCCESS())
                    ->canSee($student->student->balance > 0)->disabled();
            })->cantHide(),
            TD::make('debt', 'Qarz')->render(function (StudentGroup $student) {
                return Button::make(number_format($student->student->debt))->type(Color::DANGER())
                    ->canSee($student->student->debt > 0)->disabled();
            })->cantHide(),
            TD::make('lesson_limit', 'Dars limit')->cantHide(),
            TD::make('attand', 'Davomat soni')->render(function (StudentGroup $student) {
                return $student->attand_count();
            })->cantHide(),
            TD::make('attand', 'Davomat foizi')->render(function (StudentGroup $student) {
                return $student->attand_percent();
            })->cantHide(),
            TD::make('status', 'Ta\'lim bosqichi')->render(function (StudentGroup $studentGroup){
                return Button::make(Student::STATUS[$studentGroup->student->status])
                    ->type($studentGroup->student->status == 'stopped' ? Color::DANGER() : Color::DEFAULT())->disabled();
            })->cantHide()
        ];
    }
}
