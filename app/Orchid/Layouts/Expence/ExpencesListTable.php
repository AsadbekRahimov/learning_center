<?php

namespace App\Orchid\Layouts\Expence;

use App\Models\Branch;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ExpencesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'expenses';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $teachers = Cache::get('teachers');
        return [
            TD::make('price', 'Summasi')->render(function (Expense $expense) {
                 return number_format($expense->price);
            })->filter(Input::make()->type('number')),
            TD::make('teacher_id', 'O\'qituvchi')->render(function (Expense $expense) use ($teachers) {
                return $expense->teacher_id ? $teachers[$expense->teacher_id] : '';
            })->filter(Select::make('teacher_id')->options($teachers)->empty('')),
            TD::make('type', 'Turi')->render(function (Expense $expense) {
                return Expense::TYPE[$expense->type];
            })->filter(Select::make()->options(Expense::TYPE)->empty('')),
            TD::make('created_at', 'Sanasi')->render(function (Expense $expense) {
                return $expense->created_at->format('Y-m-d H:i');
            }),
            TD::make('desc', 'Tasnifi')->filter(Input::make()->type('text')),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function (Expense $expense) {
                    return $expense->branch->name;
                })->canSee(Auth::user()->branch_id ? false : true)->cantHide(),
        ];
    }
}
