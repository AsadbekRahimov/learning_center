<?php

namespace App\Orchid\Screens\Message;

use App\Models\Branch;
use App\Models\Message;
use App\Models\Student;
use App\Orchid\Layouts\Message\MessageEditLayout;
use App\Orchid\Layouts\Message\MessagesListTable;
use App\Orchid\Layouts\Message\SendMessageLayout;
use App\Services\TelegramNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Napa\R19\Sms;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

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

    public function sendMessage(Request $request)
    {
        $students = Student::query()->where('branch_id', $request->branch_id)->whereNot('status', 'finished')->get();
        $branch = Branch::query()->find($request->branch_id);
        $students_info = null;
        $message = $request->message;
        $count = 0;
        foreach ($students as $student)
        {
            if (is_null($student->phone)) {
                $students_info .=  "\r\n" . 'ID: ' . $student->id . '| F.I.O: ' . $student->fio_name;
            } else {
                $count++;
                try {
                    Sms::send(Student::telephoneFormMessage($student->phone), $message);
                }catch (\Exception $e){
                    //
                }
                sleep(2); // TODO change max execution time in server
            }
        }
        if (!is_null($students_info)) {
            $error_message = 'Talabaning telefon raqami yo\'qligi sababli umumiy sms yuborilmadi!';
            $error_message .= $students_info;
            TelegramNotify::sendMessage($error_message, 'umumiy_sms_xatoligi', $branch->name);
        }
        Alert::info('SMS  ' . $count . ' ta talabaga yuborildi!');
    }
}
