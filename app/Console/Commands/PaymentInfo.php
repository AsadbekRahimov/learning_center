<?php

namespace App\Console\Commands;

use App\Models\Student;
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
        // TODO parent phone or student phone, sms text | only monthly branch
        $numbers = [];
        $message = 'O`qish uchun to\'lov muddati keldi, tolovni tezroq amalga oshirishingizni soraymiz. Saxovat ta\'lim';
        if (date('d') === date('t')) {
            $numbers = Student::query()->whereNotNull('parent_phone')->pluck('parent_phone');
        }
        foreach ($numbers as $number)
        {
            try {
                Sms::send(Student::telephoneFormMessage($number), $message);
            }catch (\Exception $e){
                # TODO send notify to telegram
            }
        }
    }
}
