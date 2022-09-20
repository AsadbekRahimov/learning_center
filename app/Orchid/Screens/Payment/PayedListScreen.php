<?php

namespace App\Orchid\Screens\Payment;

use App\Models\Payment;
use App\Orchid\Layouts\Payments\PaidListTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PayedListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'paid' => Payment::query()->with(['branch'])
                ->whereIn('status', ['paid', 'teacher_paid'])
                ->when(Auth::user()->branch_id, function ($query){
                    return $query->where('branch_id', Auth::user()->branch_id);
                })->filters()->defaultSort('updated_at', 'desc')->paginate(15),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Qilingan to\'lovlar';
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
            PaidListTable::class,
            Layout::modal('fullPaymentModal', [
                Layout::rows([
                    Select::make('type')->title('To\'lov turi') ->options(Payment::TYPES)->required(),
                ]),
            ])->title('To\'liq to\'lov qilish')->applyButton('To\'lash')->closeButton('Yopish'),

            Layout::modal('partPaymentModal', [
                Layout::rows([
                    Input::make('sum')->title('To\'lov miqdori')->type('number')->required(),
                    Select::make('type')->title('To\'lov turi')->options(Payment::TYPES)->required(),
                ]),
            ])->title('Qisman to\'lov qilish')->applyButton('To\'lash')->closeButton('Yopish')
        ];
    }

    public function fullPayment(Request $request)
    {
        Payment::find($request->id)->pay($request->type);
        Alert::success('To\'lov muaffaqiyatli amalga oshirildi');
    }

    public function partPayment(Request $request)
    {
        $payment = Payment::find($request->id);

        if ((int)$request->sum > $payment->sum) {
            Alert::error('Kiritilayotgan summa to\'lov summasidan ko\'p');
        } elseif((int)$request->sum == $payment->sum) {
            $payment->pay($request->type);
            Alert::success('To\'lov muaffaqiyatli amalga oshirildi');
        } else {
            $sum = $payment->sum - $request->sum;
            $payment->partPayment($request->sum, $request->type);
            $payment->update(['sum' => $sum]);
            Alert::success('To\'lov muaffaqiyatli amalga oshirildi');
        }
    }
}
