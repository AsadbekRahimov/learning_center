<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

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
            TD::make('type', 'Xarakat turi')->render(function (Action $action) {
                return Action::TYPES[$action->type];
            }),
            TD::make('price', 'Summasi')->render(function (Action $action) {
                return $action->price ? Link::make(number_format($action->price))
                    ->type($action->action === '1' ? Color::SUCCESS() : Color::DANGER()) : '';
            }),
            TD::make('created_at', 'Sana')->render(function (Action $action) {
                return $action->created_at->format('Y-m-d');
            }),
            TD::make('desc', 'Tasnifi'),
        ];
    }
}
