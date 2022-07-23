<?php


namespace App\Services;


use App\Models\Action;
use App\Models\Discount;
use App\Models\Expense;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Orchid\Support\Facades\Alert;

class GroupService
{
    public static function calculatedLessonPrice(Group $group)
    {
        $group_price = $group->subject->price;
        $lesson_price = 0;
        $teacher_percent = $group->teacher->percent;
        $lessons_this_month = StudentService::lessonsThisMonth($group, date('t'));
        if ($group->branch->payment_period == 'monthly') {
            foreach($group->students as $student)
            {
                if (is_null($student->price))
                    $lesson_price += ($group_price / $lessons_this_month) * $teacher_percent / 100;
                else
                    $lesson_price += ($student->price / $lessons_this_month) * $teacher_percent / 100;
            }

            $group->teacher->balance += $lesson_price;
            $group->teacher->save();

            return  $lesson_price;
        } else {
            return 0;
        }
    }
}
