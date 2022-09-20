<?php

namespace App\Orchid\Layouts\Student;

use App\Models\StudentGroup;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentGroupsTable extends Table
{
    protected $branch;
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
        $groups = Cache::get('groups');
        $subjects = Cache::get('subjects');
        return [
            TD::make('group_id', 'Gurux')->render(function (StudentGroup $student_groups) use ($groups) {
                return Link::make($groups[$student_groups->group_id])->route('platform.groupInfo', ['group' => $student_groups->group_id]);
            }),
            TD::make('subject', 'Fan')->render(function (StudentGroup $student_groups) use ($subjects) {
                return $subjects[$student_groups->group->subject_id];
            }),
            TD::make('price', 'Kurs narxi')->render(function (StudentGroup $student_groups) {
                return is_null($student_groups->price) ? number_format($student_groups->group->subject->price) :
                    number_format($student_groups->price) . " | <del> " . number_format($student_groups->group->subject->price) . " </del>";
            }),
            TD::make('lesson_limit', 'Dars limit')->render(function (StudentGroup $student_groups) {
                return $student_groups->student->branch->payment_period === 'daily' ? $student_groups->lesson_limit : '---';
            }),
            TD::make('Amallar')->align(TD::ALIGN_CENTER)->width('100px')
                ->render(function (StudentGroup $student_groups) {
                    return DropDown::make()->icon('options-vertical')->list([
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
