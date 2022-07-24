<?php

namespace App\Orchid\Screens\TimeTable;

use App\Models\Group;
use App\Models\GroupRoom;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class TimeTableScreen extends Screen
{
    public $groups;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->groups = GroupRoom::query()->pluck('group_id');
        return [
            'rooms' => Room::query()->where('branch_id', Auth::user()->branch_id)->with(['groups.group.teacher'])->get(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Dars jadvali';
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
                ->icon('calendar')
                ->modal('addGroupToRoomModal')
                ->method('addGroupToRoom'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('addGroupToRoomModal', [
                Layout::rows([
                    Select::make('group_id')
                        ->fromQuery(\App\Models\Group::where('branch_id', Auth::user()->branch_id)
                            ->whereNotIn('id', $this->groups)->where('is_active', '=', true), 'name_with_type')
                        ->title('Guruxni tanlang')->required(),
                    Select::make('room_id')
                        ->fromQuery(Room::query()->where('branch_id', Auth::user()->branch_id), 'name')
                        ->title('Xonani tanlang')->required(),
                    \Orchid\Screen\Fields\Group::make([
                        Input::make('time')
                            ->type('time')
                            ->title('Boshlanish vaqti')
                            ->value('09:00:00')->required(),
                        Input::make('duration')
                            ->type('number')
                            ->title('Dars davomiyligi (minut)')
                            ->value(90)->required(),
                    ]),
                ]),
            ])->title('Guruxni xonaga biriktirish')->applyButton('Qo\'shish')->closeButton('Yopish'),
            Layout::view('timetable'),
        ];
    }

    public function addGroupToRoom(Request $request)
    {
        GroupRoom::query()->create([
            'group_id' => $request->group_id,
            'room_id' => $request->room_id,
            'time' => $this->getGroupTime($request->time),
            'duration' => $request->duration,
        ]);

        Alert::success('Gurux jadvalga qo\'shildi');
    }

    private function getGroupTime($time)
    {
        $time = explode(':', $time);
        $hour = (int)$time[0];
        $minute = (int)$time[1] / 100;
        return $hour + $minute;
    }
}
