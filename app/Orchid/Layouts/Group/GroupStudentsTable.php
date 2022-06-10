<?php

namespace App\Orchid\Layouts\Group;

use App\Models\StudentGroup;
use Orchid\Screen\Actions\Button;
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

    protected $title = "Guruxdagi talabalar ro'yhati";

    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Ism')->render(function (StudentGroup $student) {
                    return $student->student->name;
            })->cantHide(),
            TD::make('balance', 'Hisob')->render(function (StudentGroup $student) {
                return Button::make($student->student->balance)->method('none')->type(Color::SUCCESS())->canSee($student->student->balance > 0);
            })->cantHide(),
            TD::make('debt', 'Qarz')->render(function (StudentGroup $student) {
                return Button::make($student->student->debt)->type(Color::DANGER())->canSee($student->student->debt > 0);
            })->cantHide(),
            TD::make('lesson_limit', 'Dars limit')->cantHide(),
        ];
    }
}
