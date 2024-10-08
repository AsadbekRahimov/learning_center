<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Student;
use App\Models\TemporaryGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class NewStudentsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'students';

    protected $title = 'Vaqtinchalik talabalar';
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $subjects = Cache::get('subjects');
        $sources = Cache::get('sources');
        return [
             TD::make('name', 'Ism'),
             TD::make('surname', 'Familiya'),
             TD::make('phone', 'Shaxsiy raqam 1')->render(function (TemporaryGroup $student) {
                 return Link::make($student->phone)->href('tel:' . Student::telephone($student->phone));
             }),
             TD::make('parent_phone', 'Shaxsiy raqam 2')->render(function (TemporaryGroup $student) {
                return Link::make($student->parent_phone)->href('tel:' . Student::telephone($student->parent_phone));
             }),
             TD::make('subject_id', 'Fan')->render(function (TemporaryGroup $student) use ($subjects) {
                 return $subjects[$student->subject_id];
             }),
             TD::make('source_id', 'Hamkor')->render(function (TemporaryGroup $student) use ($sources){
                return $sources[$student->source_id];
             }),
             TD::make('action', 'Amallar')->render(function (TemporaryGroup $student) {
                 return DropDown::make()->icon('options-vertical')->list([
                     Button::make('Doimiy talabalar safiga qo\'shish')
                         ->icon('plus')
                         ->confirm('Talabani doimiy talim uchun qabul qilmoqchimisiz?')
                         ->method('addStudent', [
                             'id' => $student->id,
                         ]),
                     Button::make('O\'chirish')
                        ->icon('trash')
                        ->confirm('Rostdan xam bu talabni o`chirmoqchimisiz?')
                        ->method('deleteStudent', [
                            'id' => $student->id,
                        ])
                 ]);
             }),
        ];
    }

    public function total():array
    {
        return [
            TD::make('', 'Yangi guruxga biriktish')->render(function () {
                return ModalToggle::make('YANGI GURUXGA BIRIKTIRISH')
                    ->type(Color::SUCCESS())
                    ->modal('newGroupModal')
                    ->method('newGroup')
                    ->icon('graduation')
                    ->canSee(Auth::user()->hasAccess('platform.temporaryStudent'));
            }),
        ];
    }
}
