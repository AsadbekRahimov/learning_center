<?php

namespace App\Console\Commands;

use App\Models\Action;
use App\Models\Branch;
use App\Models\Discount;
use App\Models\Payment;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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
            $students = Student::query()->with(['branch', 'groups.group'])->whereHas('branch', function (Builder $query) {
                $query->where('payment_period', '=', 'monthly');
            })->where('status', 'accepted')->where('branch_id', Auth::user()->branch_id)->get();
            foreach ($students as $student)
            {
                $monthly_payment = 0;
                foreach ($student->groups as $group)
                {
                    $payment = StudentService::getSubjectPrice($group);
                    $monthly_payment += $payment;
                    Action::getLessonPay($group->student_id, $payment, $group->group->name);
                    if($group->price !== null) { Discount::groupDiscount($group->group, $student->id, $group->price); }
                    Payment::addPaymentForStudent($monthly_payment, $student, $group->group_id);
                }
            }

            Branch::find(Auth::user()->branch_id)->update([
                'last_payment_month' => date('n')
            ]);

    }
}
