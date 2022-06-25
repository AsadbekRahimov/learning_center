<?php

namespace App\Orchid\Layouts\Message;

use App\Models\Message;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class MessagesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'messages';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('value', 'SMS xabar matni')->render(function (Message $message) {
                return ModalToggle::make($message->value)
                    ->modal('asyncEditMessageModal')
                    ->modalTitle($message->value)
                    ->method('saveMessage')
                    ->asyncParameters([
                        'message' => $message->id,
                    ]);
            }),
        ];
    }
}
