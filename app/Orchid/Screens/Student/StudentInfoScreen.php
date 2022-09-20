<?php

namespace App\Orchid\Screens\Student;

use App\Models\Action;
use App\Models\Attandance;
use App\Models\Discount;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Orchid\Layouts\Student\StudentActionsTable;
use App\Orchid\Layouts\Student\StudentAttandanceTable;
use App\Orchid\Layouts\Student\StudentDiscountTable;
use App\Orchid\Layouts\Student\StudentGroupsTable;
use App\Orchid\Layouts\Student\StudentPaymentsTable;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class StudentInfoScreen extends Screen
{
    public $student;

    public $groups;

    public $last_payment;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Student $student): iterable
    {
        //dd($student->groups);
        return [
            'last_payment' => Payment::query()->where('student_id', $student->id)->where('status', 'paid')->orderByDesc('id')->first(),
            'student' => $student,
            'metrics' => [
                'pay' => number_format(Payment::query()->where('student_id', $student->id)->where('status', 'paid')->sum('sum')),
                'debt' => number_format(Payment::query()->where('student_id', $student->id)->whereNot('status', 'paid')->sum('sum')),
                'discount' => number_format($student->discount),
                'attandances' => [
                    'value' => $student->attand_count(),
                    'diff' => $student->attand_percent()
                ]
            ],
            'student_groups' => StudentGroup::query()->with('group', 'student.branch')
                ->where('student_id', $student->id)->orderByDesc('id')->paginate(10),
            'groups' => StudentGroup::query()->where('student_id', $student->id)->pluck('group_id'),
            'attandances' => Attandance::query()->with(['lesson.group'])->where('student_id', $student->id)
                ->orderByDesc('id')->paginate(10),
            'payments' => Payment::query()->where('student_id', $student->id)
                ->whereNot('status', 'unpaid')->filters()->orderByDesc('id')->paginate(10),
            'discounts' => Discount::query()->where('student_id', $student->id)->orderByDesc('id')
                ->paginate(10),
            'student_actions' => Action::query()->where('student_id', $student->id)->orderByDesc('id')
                ->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->student->fio_name . ' | Ta\'lim bosqichi: ' . Student::STATUS[$this->student->status];
    }

    public function description(): ?string
    {
        return 'Filial: ' . $this->student->branch->name;
    }

    public function permission(): ?iterable
    {
        return [
            'platform.addStudentToGroup'
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        $modal_title = $this->student->status == 'accepted' ? 'Guruxga qo\'shish' : 'Talabaning ta\'lim bosqichi faol bolishi kerak!';
        return [
            Link::make('')->icon('star')->type(Color::WARNING())->canSee($this->student->privilege),
            Link::make('')->icon('printer')
                ->route('checkPrint', ['id' => $this->last_payment ? $this->last_payment->id : 1])
                ->target('_blank')
                ->canSee(!is_null($this->last_payment)),

            DropDown::make('Amallar')->icon('options-vertical')->list([
                Link::make('Taxrirlash')
                    ->icon('settings')
                    ->canSee(Auth::user()->hasAccess('platform.students'))
                    ->href('/admin/crud/edit/student-resources/' . $this->student->id),

                ModalToggle::make('Guruxga qo\'shish')
                    ->modal('addToGroupModal')
                    ->method('addToGroup')
                    ->icon('organization')
                    ->modalTitle($modal_title),

                ModalToggle::make('Gurux narxini o\'zgartirish')
                    ->modal('changeGroupPriceModal')
                    ->method('changeGroupPrice')
                    ->icon('star')
                    ->modalTitle('Saxovat talabasini gurux narxini o\'zgartirish')
                    ->parameters([
                        'student_id' => $this->student->id,
                    ])
                    ->type(Color::WARNING())->canSee($this->student->privilege && Auth::user()->hasAccess('platform.editGroupPrice')),
            ]),
        ];
    }

    public function addToGroup(Request $request)
    {
        StudentService::addToGroup($request);
    }

    public function deleteFromGroup(Request $request)
    {
        $group = StudentGroup::query()->with(['group'])->find($request->id);
        $student = Student::query()->find($group->student_id);
        StudentService::returnGroupBalance($group, $student);
    }

    public function changeGroupPrice(Request $request)
    {
        StudentService::changeGroupPrice($request);
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        //dd($this->groups);
        return [
            Layout::metrics([
                'To\'lov' => 'metrics.pay',
                'Qarz' => 'metrics.debt',
                'Chegirma' => 'metrics.discount',
                'Davomat' => 'metrics.attandances',
            ]),

            Layout::tabs([
                 'Guruxlar' => StudentGroupsTable::class,
                 'Davomat' => StudentAttandanceTable::class,
                 'To\'lovlar' => StudentPaymentsTable::class,
                 'Amallar' => StudentActionsTable::class,
                 'Chegirmalar' => StudentDiscountTable::class,
            ]),

            Layout::modal('addToGroupModal', [
                Layout::rows([
                    Select::make('group_id')
                        ->fromQuery(\App\Models\Group::query()->with(['subject'])->where('branch_id', $this->student->branch_id)
                            ->whereNotIn('id', $this->groups)->where('is_active', '=', true), 'all_name')
                        ->title('Guruxni tanlang')->disabled($this->student->status != 'accepted')->required(),
                    Input::make('price')->title('Imtiyozli talaba uchun gurux narxi')->type('number')
                        ->required()->canSee($this->student->privilege && Auth::user()->hasAccess('platform.editGroupPrice')),
                    Input::make('lesson_limit')->type('number')->required()->value(0)
                        ->title('Dars limiti')
                        ->canSee(Auth::user()->hasAccess('platform.editLesson') && $this->student->branch->payment_period === 'daily'),
                    Input::make('payed')->hidden()->value(0)->canSee(!Auth::user()->hasAccess('platform.editLesson')
                        && $this->student->branch->payment_period === 'daily'),
                    Input::make('student_id')->value($this->student->id)->hidden(),
                    CheckBox::make('payed')->title('Oyni oxirigacha to\'lagan')->sendTrueOrFalse()
                        ->canSee(Auth::user()->hasAccess('platform.editLesson') && $this->student->branch->payment_period === 'monthly'),
                    Input::make('payed')->hidden()->value(0)->canSee(!Auth::user()->hasAccess('platform.editLesson')
                        && $this->student->branch->payment_period === 'monthly'),
                ]),
            ])->applyButton('Qo\'shish')->closeButton('Yopish')->withoutApplyButton($this->student->status != 'accepted'),


            Layout::modal('paymentModal', [
                Layout::rows([
                    Input::make('sum')->type('number')
                        ->title('To\'lov summasini kiriting')->required(),
                    Input::make('student_id')->type('hidden')
                        ->value($this->student->id),
                    Select::make('type')->options(Payment::TYPES)
                        ->required()->title('To\'lov turi'),
                ]),
            ])->applyButton('To\'ldirish')->closeButton('Yopish')->title('Talaba hisobini to\'ldirish'),

            Layout::modal('rollbackPaymentModal', [
                Layout::rows([
                    Input::make('sum')->type('number')
                        ->title('Summani kiriting')->required()->disabled($this->student->status != 'accepted'),
                ]),
            ])->applyButton('Qaytarish')->closeButton('Yopish')
                ->withoutApplyButton($this->student->status != 'accepted')->title('Talaba hisobidan pulini qaytarish'),

            Layout::modal('changeGroupPriceModal', [
                Layout::rows([
                    Select::make('group_id')
                        ->fromQuery(\App\Models\Group::where('branch_id', $this->student->branch_id)
                            ->whereIn('id', $this->groups)->where('is_active', '=', true), 'all_name')
                        ->title('Guruxni tanlang')->disabled($this->student->status != 'accepted')->required(),
                    Input::make('price')->title('Imtiyozli talaba uchun gurux narxi')->type('number')
                        ->required(),
                ]),
            ])->applyButton('Saqlash')->closeButton('Yopish')->withoutApplyButton($this->student->status != 'accepted'),
        ];
    }
}
