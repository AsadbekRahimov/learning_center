<?php

namespace App\Orchid\Layouts\Group;

use App\Models\Attandance;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class GroupAttandTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attand';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected $title = "Guruxning bugungi davomati";

    protected function columns(): iterable
    {
        return [
            TD::make('student_id', 'Talaba')->render(function (Attandance $attandance) {
                return $attandance->student->name;
            })->cantHide(),
            TD::make('attand', 'Davomat')->render(function (Attandance $attandance) {
                return Button::make($attandance->attand ? 'Keldi' : 'Kelmadi')
                    ->method('notComing')->type($attandance->attand ? Color::SUCCESS() : Color::DANGER())->parameters([
                        'id' => $attandance->id,
                    ]);
            })->cantHide(),
        ];
    }
}
