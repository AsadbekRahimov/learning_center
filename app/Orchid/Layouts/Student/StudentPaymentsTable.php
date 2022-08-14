<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Group;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Select;
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
            TD::make('created_at', 'Sana')->render(function (Payment $payment) {
                return $payment->created_at->format('Y-m-d');
            }),
            TD::make('payment', 'Kvitansiya')->render(function (Payment $payment) {
                return Link::make('')->icon('printer')
                    ->route('checkPrint', ['id' => $payment->id])
                    ->target('_blank');
            })
        ];
    }
}
