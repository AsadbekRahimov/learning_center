<?php

namespace App\Orchid\Layouts\Teacher;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TeacherGroupsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'groups';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->render(function (Group $group){
                return CheckBox::make('ids[]')->value($group->id);
            }),
            TD::make('name', 'Gurux')->render(function (Group $group) {
                return Link::make($group->name)->route('platform.groupInfo', ['group' => $group->id]);
            }),
            TD::make('subject_id', 'Fan')->render(function (Group $group) {
                return $group->subject->name;
            }),
            TD::make('students_count', 'O\'quvchilar soni')->render(function (Group $group) {
                return $group->students->count();
            }),
            TD::make('payments', 'Shu oy to\'lovi')->render(function (Group $group) {
                return number_format($group->salary);
            }),
            TD::make('Amallar')->align(TD::ALIGN_CENTER)->width('100px')
                ->render(function (Group $group) {
                    return DropDown::make()->icon('options-vertical')->list([
                        Button::make('Oylik maosh ajiratish')
                            ->icon('dollar')
                            ->confirm('Siz rostdan ham ushbu oqituvchiga gurux uchun maosh bermoqchimisiz?')
                            ->method('teacherSalary', [
                                'id' => $group->id,
                            ])->canSee(Auth::user()->hasAccess('platform.giveSalary')),
                    ]);
                }),
        ];
    }
}
