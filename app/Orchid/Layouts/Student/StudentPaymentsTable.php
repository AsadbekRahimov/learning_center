<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Payment;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentPaymentsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'payments';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('sum', 'To\'lov miqdori')->render(function (Payment $payment) {
                return number_format($payment->sum);
            }),
            TD::make('type', 'To\'lov turi')->render(function (Payment $payment) {
                return Payment::TYPES[$payment->type];
            }),
            TD::make('created_at', 'Sana')->render(function (Payment $payment) {
                return $payment->created_at->format('Y-m-d');
            }),
        ];
    }
}
