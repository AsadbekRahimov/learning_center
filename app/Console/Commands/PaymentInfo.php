<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Notifications\AdminNotify;
use Illuminate\Console\Command;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;
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
        if (date('j') === date('t')) {
            $numbers = Student::query()->with(['branch'])->whereHas('branch', function (Builder $query) {
                 $query->where('payment_period', '=', 'monthly');
            })->whereNotNull('phone')->pluck('phone');
        }

        foreach ($numbers as $number)
        {
            $erro_message = 'Tolov vaqti kelganligi haqida sms yuborishda xatolik. Raqam: ' . $number;
            try {
                Sms::send(Student::telephoneFormMessage($number), $message);
            }catch (\Exception $e){
                //Notification::send($erro_message, new AdminNotify()); // TODO check notify working
            }
            sleep(3);
        }
    }
}
