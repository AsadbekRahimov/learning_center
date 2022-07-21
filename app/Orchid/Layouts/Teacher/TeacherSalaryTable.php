<?php

namespace App\Orchid\Layouts\Teacher;

use App\Models\Expense;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TeacherSalaryTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'salary';
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('price', 'Tolangan pul miqdori')->render(function (Expense $expense) {
                return number_format($expense->price);
            }),
            TD::make('created_at', 'Sanasi')->render(function (Expense $expense) {
                return $expense->created_at->format('Y-m-d');
            })
        ];
    }
}
