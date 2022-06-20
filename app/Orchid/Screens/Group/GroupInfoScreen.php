<?php

namespace App\Orchid\Screens\Group;

use App\Models\Attandance;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Notifications\AdminNotify;
use App\Orchid\Layouts\Group\GroupAttandTable;
use App\Orchid\Layouts\Group\GroupLessonsTable;
use App\Orchid\Layouts\Group\GroupStudentsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Napa\R19\Sms;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class GroupInfoScreen extends Screen
{
    public $group;
    public $lesson;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Group $group): iterable
    {
        $lesson = Lesson::query()
            ->where('group_id', $group->id)
            ->where('date', '=', date('Y-m-d'))->first();

        return [
            'lesson' => $lesson,
            'students' => StudentGroup::query()->with(['student'])->where('group_id', $group->id)->get(),
            'group' => $group,
            'attand' => Attandance::query()->where('lesson_id', $lesson->id ?? '')->get(),
            'lessons' => Lesson::query()->with(['attandances'])->where('group_id', $group->id)
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
        return $this->group->name . ' guruxi ma\'lumotlar';
    }

    public function description(): ?string
    {
        return 'Guruxdagi talabalar va ularning dars jarayonlari haqida ma\'lumot';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.groupInfo'
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
            Button::make('Davomatni yakunlash')
                ->icon('check')
                ->method('attandanceFinish')
                ->canSee(Auth::user()->hasAccess('platform.attandance') && !is_null($this->lesson) && !$this->lesson->finish)
                ->parameters([
                    'id' => $this->lesson->id ?? '',
                ]),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        if (Auth::user()->hasAccess('platform.attandance') && !is_null($this->lesson) && !$this->lesson->finish) {
            return [
                Layout::columns([
                    GroupAttandTable::class,
                    GroupStudentsTable::class,
                ]),
                GroupLessonsTable::class,
            ];
        } else {
            return [
                GroupStudentsTable::class,
                GroupLessonsTable::class,
            ];
        }
    }

    public function notComing(Request $request)
    {
        $attandance = Attandance::query()->find($request->id);
        $attandance->attand = false;
        $attandance->save();
        $this->sendMessageToStudent($attandance->student);
        Alert::info($attandance->student->name . ' bugun darsga kelmadi, bu xaqida uning ota onasiga xabar yuborildi!');
    }

    public function attandanceFinish(Request $request)
    {

        $lesson = Lesson::query()->find($request->id);
        $lesson->finish = true;
        $lesson->save();

        $ids = Attandance::query()->where('lesson_id', $lesson->id)->where('attand', 1)->pluck('student_id');
        //StudentGroup::query()->where('group_id', $lesson->group_id)->whereIn('student_id', $ids)->decrement('lesson_limit');

        foreach (StudentGroup::query()->with(['student.branch'])->where('group_id', $lesson->group_id)
                     ->whereIn('student_id', $ids)->get() as $studentGroup)
        {
            if ($studentGroup->student->branch->payment_period === 'daily') {
                $studentGroup->decrement('lesson_limit');
                if ($studentGroup->lesson_limit === 0) {
                    $student = Student::query()->find($studentGroup->student_id);
                    $subject_price = $studentGroup->group->subject->price;
                    if ($student->balance > $subject_price) {
                        $student->balance -= $subject_price;
                    } else {
                        if ($student->balance > 0) {
                            $student->debt = $subject_price - $student->balance;
                            $student->balance = 0;
                        } else {
                            $student->debt += $subject_price;
                        }
                    }
                    $student->save();
                    $studentGroup->update([
                        'lesson_limit' => 12
                    ]);
                }
            }
        }
        Alert::info('Davomat yakunlandi!');
    }

    public function none()
    {

    }

    private function sendMessageToStudent(Student $student)
    {
        $phone = Student::telephoneFormMessage($student->phone);
        $erro_message = 'Talaba davomati haqida sms yuborishda xatolik. Raqam: ' . $phone;
        # TODO change sms text
        $message = 'Farzandingiz: ' . $student->name . ' bugungi darsga kelmadi!' . "\n" . 'Xurmat bilan Saxovat ta\'lim';
        try {
            Sms::send($phone, $message);
        }catch (\Exception $e){
            Notification::send($erro_message, new AdminNotify()); // TODO check notify working
        }
    }
}
