<?php

namespace App\Orchid\Layouts\Message;

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class SendMessageLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Relation::make('branch_id')
                ->title('Filial')
                ->fromModel(Branch::class, 'name')
                ->required()->canSee(!Auth::user()->branch_id),
            Input::make('brand_id')
                ->type('hidden')
                ->value(Auth::user()->branch_id)->canSee(!is_null(Auth::user()->branch_id)),
            TextArea::make('message')->required()->rows(5)->title('Xabar matni')->help('Bu SMS xabar barcha filial talabalarga jo\'natiladi!'),
        ];
    }
}
