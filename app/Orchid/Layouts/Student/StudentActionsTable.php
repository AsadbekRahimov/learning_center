<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Action;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentActionsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'student_actions';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('price', 'Pul miqdori')->render(function (Action $action) {
                return number_format($action->price);
            })->filter(Input::make('price')->type('number')),
            TD::make('type', 'Xarakat turi')->render(function (Action $action) {
                return Action::TYPES[$action->type];
            }),
            TD::make('desc', 'Tasnifi'),
        ];
    }
}
