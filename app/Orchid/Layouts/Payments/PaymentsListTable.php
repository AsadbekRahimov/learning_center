<?php

namespace App\Orchid\Layouts\Payments;

use App\Models\Payment;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PaymentsListTable extends Table
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
            TD::make('id', 'ID'),
            TD::make('student', 'Talaba')->render(function (Payment $payment) {
                return Link::make($payment->student->name)
                    ->route('platform.addStudentToGroup', ['student' => $payment->student_id]);
            })->cantHide(),
            TD::make('sum', 'Summasi')->render(function (Payment $payment) {
                return number_format($payment->sum);
            })->cantHide(),
            TD::make('type', 'To\'lov turi')->render(function (Payment $payment) {
                return Payment::TYPES[$payment->type];
            })->cantHide(),
        ];
    }
}
