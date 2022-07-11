<?php

namespace App\Orchid\Screens\Expence;

use App\Models\Expense;
use App\Orchid\Layouts\Expence\ExpencesListTable;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;

class ExpencesInfoScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'expenses' => Expense::query()->with(['branch'])->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
            })->filters()->defaultSort('id', 'desc')->paginate(15),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Chiqimlar';
    }

    public function description(): ?string
    {
        return 'Markazning chiqimlar ro\'yhati';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.expenses'
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ExpencesListTable::class,
        ];
    }
}
