<?php

namespace App\Orchid\Screens\Student;

use App\Models\Attandance;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Orchid\Layouts\Student\StudentAttandanceTable;
use App\Orchid\Layouts\Student\StudentGroupsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class StudentInfoScreen extends Screen
{
    public $student;

    public $groups;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Student $student): iterable
    {
        //dd($student->groups);
        return [
            'student' => $student,
            'metrics' => [
                'pay' => number_format(Payment::query()->where('student_id', $student->id)->sum('sum')),
                'balance' => number_format($student->balance),
                'debt' => number_format($student->debt),
                'discount' => number_format($student->discount),
                'attandances' => [
                    'value' => $student->attand_count(),
                    'diff' => $student->attand_percent()
                ]
            ],
            'student_groups' => StudentGroup::query()->with('group.subject', 'student')
                ->where('student_id', $student->id)->get(),
            'groups' => StudentGroup::query()->where('student_id', $student->id)->pluck('group_id'),
            'attandances' => Attandance::query()->with(['lesson.group'])->where('student_id', $student->id)
                ->orderByDesc('id')->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->student->name;
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
        return [
            ModalToggle::make('Guruxga qo\'shish')
                ->modal('addToGroupModal')
                ->method('addToGroup')
                ->icon('organization'),
            /*ModalToggle::make('Guruxni almashtirish')
                ->modal('changeGroupModal')
                ->method('changeGroup')
                ->icon('refresh'),*/
            ModalToggle::make('Hisobni toldirish')
                ->modal('paymentModal')
                ->method('studentPayment')
                ->icon('dollar'),
        ];
    }

    public function changeGroup(Request $request)
    {
        //dd($request->all());
        $source_group = Group::query()->find($request->source_group);
        $target_group = Group::query()->find($request->target_group);

        if ($source_group->subject->price == $target_group->subject->price) {
            $student_group = StudentGroup::query()->where('student_id', $request->student_id)
                ->where('group_id', $source_group->id)->first();
            $student_group->group_id = $target_group->id;
            $student_group->save();
            Alert::success('Talabaning guruxi ' . $source_group->name . ' dan ' . $target_group->name . ' ga o\'zgartirildi, '
                . $source_group->name . ' guruxi xisobidagi ' . $student_group->lesson_limit . ' ta dars limiti ' . $target_group->name . ' guruxi xisobiga o\'tkazildi');
        } else {
            Alert::error('Guruxni ozgartirish uchun tanlangan guruxlardagi fanlarning narxi bir xil bo\'lishi kerak,
            bunday bo\'lmagan taqdirda talabani guruxdan chiqarib uni qayta guruxga biriktirish kerak boladi!');
        }

    }

    public function studentPayment(Request $request)
    {
        $student = Student::query()->find($request->student_id);
        if ($student->debt > 0) { // 300 qarz -- 200 toladi | 300 qarz -- 400 toladi
            if ($student->debt > $request->sum) {
                $student->debt -= $request->sum;
            } else {
                $student->balance += ($request->sum - $student->debt);
                $student->debt = 0;
            }
        }else {
            $student->balance += $request->sum;
        }
        $student->save();

        Payment::query()->create([
            'student_id' => $request->student_id,
            'sum' => $request->sum,
            'type' => $request->type,
            'branch_id' => $student->branch_id,
        ]);
        Alert::success('Talaba muaffaqiyatli tolovni amalga oshirdi');
    }

    public function addToGroup(Request $request)
    {
        //dd($request->all());
        if ($request->has('group_id')) {
            $student = Student::query()->find($request->student_id);
            $group = Group::query()->with(['subject'])->find($request->group_id);
            StudentGroup::query()->create([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
                'lesson_limit' => $request->has('lesson_limit') ? $request->lesson_limit : 12,
            ]);

            if ($request->has('payed')) { // Talaba oylik rejimda royhatdan o`tganda | oydi oxirigacha tolovni xisoblash
                if ($request->payed === '0') {
                    // Kurs oldin tolanganlar
                    $results = $this->getMonthlyPayFromBalance($request->student_id, $request->group_id);
                    Alert::success('Talaba guruxga qo\'shildi. Bu guruxda oy oxirigacha qolgan ' . $results['days'] .
                        ' ta dars xisobidan ' . $results['price'] . ' so\'m talabaning xisobidan yechildi');
                }
            } else {
                if (!$request->has('lesson_limit')) { // qolgan dars limiti kiritilmagandagi xolatda
                    if ($student->balance >= $group->subject->price) {
                        $student->balance -= $group->subject->price;
                    } else {
                        $student->debt += ($group->subject->price - $student->balance);
                        $student->balance = 0;
                    }
                    $student->save();
                    Alert::success('Talaba guruxga qo\'shildi, Uning xisobidan 12 ta dars uchun ' . $group->subject->price
                        . ' miqdoridagi pul yechib olindi');
                } else {
                    Alert::success('Talaba guruxga qo\'shildi');
                }
            }

        } else {
            Alert::warning('Talabani guruxga qo\'shish uchun gurux mavjud emas');
        }
    }

    public function deleteFromGroup(Request $request)
    {
        // TODO add delete from group logic for branches
        $student_group = StudentGroup::query()->find($request->id);
        $student = Student::query()->find($student_group->student_id);
        if ($student->branch->payment_period == 'daily')
        {
            $returned_balance = round(($student_group->group->subject->price / 12) * $student_group->lesson_limit, -3);
            $student->balance += (int)$returned_balance;
            $student->save();
            $student_group->delete();
            Alert::success('Talaba guruxdan o\'chirildi, uning xisobida qolgan dars limitlari xisobidan ' . $returned_balance . ' so\'m qaytarildi');
        }
    }


    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'To\'lov' => 'metrics.pay',
                'Hisob' => 'metrics.balance',
                'Qarz' => 'metrics.debt',
                'Chegirma' => 'metrics.discount',
                'Davomat' => 'metrics.attandances',
            ]),

            StudentGroupsTable::class,
            StudentAttandanceTable::class,

            Layout::modal('addToGroupModal', [
                Layout::rows([
                    Select::make('group_id')
                        ->fromQuery(\App\Models\Group::where('branch_id', $this->student->branch_id)->whereNotIn('id', $this->groups), 'name')
                        ->title('Guruxni tanlang'),
                    Input::make('lesson_limit')->type('number')->required()->value(0)
                        ->title('Dars limiti')
                        ->canSee(Auth::user()->hasAccess('platform.editLesson') && $this->student->branch->payment_period === 'daily'),
                    Input::make('student_id')->value($this->student->id)->hidden(),
                    CheckBox::make('payed')->title('Oyni oxirigacha to\'lagan')->sendTrueOrFalse()
                        ->canSee(Auth::user()->hasAccess('platform.editLesson') && $this->student->branch->payment_period === 'monthly'),
                    Input::make('payed')->hidden()->value(0)->canSee(!Auth::user()->hasAccess('platform.editLesson')
                        && $this->student->branch->payment_period === 'monthly')
                ]),
            ])->applyButton('Qo\'shish')->closeButton('Yopish')->title('Talabani guruxga qo\'shish'),

            Layout::modal('changeGroupModal', [
                Layout::rows([
                    Select::make('source_group')
                        ->fromQuery(\App\Models\Group::where('branch_id', $this->student->branch_id)->whereIn('id', $this->groups), 'name')
                        ->title('Guruxni tanlang'),
                    Select::make('target_group')
                        ->fromQuery(\App\Models\Group::where('branch_id', $this->student->branch_id)->whereNotIn('id', $this->groups), 'name')
                        ->title('Guruxni tanlang'),
                    Input::make('student_id')->value($this->student->id)->hidden(),
                ]),
            ])->applyButton('Almashtirish')->closeButton('Yopish')->title('Talaba guruxini o\'zgartirish'),


            Layout::modal('paymentModal', [
                Layout::rows([
                    Input::make('sum')->type('number')->title('To\'lov summasini kiriting'),
                    Input::make('student_id')->type('hidden')->value($this->student->id),
                    Select::make('type')->options(Payment::TYPES)->required()->title('To\'lov turi'),
                ]),
            ])->applyButton('To\'ldirish')->closeButton('Yopish')->title('Talaba hisobini to\'ldirish'),
        ];
    }

    private function getMonthlyPayFromBalance($student_id, $group_id)
    {
        $student = Student::query()->find($student_id);
        $group = Group::query()->with(['subject'])->find($group_id);
        $today = date('j'); // number of  current date this month
        $last_day = date('t'); // number of last day in month
        $remaining_lessons = 0;
        $lessons_this_month = 0;
        for($i = $today + 1; $i <= $last_day; $i++) // calculate remaining lessons
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
            if ($group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                $remaining_lessons++;
            }elseif ($group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                $remaining_lessons++;
            }
        }

        for($i = 1; $i <= $last_day; $i++) // calculate all lessons count in this month
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
            if ($group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                $lessons_this_month++;
            }elseif ($group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                $lessons_this_month++;
            }
        }

        $remaining_payment_for_this_month = round(($group->subject->price / $lessons_this_month) * $remaining_lessons, -3);
        if ($student->balance >= $remaining_payment_for_this_month) {
            $student->balance -= $remaining_payment_for_this_month;
        } else {
            $student->debt += $remaining_payment_for_this_month - $student->balance;
            $student->balance = 0;
        }
        $student->save();

        $results = [
            'days' => $lessons_this_month,
            'price' => $remaining_payment_for_this_month,
        ];

        return $results;
    }
}
