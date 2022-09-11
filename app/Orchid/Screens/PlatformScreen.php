<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Branch;
use App\Models\Expense;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TemporaryGroup;
use App\Orchid\Layouts\Charts\DebtChart;
use App\Orchid\Layouts\Charts\DiscountChart;
use App\Orchid\Layouts\Charts\ExpenseChart;
use App\Orchid\Layouts\Charts\PaymentChart;
use App\Orchid\Layouts\Charts\SourceChart;
use App\Orchid\Layouts\StatisticSelection;
use App\Orchid\Layouts\Student\NewStudentsTable;
use App\Services\ChartService;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    public $custom_stat;
    public $branch_user;
    public $students;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->students = TemporaryGroup::query()->where('branch_id', Auth::user()->branch_id)->orderByDesc('id')->get();
        $this->branch_user = Auth::user()->branch_id ? true : false;
        $payments = Payment::query()->when($this->branch_user, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        })->whereIn('status',['paid', 'teacher_paid']);
        $expenses = Expense::query()->when($this->branch_user, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        });
        $debts = Payment::query()->when($this->branch_user, function ($query){
            return $query->where('branch_id', Auth::user()->branch_id);
        })->whereNot('status', 'paid')->sum('sum');

        if (!request()->has('begin')) {
            $this->custom_stat = null;
        } else {
            $begin = request()->get('begin') . ' 00:00:00';
            $end = request()->get('end') . ' 23:59:59';
            $this->custom_stat = [
                'payments'    => number_format((int)Payment::query()->when($this->branch_user, function ($query){
                         return $query->where('branch_id', Auth::user()->branch_id);
                    })->whereIn('status',['paid', 'teacher_paid'])->whereBetween('updated_at', [$begin, $end])->sum('sum')),
                'expenses' => number_format((int)Expense::query()->when($this->branch_user, function ($query){
                         return $query->where('branch_id', Auth::user()->branch_id);
                    })->whereBetween('created_at', [$begin, $end])->sum('price')),
                'new_students' => (int)Student::query()->when($this->branch_user, function ($query){
                    return $query->where('branch_id', Auth::user()->branch_id);
                })->whereBetween('created_at', [$begin, $end])->count(),
            ];
        }

        return [
            'statistic' => [
                    'all' => [
                        'debts'   => number_format((int)$debts),
                        'all_students' => Student::query()->when($this->branch_user, function ($query){
                            return $query->where('branch_id', Auth::user()->branch_id);
                        })->count(),
                        'all_groups' => Group::query()->when($this->branch_user, function ($query){
                            return $query->where('branch_id', Auth::user()->branch_id);
                        })->count(),
                    ],
                    'year' => [
                        'payments'    => number_format((int)$payments->whereYear('updated_at', date('Y'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereYear('created_at', date('Y'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereYear('created_at', date('Y'))->count(),
                    ],

                    'month' => [
                        'payments'    => number_format((int)$payments->whereMonth('updated_at', date('m'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereMonth('created_at', date('m'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereMonth('created_at', date('m'))->count(),
                    ],

                    'day' => [
                        'payments'    => number_format((int)$payments->whereDay('updated_at', date('d'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereDay('created_at', date('d'))->sum('price')),
                        'new_students'    => (int)Student::query()->whereDay('created_at', date('d'))->count(),
                    ],

                    'custom' => $this->custom_stat,
            ],
            'source' => [ (request()->has('begin')) ? ChartService::sourceChart($begin, $end) : ChartService::sourceChart() ],
            'payments' => [ (request()->has('begin')) ? ChartService::paymentChart($begin, $end) : ChartService::paymentChart()],
            'debts' => [ ChartService::debtsChart() ],
            'discounts' => [ (request()->has('begin')) ? ChartService::discountChart($begin, $end) : ChartService::discountChart()],
            'expenses' => [ (request()->has('begin')) ? ChartService::expenseChart($begin, $end) : ChartService::expenseChart() ],
            'students' => $this->students,
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
                ->canSee(Auth::user()->hasAccess('platform.temporaryStudent') && $this->branch_user),
            ModalToggle::make('Chiqim')
                ->modal('makeExpenseModal')
                ->method('makeExpense')
                ->icon('basket-loaded')
                ->canSee(Auth::user()->hasAccess('platform.expenses')),
            DropDown::make('Maxsus vazifalar')->icon('options-vertical')->list([
                ModalToggle::make('To\'lov ogoxlantirish')
                    ->modal('paymentInfoModal')
                    ->method('paymentInfo')
                    ->icon('envelope')->canSee(Auth::user()->hasAccess('platform.paymentInfo') && $this->branch_user),
                ModalToggle::make('Oylik to\'lov yechish')
                    ->modal('getPaymentModal')
                    ->method('getPayment')
                    ->icon('euro')->canSee(Auth::user()->hasAccess('platform.getPayment')),
            ])->canSee(Auth::user()->hasAccess('platform.specialy') && $this->branch_user),
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
            ])->canSee(Auth::user()->hasAccess('platform.seeStatistic'))->activeTab(!is_null($this->custom_stat) ? 'Belgilangan' : 'Umumiy'),

            Layout::tabs([
                'To\'lovlar' => PaymentChart::class,
                'Chiqimlar' => ExpenseChart::class,
                'Qarzdorlar' => DebtChart::class,
                'Chegirmalar' => DiscountChart::class,
                'Hamkorlar' => SourceChart::class,
            ])->canSee(is_null($this->custom_stat) && Auth::user()->hasAccess('platform.seeStatistic')),

            Layout::accordion([
                'To\'lovlar' => PaymentChart::class,
                'Chiqimlar' => ExpenseChart::class,
                'Chegirmalar' => DiscountChart::class,
                'Hamkorlar' => SourceChart::class,
            ])->canSee(!is_null($this->custom_stat) && Auth::user()->hasAccess('platform.seeStatistic')),

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
            ])->applyButton('Yechib olish')->closeButton('Yopish')->title('To\'lov uchun xisob yaratish')
                ->withoutApplyButton(date('n') == Auth::user()->branch->last_payment_month),

            Layout::modal('temporaryStudentModal', [
                Layout::rows([
                    Input::make('name')->type('text')->title('Ism')
                        ->required()->help('Kiritish majburiy'),
                    Input::make('surname')->type('text')->title('Familiya'),
                    \Orchid\Screen\Fields\Group::make([
                        Input::make('phone')->title('Telefon raqam (Shaxsiy)')->mask('(99) 999-99-99')
                            ->required()->help('Kiritish majburiy'),
                        Input::make('parent_phone')->title('Telefon raqam (Ota-ona)')->mask('(99) 999-99-99')
                            ->help('Majburiy emas'),
                    ]),
                    \Orchid\Screen\Fields\Group::make([
                        Select::make('subject_id')->fromQuery(Subject::where('branch_id', Auth::user()->branch_id), 'name')
                            ->title('Fanni tanlang')->required()->help('Kiritish majburiy'),
                        Select::make('source_id')->fromModel(Source::class, 'name')
                            ->title('Hamkorni tanlang tanlang')->required()->help('Kiritish majburiy'),
                    ]),
                ]),
            ])->applyButton('Saqlash')->closeButton('Yopish')->title('Vaqtinchalik talaba kiritish'),

            Layout::modal('newGroupModal', [
                Layout::rows([
                    \Orchid\Screen\Fields\Group::make([
                        Input::make('name')
                            ->title('Gurux nomi')
                            ->required()
                            ->placeholder('Gurux nomini kiriting'),
                        Select::make('subject_id')
                            ->title('Fan')
                            ->fromQuery(Subject::where('branch_id', '=', Auth::user()->branch_id), 'name')
                            ->required(),
                        Select::make('day_type')
                            ->title('Dars kunlari')
                            ->options(Group::DAY_TYPE)
                            ->required(),
                    ]),
                    \Orchid\Screen\Fields\Group::make([
                        Select::make('teacher_id')
                            ->title('O\'qituvchi')
                            ->fromQuery(Teacher::query()->where('branch_id', '=', Auth::user()->branch_id), 'name')
                            ->required(),
                        CheckBox::make('is_active')->title('Aktiv')
                            ->sendTrueOrFalse()->value(true)->help('Guruxning xozirgi paytdagi aktivligi'),
                    ]),
                    Matrix::make('students')
                        ->columns(['' => 'id', '+' => 'add', 'Ism' => 'name', 'Fan' => 'subject_id'])
                        ->title('Talabalarni qo\'shish')
                        ->fields([
                            'id' => Input::make('id')->size('5px')->hidden(),
                            'add' => CheckBox::make('toGroup')->sendTrueOrFalse(),
                            'name' => Input::make('name'),
                            'subject_id' => Select::make('subject_id')->fromModel(Subject::class, 'name'),
                        ])->maxRows($this->students->count())->removableRows(false),
                ]),
            ])->size(Modal::SIZE_LG)
              ->applyButton('Yaratish')->closeButton('Yopish')
              ->withoutApplyButton($this->students->count() === 0)
              ->title('Yangi gurux qo\'shish'),
        ];
    }

    public function newGroup(Request $request)
    {
        GroupService::createGroupWithStudents($request);
        Alert::success('Gurux muaffaqiyatli yaratildi, talabalar guruxga qo\'shildi!');
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

    public function makeExpense(Request $request)
    {
        Expense::makeExpense($request);
        Alert::success('Chiqim muaffaqiyatli amalga oshirildi.');
    }
}
