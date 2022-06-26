<?php

namespace App\Orchid\Layouts\Message;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class MessageEditLayout extends Rows
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
            TextArea::make('message.message')
                ->required()
                ->rows(5)
                ->title('Matni')
                ->help('@name kalit so\'zini talabaning ismi yoziladigan qismida qoyib keting!'),
        ];
    }
}
