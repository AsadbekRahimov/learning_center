<?php

namespace App\Orchid\Screens\Group;

use App\Models\Action;
use App\Models\Attandance;
use App\Models\Discount;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Notifications\AdminNotify;
use App\Orchid\Layouts\Group\GroupAttandTable;
use App\Orchid\Layouts\Group\GroupLessonsTable;
use App\Orchid\Layouts\Group\GroupStudentsTable;
use App\Services\StudentService;
use App\Services\TelegramNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Napa\R19\Sms;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
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
            'group' => $group->load('branch', 'teacher'),
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
        return 'Guruxdagi talabalar va ularning dars jarayonlari haqida ma\'lumot | ' . $this->group->branch->name;
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
            Link::make('')->icon('check')->type(Color::SUCCESS())->canSee($this->group->is_active),
            Link::make('')->icon('close')->type(Color::DANGER())->canSee(!$this->group->is_active),
            Button::make('Davomatni yakunlash')
                ->icon('check')
                ->method('attandanceFinish')
                ->canSee(Auth::user()->hasAccess('platform.attandance') && !is_null($this->lesson) && !$this->lesson->finish)
                ->parameters([
                    'id' => $this->lesson->id ?? '',
                ]),
            Link::make($this->group->teacher->name)
                ->icon('graduation')
                ->canSee(Auth::user()->hasAccess('platform.teacherInfo'))
                ->route('platform.teacherInfo', ['teacher' => $this->group->teacher_id]),
            Link::make('Taxrirlash')
                ->icon('settings')
                ->canSee(Auth::user()->hasAccess('platform.groups'))
                ->href('/admin/crud/edit/group-resources/' . $this->group->id),
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
                Layout::tabs([
                   'Guruxning bugungi davomati' => GroupAttandTable::class,
                   'Guruxdagi talabalar ro\'yhati' => GroupStudentsTable::class,
                   'Guruxdagi o\'tilgan darslar ro\'yhati' => GroupLessonsTable::class,
                ]),
            ];
        } else {
            return [
                Layout::tabs([
                    'Guruxdagi talabalar ro\'yhati' => GroupStudentsTable::class,
                    'Guruxdagi o\'tilgan darslar ro\'yhati' => GroupLessonsTable::class,
                ]),
            ];
        }
    }

    public function notComing(Request $request)
    {
        $attandance = Attandance::query()->find($request->id);
        $attandance->attand = false;
        $attandance->save();
        $this->sendMessageToStudent($attandance->student, $attandance->lesson->group);
        if (is_null($attandance->student->parent_phone))
        {
            Alert::warning($attandance->student->name . ' bugun darsga kelmadi, ota-onasini raqami yoqligi sababli bu xaqida uning ota onasiga xabar yuborilmadi!');
        } else {
            Alert::info($attandance->student->name . ' bugun darsga kelmadi, bu xaqida uning ota onasiga xabar yuborildi!');
        }

    }

    public function attandanceFinish(Request $request)
    {
        $lesson = Lesson::query()->find($request->id);
        $lesson->finish = true;
        $lesson->save();

        $ids = Attandance::query()->where('lesson_id', $lesson->id)->where('attand', 1)->pluck('student_id');
        //StudentGroup::query()->where('group_id', $lesson->group_id)->whereIn('student_id', $ids)->decrement('lesson_limit');

        foreach (StudentGroup::query()->with(['student.branch', 'group'])->where('group_id', $lesson->group_id)
                     ->whereIn('student_id', $ids)->get() as $studentGroup)
        {
            if ($studentGroup->student->branch->payment_period === 'daily') {
                $studentGroup->decrement('lesson_limit');
                if ($studentGroup->lesson_limit === 0) {
                    $student = Student::query()->find($studentGroup->student_id);
                    $subject_price = StudentService::getSubjectPrice($studentGroup);
                    $student->getFromBalance($subject_price);
                    $studentGroup->update([
                        'lesson_limit' => 12
                    ]);
                    Action::getLessonPay($student->id, $subject_price, $studentGroup->group->name);
                    if($studentGroup->price !== null) { Discount::groupDiscount($studentGroup->group, $studentGroup->student_id, $studentGroup->price); }
                }
            }
        }
        Alert::info('Davomat yakunlandi!');
    }

    public function none()
    {

    }

    private function sendMessageToStudent(Student $student, Group $group)
    {
        $phone = Student::telephoneFormMessage($student->parent_phone);
        $message = Message::getTextByKey('not_attand', $student->name);
        if (!is_null($student->parent_phone))
        {
            try {
                Sms::send($phone, $message);
            } catch (\Exception $e){}
        } else {
            $error_message = 'Talabaning ota-onasini telefon raqami yo\'qligi sababli talaba darsga kelmaganligi haqida oila azolariga sms xabar yuborilmadi!'
                . "\r\n" . 'Talaba: '  . $student->fio_name . ' | Gurux: ' . $group->name;
            try {
                TelegramNotify::sendMessage($error_message, 'davomat_ogoxlantirishda_xatolik', $student->branch->name);
            } catch (\Exception $e){}
        }
    }
}
