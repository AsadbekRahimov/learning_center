<?php

namespace App\Orchid\Screens\Group;

use App\Models\Group;
use App\Models\StudentGroup;
use App\Orchid\Layouts\Group\GroupStudentsTable;
use Orchid\Screen\Screen;

class GroupInfoScreen extends Screen
{
    public $group;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Group $group): iterable
    {
        return [
            'students' => StudentGroup::query()->with(['student'])->where('group_id', $group->id)->get(),
            'group' => $group,
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
            GroupStudentsTable::class,
        ];
    }

    public function none()
    {

    }
}
