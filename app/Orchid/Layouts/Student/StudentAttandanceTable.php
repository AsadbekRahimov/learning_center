<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Attandance;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentAttandanceTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attandances';
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('created_at', 'Sana')->render(function (Attandance $attandance) {
                return $attandance->created_at->format('Y-m-d');
            }),
            TD::make('lesson_id', 'Gurux')->render(function (Attandance $attandance) {
                 // return $attandance->lesson->group->name;
                return Link::make($attandance->lesson->group->name)->route('platform.groupInfo', ['group' => $attandance->lesson->group_id]);
            }),
            TD::make('attand', 'Davomat')->render(function (Attandance $attandance) {
                return $attandance->attand ? 'Bor' : 'Yo\'q';
            })
        ];
    }
}
