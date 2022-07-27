<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Branch;
use App\Models\Discount;
use App\Models\Expense;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TemporaryGroup;
use App\Orchid\Layouts\Charts\DiscountChart;
use App\Orchid\Layouts\Charts\ExpenseChart;
use App\Orchid\Layouts\Charts\PaymentChart;
use App\Orchid\Layouts\Charts\SourceChart;
use App\Orchid\Layouts\StatisticListener;
use App\Orchid\Layouts\StatisticSelection;
use App\Orchid\Layouts\Student\NewStudentsTable;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    public $custom_stat;
    public $branch_user;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->branch_user = Auth::user()->branch_id ? true : false;
        $payments = Payment::query()->when(Auth::user()->branch_id, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        });
        $expenses = Expense::query()->when(Auth::user()->branch_id, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        });
        $debts = Student::query()->when(Auth::user()->branch_id, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        })->sum('debt');

        $teacher_balance = Teacher::query()->sum('balance');

        if (!request()->has('begin')) {
            $this->custom_stat = null;
        } else {
            $begin = request()->get('begin') . ' 00:00:00';
            $end = request()->get('end') . ' 23:59:59';
            $this->custom_stat = [
                'payments'    => number_format((int)Payment::query()->when(Auth::user()->branch_id, function ($query){
                         return $query->where('branch_id', Auth::user()->branch_id);
                    })->whereBetween('created_at', [$begin, $end])->sum('sum')),
                'expenses' => number_format((int)Expense::query()->when(Auth::user()->branch_id, function ($query){
                         return $query->where('branch_id', Auth::user()->branch_id);
                    })->whereBetween('created_at', [$begin, $end])->sum('price')),
                'new_students' => (int)Student::query()->when(Auth::user()->branch_id, function ($query){
                    return $query->where('branch_id', Auth::user()->branch_id);
                })->whereBetween('created_at', [$begin, $end])->count(),
            ];
        }
        return [
            'statistic' => [
                    'all' => [
                        'debts'   => number_format((int)$debts),
                        'all_students' => Student::query()->when(Auth::user()->branch_id, function ($query){
                            return $query->where('branch_id', Auth::user()->branch_id);
                        })->count(),
                        'all_groups' => Group::query()->when(Auth::user()->branch_id, function ($query){
                            return $query->where('branch_id', Auth::user()->branch_id);
                        })->count(),
                        'teachers_balance' => number_format((int)$teacher_balance),
                    ],
                    'year' => [
                        'payments'    => number_format((int)$payments->whereYear('created_at', date('Y'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereYear('created_at', date('Y'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereYear('created_at', date('Y'))->count(),
                    ],

                    'month' => [
                        'payments'    => number_format((int)$payments->whereMonth('created_at', date('m'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereMonth('created_at', date('m'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereMonth('created_at', date('m'))->count(),
                    ],

                    'day' => [
                        'payments'    => number_format((int)$payments->whereDay('created_at', date('d'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereDay('created_at', date('d'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereDay('created_at', date('d'))->count(),
                    ],

                    'custom' => $this->custom_stat,
            ],
            'source' => [ (request()->has('begin')) ? ChartService::sourceChart($begin, $end) : ChartService::sourceChart() ],
            'payments' => [ (request()->has('begin')) ? ChartService::paymentChart($begin, $end) : ChartService::paymentChart()],
            'discounts' => [ (request()->has('begin')) ? ChartService::discountChart($begin, $end) : ChartService::discountChart()],
            'expenses' => [ (request()->has('begin')) ? ChartService::expenseChart($begin, $end) : ChartService::expenseChart() ],
            'students' => TemporaryGroup::query()->where('branch_id', Auth::user()->branch_id)->orderByDesc('id')->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Saxovat ta\'lim';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Markazning umumiy boshqaruv paneli';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('')
                ->modal('temporaryStudentModal')
                ->method('createTemporaryStudent')
                ->icon('user-follow')
                ->parameters([
                    'branch_id' => Auth::user()->branch_id,
                ])
                ->canSee(Auth::user()->hasAccess('platform.temporaryStudent') && Auth::user()->branch_id),
            ModalToggle::make('Chiqim')
                ->modal('makeExpenseModal')
                ->method('makeExpense')
                ->icon('basket-loaded')
                ->canSee(Auth::user()->hasAccess('platform.expenses')),
            DropDown::make('Maxsus vazifalar')->icon('options-vertical')->list([
                ModalToggle::make('To\'lov ogoxlantirish')
                    ->modal('paymentInfoModal')
                    ->method('paymentInfo')
                    ->icon('envelope')->canSee(Auth::user()->hasAccess('platform.paymentInfo')),
                ModalToggle::make('Oylik to\'lov yechish')
                    ->modal('getPaymentModal')
                    ->method('getPayment')
                    ->icon('euro')->canSee(Auth::user()->hasAccess('platform.getPayment')),
            ])->canSee(Auth::user()->hasAccess('platform.specialy') && Auth::user()->branch_id),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            StatisticSelection::class,

            Layout::tabs([
                'Umumiy' => Layout::metrics([
                        'Barcha talabalar soni' => 'statistic.all.all_students',
                        'Barcha guruxlar soni' => 'statistic.all.all_groups',
                        'Talabalarning umumiy qarzdorligi' => 'statistic.all.debts',
                        'O\'qituvchilarning umumiy xisobi' => 'statistic.all.teachers_balance',
                    ]),
                'Kunlik' => Layout::metrics([
                        'To\'lov'    => 'statistic.day.payments',
                        'Chiqim' => 'statistic.day.expenses',
                        'Yangi talabalar' => 'statistic.day.new_students',
                    ]),
                'Oylik' => Layout::metrics([
                        'To\'lov'    => 'statistic.month.payments',
                        'Chiqim' => 'statistic.month.expenses',
                        'Yangi talabalar' => 'statistic.month.new_students',
                    ]),
                'Yillik' => Layout::metrics([
                        'To\'lov'    => 'statistic.year.payments',
                        'Chiqim' => 'statistic.year.expenses',
                        'Yangi talabalar' => 'statistic.year.new_students',
                    ]),
                'Belgilangan' => Layout::metrics([
                        'To\'lov'    => 'statistic.custom.payments',
                        'Chiqim' => 'statistic.custom.expenses',
                        'Yangi talabalar' => 'statistic.custom.new_students',
                    ])->canSee(!is_null($this->custom_stat)),
            ])->activeTab(!is_null($this->custom_stat) ? 'Belgilangan' : 'Umumiy'),

            Layout::tabs([
                'To\'lovlar' => PaymentChart::class,
                'Chiqimlar' => ExpenseChart::class,
                'Chegirmalar' => DiscountChart::class,
                'Hamkorlar' => SourceChart::class,
            ])->canSee(is_null($this->custom_stat)),

            Layout::accordion([
                'To\'lovlar' => PaymentChart::class,
                'Chiqimlar' => ExpenseChart::class,
                'Chegirmalar' => DiscountChart::class,
                'Hamkorlar' => SourceChart::class,
            ])->canSee(!is_null($this->custom_stat)),

            NewStudentsTable::class,

            Layout::modal('makeExpenseModal', [
                Layout::rows([
                    Select::make('branch_id')->fromModel(Branch::class, 'name')
                        ->value(Auth::user()->branch_id)->title('Filialni tanlang')->canSee(!$this->branch_user),
                    Input::make('branch_id')->type('hidden')->value(Auth::user()->branch_id)->required()->canSee($this->branch_user),
                    Input::make('sum')->type('number')
                        ->title('Summani kiriting')->required(),
                    Input::make('desc')->title('Malumot')->required(),
                ]),
            ])->applyButton('Kiritish')->closeButton('Yopish')->title('Chiqim kiritish'),

            Layout::modal('paymentInfoModal', [
                Layout::rows([
                    Input::make('password')->type('password')->title('Maxfiy parolni kiriting')->required()
                        ->help('To\'lov xaqida ogoxlantirish filialning barcha talabalariga jo\'natiladi'),
                ]),
            ])->applyButton('Jo\'natish')->closeButton('Yopish')->title('To\'lov xabarini jo\'natish'),

            Layout::modal('getPaymentModal', [
                Layout::rows([
                    Input::make('password')->type('password')->title('Maxfiy parolni kiriting')->required()
                        ->help('Filialning barcha talabalaridan oylik to\'lov yechib olinadi!'),
                ]),
            ])->applyButton('Yechib olish')->closeButton('Yopish')->title('To\'lov xabarini jo\'natish'),

            Layout::modal('temporaryStudentModal', [
                Layout::rows([
                    Input::make('name')->type('text')->title('Ism')
                        ->required()->help('Kiritish majburiy'),
                    Input::make('surname')->type('text')->title('Familiya'),
                    \Orchid\Screen\Fields\Group::make([
                        Input::make('phone')->title('Telefon raqam')->mask('(99) 999-99-99')
                            ->required()->help('Kiritish majburiy'),
                        Select::make('subject_id')->fromQuery(Subject::where('branch_id', Auth::user()->branch_id), 'name')
                            ->title('Fanni tanlang')->required()->help('Kiritish majburiy'),
                    ]),
                    Select::make('source_id')->fromModel(Source::class, 'name')
                        ->title('Hamkorni tanlang tanlang')->required()->help('Kiritish majburiy'),
                ]),
            ])->applyButton('Saqlash')->closeButton('Yopish')->title('Vaqtinchalik talaba kiritish'),
        ];
    }

    public function paymentInfo(Request $request)
    {
        if ($request->password === '911665958') {
            Artisan::call('info:payment');
            Alert::success('Filialning barcha talabalariga to\'lov xaqida ogoxlantirish yuborildi!');
        } else {
            Alert::error('Parol xato kiritildi!');
        }
    }

    public function getPayment(Request $request)
    {
        if ($request->password === '911665958') {
            Artisan::call('payment:get');
            Alert::success('Filialning barcha talabalari xisobidan pul yechildi!');
        } else {
            Alert::error('Parol xato kiritildi!');
        }
    }

    public function createTemporaryStudent(Request $request)
    {
        $student = TemporaryGroup::createStudent($request);
        Alert::success($student->name . ' ' . $student->surname . ' muaffaqiyatli qo\'shildi');
    }

    public function addStudent(Request $request)
    {
        $student = TemporaryGroup::query()->find($request->id);
        $new_student = Student::createNewStudent($student);
        $student->delete();
        Alert::success('Talaba muaffaqiyatli qabul qilindi. Eni talaba malumotlarini taxrirlab guruxga biriktirishingiz mumkin!');
        return redirect()->route('platform.addStudentToGroup', ['student' => $new_student->id]);
    }

    public function deleteStudent(Request $request)
    {
        $student = TemporaryGroup::query()->find($request->id);
        $student->delete();
        Alert::success('Talaba muaffaqiyatli o\'chirildi');
    }
}
