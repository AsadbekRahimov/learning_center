<?php

namespace App\Orchid\Screens;

use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Orchid\Layouts\GroupListener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class AddStudentToGroup extends Screen
{
    public $student;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Student $student): iterable
    {
        return [
            'student' => $student,
            'metrics' => [
                'pay'    => number_format(65661),
                'balance' => number_format($student->balance),
                'debt'   => number_format($student->debt),
                'discount'    => number_format($student->discount),
            ],
            'student_groups' => StudentGroup::query()->with('group')->where('student_id', $student->id)->get(),
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
        return 'Talaba uchun xizmatar';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        ];
    }

    public function goToGroup(Request $request)
    {
        if($request->has('group_id')) {
            StudentGroup::query()->create([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
            ]);
            Alert::success('Talaba guruxga qo\'shildi');
        } else {
            Alert::warning('Talabani guruxga qo\'shish uchun gurux mavjud emas');
        }
    }

    public function deleteFromGroup(Request $request)
    {
        if($request->has('group_id')) {
            StudentGroup::query()->where('student_id', $request->student_id)
                ->where('group_id', $request->group)->delete();
            Alert::success('Talaba guruxdan o\'chirildi');
        } else {
            Alert::warning('Talabani guruxdan o\'chirish uchun gurux mavjud emas');
        }
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $groups = StudentGroup::query()->where('student_id', $this->student->id)->pluck('group_id');

        return [
            Layout::metrics([
                'To\'lov'    => 'metrics.pay',
                'Hisob' => 'metrics.balance',
                'Qarz' => 'metrics.debt',
                'Chegirma' => 'metrics.discount',
            ]),
            Layout::block([
                Layout::rows([
                    Select::make('group_id')
                        ->fromQuery(\App\Models\Group::where('branch_id', Auth::user()->branch_id)->whereNotIn('id', $groups), 'name')
                        ->title('Guruxni tanlang'),

                    Select::make('group_id')
                        ->fromModel(Group::class, 'name')
                        ->value($groups)
                        ->multiple()
                        ->title('Tanlangan guruxlar')
                        ->disabled(),

                    Input::make('student_id')->value($this->student->id)->hidden(),

                    Button::make('Saqlash')
                        ->method('goToGroup')
                        ->type(Color::PRIMARY())
                        ->icon('action-redo'),
                ]),
            ])->title('Talabani guruxga biriktirish')->description(''),

            Layout::block([
                Layout::rows([
                    Select::make('group')
                        ->fromQuery(\App\Models\Group::whereIn('id', $groups), 'name')
                        ->title('Guruxni tanlang'),

                    Input::make('student_id')->value($this->student->id)->hidden(),

                    Button::make('Chiqarish')
                        ->method('deleteFromGroup')
                        ->type(Color::PRIMARY())
                        ->icon('action-undo'),
                ]),
            ])->title('Talabani guruxdan chiqarish'),

        ];
    }
}
