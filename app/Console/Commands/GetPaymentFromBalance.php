<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Services\StudentService;
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
        if (date('j') == '1')
        {
            $students = Student::query()->with(['branch'])->whereHas('branch', function (Builder $query) {
                $query->where('payment_period', '=', 'monthly');
            })->where('status', 'accepted')->get();

            foreach ($students as $student)
            {
                $monthly_payment = 0;
                foreach ($student->groups as $group)
                    $monthly_payment += StudentService::getSubjectPrice($group);
                $student->getFromBalance($monthly_payment);
            }
        }
    }
}
