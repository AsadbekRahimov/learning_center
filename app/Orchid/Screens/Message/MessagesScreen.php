<?php

namespace App\Orchid\Screens\Message;

use App\Models\Message;
use App\Orchid\Layouts\Message\MessageEditLayout;
use App\Orchid\Layouts\Message\MessagesListTable;
use App\Orchid\Layouts\Message\SendMessageLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class MessagesScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'messages' => Message::query()->get(),
        ];
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
            ModalToggle::make('Xabar jonatish')
                ->modal('sendMessageModal')
                ->icon('envelope-open')
                ->method('sendMessage')
                ->canSee('platform.editMessages'),
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
            MessagesListTable::class,
            Layout::modal('asyncEditMessageModal', MessageEditLayout::class)->async('asyncGetUser')->applyButton('Saqlash')->closeButton('Yopish'),
            Layout::modal('sendMessageModal', SendMessageLayout::class)->applyButton('Jo\'natish')->closeButton('Yopish'),
        ];
    }

    public function asyncGetUser(Message $message)
    {
        return [
            'message' => $message,
        ];
    }

    public function saveMessage(Request $request, Message $message)
    {
        $message->message = $request->message['message'];
        $message->save();
        Alert::success('SMS matni saqlandi!');
    }
}
