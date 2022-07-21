<?php

namespace App\Orchid\Layouts\Teacher;

use App\Models\Lesson;
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
        return [
            TD::make('date', 'Sana'),
            TD::make('attand', 'Davomat soni')->render(function (Lesson $lesson) {
                return $lesson->attand_count();
            }),
            TD::make('percent', 'Davomat foizi')->render(function (Lesson $lesson) {
                return $lesson->attand_percent();
            })
        ];
    }
}
