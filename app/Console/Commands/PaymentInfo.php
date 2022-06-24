<?php

namespace App\Console\Commands;

use App\Models\Branch;
use App\Models\Student;
use App\Services\TelegramNotify;
use Illuminate\Console\Command;
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
        // TODO  sms text replace
        $numbers = [];
        $message = 'O\'qish uchun to\'lov muddati keldi, tolovni tezroq amalga oshirishingizni soraymiz. Saxovat ta\'lim';
        foreach (Branch::query()->where('payment_period', '=', 'monthly')->get() as $branch)
        {
            $students_info = null;
            if (date('j') === date('t')) {
                $students = Student::query()->where('branch_id', $branch->id)->get();

                foreach ($students as $student)
                {
                    if (is_null($student->phone)) {
                        $students_info .=  "\r\n" . 'ID: ' . $student->id . '| F.I.O: ' . $student->fio_name;
                        //TelegramNotify::sendMessage($error_message, 'oylik_tolov_ogoxlantirish', $student->branch->name);
                    } else {
                        try {
                            Sms::send(Student::telephoneFormMessage($student->phone), $message);
                        }catch (\Exception $e){
                            //
                        }
                        sleep(3); // TODO change max execution time in server
                    }
                }
            }
            if (!is_null($students_info)) {
                $error_message = 'Talabaning telefon raqami yo\'qligi sababli to\'lov vaqti kelganligi haqida sms yuborilmadi!';
                $error_message .= $students_info;
                TelegramNotify::sendMessage($error_message, 'oylik_tolov_ogoxlantirish', $branch->name);
            }
        }
    }
}
