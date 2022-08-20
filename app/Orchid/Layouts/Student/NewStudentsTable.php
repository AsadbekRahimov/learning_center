<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Student;
use App\Models\TemporaryGroup;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

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
        return [
             TD::make('name', 'Ism'),
             TD::make('surname', 'Familiya'),
             TD::make('phone', 'Shaxsiy raqam')->render(function (TemporaryGroup $student) {
                 return Link::make($student->phone)->href('tel:' . Student::telephone($student->phone));
             }),
            TD::make('parent_phone', 'Shaxsiy raqam')->render(function (TemporaryGroup $student) {
                return Link::make($student->parent_phone)->href('tel:' . Student::telephone($student->parent_phone));
            }),
             TD::make('subject_id', 'Fan')->render(function (TemporaryGroup $student) {
                 return $student->subject->name;
             }),
            TD::make('source_id', 'Hamkor')->render(function (TemporaryGroup $student) {
                return $student->source->name;
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
}
