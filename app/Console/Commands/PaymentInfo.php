<?php

namespace App\Console\Commands;

use App\Models\Branch;
use App\Models\Message;
use App\Models\Student;
use App\Services\TelegramNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Napa\R19\Sms;

class PaymentInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'info:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms notification about payment period is ended';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
                $students_info = null;
                $students = Student::query()->where('branch_id', Auth::user()->branch_id)->where('status', 'accepted')->get();

                foreach ($students as $student)
                {
                    if (is_null($student->phone)) {
                        $students_info .=  "\r\n" . 'ID: ' . $student->id . '| F.I.O: ' . $student->fio_name;
                    } else {
                        try {
                            $message = Message::getTextByKey('for_payment_info', $student->name);
                            Sms::send(Student::telephoneFormMessage($student->phone), $message);
                        }catch (\Exception $e){
                            //
                        }
                        sleep(2);
                    }
                }
                if (!is_null($students_info)) {
                    $error_message = 'Talabaning telefon raqami yo\'qligi sababli to\'lov vaqti kelganligi haqida sms yuborilmadi!';
                    $error_message .= $students_info;
                    TelegramNotify::sendMessage($error_message, 'oylik_tolov_ogoxlantirish', $branch->name);
                }
    }
}
