<?php

namespace App\Orchid\Screens;

use App\Models\Payment;
use App\Orchid\Layouts\Payments\PaymentsListTable;
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
            'payments' => Payment::query()->defaultSort('id', 'desc')->paginate(15),
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
