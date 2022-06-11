<?php

namespace App\Orchid\Screens\Group;

use App\Models\Attandance;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\StudentGroup;
use App\Orchid\Layouts\Group\GroupAttandTable;
use App\Orchid\Layouts\Group\GroupStudentsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                ])
            ];
        } else {
            return [
                GroupStudentsTable::class,
            ];
        }
    }

    public function notComing(Request $request)
    {
        $attandance = Attandance::query()->find($request->id);
        $attandance->attand = false;
        $attandance->save();
        // TODO: Add sms notification for student parent
        Alert::info($attandance->student->name . ' bugun darsga kelmadi, bu xaqida uning ota onasiga xabar yuborildi!');
    }

    public function attandanceFinish(Request $request)
    {
        $lesson = Lesson::query()->find($request->id);
        $lesson->finish = true;
        $lesson->save();

        $ids = Attandance::query()->where('lesson_id', $lesson->id)->where('attand', 1)->pluck('student_id');
        StudentGroup::query()->where('group_id', $lesson->group_id)->whereIn('student_id', $ids)->decrement('lesson_limit');
        Alert::info('Davomat yakunlandi!');
    }

    public function none()
    {

    }
}
