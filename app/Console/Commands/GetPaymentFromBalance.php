<?php

namespace App\Console\Commands;

use App\Models\Action;
use App\Models\Discount;
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
            $students = Student::query()->with(['branch', 'groups.group'])->whereHas('branch', function (Builder $query) {
                $query->where('payment_period', '=', 'monthly');
            })->where('status', 'accepted')->get();
            foreach ($students as $student)
            {
                $monthly_payment = 0;
                foreach ($student->groups as $group)
                {
                    $payment = StudentService::getSubjectPrice($group);
                    $monthly_payment += $payment;
                    Action::getLessonPay($group->student_id, $payment, $group->group->name);
                    if($group->price !== null) { Discount::groupDiscount($group->group, $student->id, $group->price); }
                }
                $student->getFromBalance($monthly_payment);
            }
        }
    }
}
