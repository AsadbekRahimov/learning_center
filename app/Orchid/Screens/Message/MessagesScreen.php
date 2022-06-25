<?php

namespace App\Orchid\Screens\Message;

use Orchid\Screen\Screen;

class MessagesScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Xabarlar';
    }

    public function description(): ?string
    {
        return 'Markaz tomonidan jonatiladigan xabarlarning matnlari';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.editMessages'
        ];
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

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

        ];
    }
}
