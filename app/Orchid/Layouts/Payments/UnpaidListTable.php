<?php

namespace App\Orchid\Layouts\Payments;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
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
        $students = Cache::get('students');
        $privilege = Cache::get('privilege');
        $groups = Cache::get('groups');
        return [
            TD::make('id', 'ID')->sort(),
            TD::make('student_id', 'Talaba')->render(function (Payment $payment) use ($students) {
                return Link::make($students[$payment->student_id])
                    ->route('platform.addStudentToGroup', ['student' => $payment->student_id]);
            })->filter(Select::make('student_id')->options($students)->empty('',''))->cantHide(),
            TD::make('group_id', 'Gurux')->render(function (Payment $payment) use ($groups) {
                return Link::make($groups[$payment->group_id])->route('platform.groupInfo', ['group' => $payment->group_id]);
            })->filter(Select::make('group_id')->fromQuery(Group::query()->where('branch_id', Auth::user()->branch_id), 'name')->empty(''))->cantHide(),
            TD::make('privilege', 'Saxovat')->render(function (Payment $payment) use ($privilege) {
                return Link::make('')->icon('star')->type(Color::WARNING())->canSee($privilege[$payment->student_id]);
            })->sort()->filter(CheckBox::make()->title('Saxovat talabasi')->sendTrueOrFalse())->defaultHidden(),
            TD::make('sum', 'Summasi')->render(function (Payment $payment) {
                return number_format($payment->sum);
            })->sort()->filter(Input::make('sum')->type('number'))->cantHide(),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function (Payment $payment) {
                    return $payment->branch->name;
                })->canSee(Auth::user()->branch_id ? false : true)->defaultHidden(),
            TD::make('created_at', 'To\'lov oyi')->render(function (Payment $payment) {
                return $payment->created_at->format('Y-m');
            })->defaultHidden(),
            TD::make('Amallar')->align(TD::ALIGN_CENTER)->width('100px')
                ->render(function (Payment $payment) {
                    return DropDown::make()->icon('options-vertical')->list([
                        ModalToggle::make('To\'liq to\'lov')->icon('dollar')
                            ->modal('fullPaymentModal')
                            ->method('fullPayment')
                            ->parameters([
                                'id' => $payment->id
                            ]),
                        ModalToggle::make('Qisman to\'lov')->icon('euro')
                            ->modal('partPaymentModal')
                            ->method('partPayment')
                            ->parameters([
                                'id' => $payment->id
                            ]),
                    ]);
                }),
        ];
    }
}
