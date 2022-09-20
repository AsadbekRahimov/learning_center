<?php

namespace App\Orchid\Layouts\Teacher;

use App\Models\Lesson;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TeacherLessonsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'lessons';
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $groups = Cache::get('groups');
        return [
            TD::make('group_id', 'Gurux')->render(function (Lesson $lesson) use ($groups) {
                return Link::make($groups[$lesson->group_id])->route('platform.groupInfo', ['group' => $lesson->group_id]);
            }),
            TD::make('date', 'Sana'),
            TD::make('attand', 'Davomat soni')->render(function (Lesson $lesson) {
                return $lesson->attand_count();
            }),
            TD::make('percent', 'Davomat foizi')->render(function (Lesson $lesson) {
                return $lesson->attand_percent();
            }),
            TD::make('payment', 'Dars to\'lovi')->render(function (Lesson $lesson) {
                return number_format($lesson->payment);
            }),
        ];
    }
}
