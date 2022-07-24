<?php

namespace App\Orchid\Layouts\Teacher;

use App\Models\Group;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TeacherGroupsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'groups';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Gurux')->render(function (Group $group) {
                return Link::make($group->name)->route('platform.groupInfo', ['group' => $group->id]);
            }),
            TD::make('subject_id', 'Fan')->render(function (Group $group) {
                return $group->subject->name;
            }),
            TD::make('students_count', 'O\'quvchilar soni')->render(function (Group $group) {
                return $group->students->count();
            })
        ];
    }
}
