<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Payment;
use Orchid\Screen\Actions\Link;
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
            TD::make('group_id', 'Gurux')->render(function (Payment $payment) {
                return Link::make($payment->group->name)->route('platform.groupInfo', ['group' => $payment->group_id]);
            })->cantHide(),
            TD::make('sum', 'To\'lov miqdori')->render(function (Payment $payment) {
                return number_format($payment->sum);
            })->filter(TD::FILTER_NUMERIC),
            TD::make('type', 'To\'lov turi')->render(function (Payment $payment) {
                return $payment->type ? Payment::TYPES[$payment->type] : '';
            }),
            TD::make('created_at', 'To\'lov oyi')->render(function (Payment $payment) {
                return $payment->created_at->format('Y-m');
            }),
            TD::make('updated_at', 'To\'langan sana')->render(function (Payment $payment) {
                return $payment->updated_at->format('Y-m-d');
            }),
            TD::make('payment', 'Kvitansiya')->render(function (Payment $payment) {
                return Link::make('')->icon('printer')
                    ->route('checkPrint', ['id' => $payment->id])
                    ->target('_blank');
            })
        ];
    }
}
