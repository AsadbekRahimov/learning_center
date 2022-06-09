<?php

namespace App\Orchid\Layouts\Student;

use App\Models\StudentGroup;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentGroupsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'student_groups';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('group_id', 'Gurux')->render(function (StudentGroup $student_groups) {
                return $student_groups->group->name;
            }),
            TD::make('subject', 'Fan')->render(function (StudentGroup $student_groups) {
                return $student_groups->group->subject->name;
            }),
            TD::make('lesson_limit', 'Dars limit'),
            TD::make('Amallar')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (StudentGroup $student_groups) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Button::make('Guruxdan chiqarish')
                                ->icon('action-undo')
                                ->confirm('Siz rostdan ham ushbu foydalanuvchini o`chirmoqchimisiz?')
                                ->method('deleteFromGroup', [
                                    'id' => $student_groups->id,
                                ]),
                        ]);
                }),
        ];
    }
}
