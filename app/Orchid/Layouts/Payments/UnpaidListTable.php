<?php

namespace App\Orchid\Layouts\Payments;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class UnpaidListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'unpaid';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->sort(),
            TD::make('student_id', 'Talaba')->render(function (Payment $payment) {
                return Link::make($payment->student->name . ' ' . $payment->student->surname)
                    ->route('platform.addStudentToGroup', ['student' => $payment->student_id]);
            })->cantHide(),
            TD::make('group_id', 'Gurux')->render(function (Payment $payment) {
                return Link::make($payment->group->name)->route('platform.groupInfo', ['group' => $payment->group_id]);
            })->filter(Select::make('group_id')->fromQuery(Group::query()->where('branch_id', Auth::user()->branch_id), 'name'))->cantHide(),
            TD::make('privilege', 'Saxovat')->render(function (Payment $payment) {
                return Link::make('')->icon('star')->type(Color::WARNING())->canSee($payment->student->privilege);
            })->sort()->filter(CheckBox::make()->title('Saxovat talabasi')->sendTrueOrFalse())->cantHide(),
            TD::make('sum', 'Summasi')->render(function (Payment $payment) {
                return number_format($payment->sum);
            })->sort()->filter(Input::make('sum')->type('number'))->cantHide(),
            TD::make('type', 'To\'lov turi')->render(function (Payment $payment) {
                return Payment::TYPES[$payment->type];
            })->filter(Select::make('type')->options(Payment::TYPES))->cantHide(),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function (Payment $payment) {
                    return $payment->branch->name;
                })->canSee(Auth::user()->branch_id ? false : true)->cantHide(),
            TD::make('created_at', 'Sana')->render(function (Payment $payment) {
                return $payment->created_at->format('Y-m-d');
            }),
        ];
    }
}
