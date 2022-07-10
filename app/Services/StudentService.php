<?php


namespace App\Services;


use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Orchid\Support\Facades\Alert;

class StudentService
{

    public static function returnGroupBalance(StudentGroup $group, Student $student)
    {
        $limit = $group->lesson_limit;
        if ($student->branch->payment_period == 'daily')
        {
            // TODO: add privilige students logic for delete from group
            $returned_balance = round(($group->group->subject->price / 12) * $group->lesson_limit, -3);
            $student->returnBalance($returned_balance);
            $group->delete();
            Alert::success('Talaba guruxdan o\'chirildi, uning xisobida qolgan' . $limit .' ta dars limitlari xisobidan ' . $returned_balance . ' so\'m qaytarildi');
        } else {
            // TODO: add privilige students logic for delete from group
            $today = date('j'); // number of  current date this month
            $last_day = date('t'); // number of last day in month
            $returning_lessons = 0;
            $lessons_this_month = 0;
            for($i = $today + 1; $i <= $last_day; $i++) // calculate returning lessons
            {
                $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
                if ($group->group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                    $returning_lessons++;
                }elseif ($group->group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                    $returning_lessons++;
                }
            }

            for($i = 1; $i <= $last_day; $i++) // calculate all lessons count in this month
            {
                $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
                if ($group->group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                    $lessons_this_month++;
                }elseif ($group->group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                    $lessons_this_month++;
                }
            }

            if ($lessons_this_month) {
                $returning_payment_for_this_month = round(($group->group->subject->price / $lessons_this_month) * $returning_lessons, -3);
            }

            if ($student->debt >= $returning_payment_for_this_month) {
                $student->debt -= $returning_payment_for_this_month;
            } else {
                $student->balance += $returning_payment_for_this_month - $student->debt;
                $student->debt = 0;
            }
            $student->save();
            $group->delete();
            Alert::success('Talaba guruxdan o\'chirildi, uning xisobida qolgan ' . $returning_lessons . ' ta dars limitlari xisobidan ' .
                $returning_payment_for_this_month . ' so\'m talaba xisobiga qaytarildi');
        }
    }

    public static function addToGroup(\Illuminate\Http\Request $request)
    {
        if ($request->has('group_id')) {
            $group = Group::query()->with(['subject'])->find($request->group_id);
            $new_student = StudentGroup::saveStudent($request);

            if ($request->has('payed')) { // Talaba oylik rejimda royhatdan o`tganda | oydi oxirigacha tolovni xisoblash
                if ($request->payed === '0') {
                    $results = self::getMonthlyPayFromBalance($request->student_id, $request->group_id, $new_student->price);
                    Alert::success('Talaba guruxga qo\'shildi. Bu guruxda oy oxirigacha qolgan ' . $results['days'] .
                        ' ta dars xisobidan ' . $results['price'] . ' so\'m talabaning xisobidan yechildi');
                } else {
                    Alert::success('Talaba guruxga qo\'shildi');
                }
            } elseif ($request->has('lesson_limit')) {
                if ($request->lesson_limit == '0') { // qolgan dars limiti kiritilmagandagi xolatda
                    $subject_price = is_null($new_student->price) ? $group->subject->price : $new_student->price;
                    self::getGroupPayment($request, $subject_price);
                    Alert::success('Talaba guruxga qo\'shildi, Uning xisobidan 12 ta dars uchun '
                        . $subject_price . ' miqdoridagi pul yechib olindi');
                } else {
                    Alert::success('Talaba guruxga qo\'shildi');
                }
            }

        } else {
            Alert::warning('Talabani guruxga qo\'shish uchun gurux mavjud emas');
        }
    }

    private function getMonthlyPayFromBalance($student_id, $group_id, $price)
    {
        $student = Student::query()->find($student_id);
        $group = Group::query()->with(['subject'])->find($group_id);
        $today = date('j'); // number of  current date this month
        $last_day = date('t'); // number of last day in month
        $remaining_lessons = 0;
        $lessons_this_month = 0;
        for($i = $today + 1; $i <= $last_day; $i++) // calculate remaining lessons
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
            if ($group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                $remaining_lessons++;
            }elseif ($group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                $remaining_lessons++;
            }
        }

        for($i = 1; $i <= $last_day; $i++) // calculate all lessons count in this month
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
            if ($group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
                $lessons_this_month++;
            }elseif ($group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
                $lessons_this_month++;
            }
        }

        if ($lessons_this_month) {
            $monthly_subject_price = is_null($price) ? $group->subject->price : $price;
            $remaining_payment_for_this_month = round(($monthly_subject_price / $lessons_this_month) * $remaining_lessons, -3);
        }

        if ($student->balance >= $remaining_payment_for_this_month) {
            $student->balance -= $remaining_payment_for_this_month;
        } else {
            $student->debt += $remaining_payment_for_this_month - $student->balance;
            $student->balance = 0;
        }
        $student->save();

        $results = [
            'days' => $remaining_lessons,
            'price' => $remaining_payment_for_this_month,
        ];

        return $results;
    }

    private static function getGroupPayment(\Illuminate\Http\Request $request, $subject_price)
    {
        $student = Student::query()->find($request->student_id);
        if ($student->balance >= $subject_price) {
            $student->balance -= $subject_price;
        } else {
            $student->debt += ($subject_price - $student->balance);
            $student->balance = 0;
        }
        $student->save();
    }

    public static function getPayment(\Illuminate\Http\Request $request)
    {
        $student = Student::query()->find($request->student_id);
        if ($student->debt > 0) {

            if ($student->debt > $request->sum) {
                $student->debt -= $request->sum;
            } else {
                $student->balance += ($request->sum - $student->debt);
                $student->debt = 0;
            }

        }else {
            $student->balance += $request->sum;
        }
        $student->save();
        return $student;
    }
}
