<?php

namespace App\Orchid\Layouts\Group;

use App\Models\Attandance;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class GroupAttandTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attand';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */

    protected function columns(): iterable
    {
        return [
            TD::make('student_id', 'Talaba')->render(function (Attandance $attandance) {
                return Link::make($attandance->student->name)->route('platform.addStudentToGroup', ['student' => $attandance->student_id]);
            })->cantHide(),
            TD::make('attand', 'Davomat')->render(function (Attandance $attandance) {
                return Button::make(Attandance::STATUS[$attandance->attand])
                    ->method('notComing')->type($attandance->attand ? Color::SUCCESS() : Color::DANGER())->parameters([
                        'id' => $attandance->id,
                    ])->disabled(in_array($attandance->attand, [0, 2]));
            })->cantHide(),
        ];
    }
}
