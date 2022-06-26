<?php

namespace App\Orchid\Screens\Payment;

use App\Models\Payment;
use App\Orchid\Layouts\Payments\PaymentsListTable;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;

class PaymentsListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'payments' => Payment::query()->with(['student'])->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
            })->filters()->defaultSort('id', 'desc')->with(['branch'])->paginate(15),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'To\'lovlar';
    }

    public function description(): ?string
    {
        return 'Talabalaring qilgan tolovlari ro\'yhati';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.payments'
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PaymentsListTable::class,
        ];
    }
}
