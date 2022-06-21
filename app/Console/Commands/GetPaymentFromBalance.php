<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Contracts\Database\Eloquent\Builder;

class GetPaymentFromBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (date('j') == '21')
        {
            $students = Student::query()->with(['branch'])->whereHas('branch', function (Builder $query) {
                $query->where('payment_period', '=', 'monthly');
            })->get();

            foreach ($students as $student)
            {
                $monthly_payment = 0;
                foreach ($student->groups as $group)
                {
                    $monthly_payment += $group->group->subject->price;
                }
                if ($student->balance >= $monthly_payment) {
                    $student->balance -= $monthly_payment;
                } else {
                    $student->debt += $monthly_payment - $student->balance;
                    $student->balance = 0;
                }
                $student->save();
            }
        }
    }
}
