<?php


namespace App\Services;


use App\Models\Action;
use App\Models\Discount;
use App\Models\Expense;
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
            $returned_balance = round((self::getSubjectPrice($group) / 12) * $group->lesson_limit, -3);
            $student->returnBalance($returned_balance);
            $group->delete();
            $message = 'Talaba ' . $group->group->name . ' guruxidan chiqarildi, uning xisobida qolgan' . $limit
                .' ta dars limitlari xisobidan ' . $returned_balance . ' so\'m qaytarildi';
            Action::deleteFromGroup($student->id, $returned_balance, $message);
            Alert::success($message);
        } else {
            $today = date('j'); // number of  current date this month
            $last_day = date('t'); // number of last day in month
            $returning = self::returningPaymentForThisMonth($group, $today, $last_day);
            $student->returnBalance($returning['balance']);
            $group->delete();
            $message = 'Talaba ' . $group->group->name . ' guruxidan chiqarildi, uning xisobida qolgan ' . $returning['days'] . ' ta dars limitlari xisobidan ' .
                $returning['balance'] . ' so\'m talaba xisobiga qaytarildi';
            Action::deleteFromGroup($student->id, $returning['balance'], $message);
            Alert::success($message);
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
                    $message = 'Talaba ' . $group->name . ' guruxiga qo\'shildi. Bu guruxda oy oxirigacha qolgan ' . $results['days'] .
                        ' ta dars xisobidan ' . $results['price'] . ' so\'m talabaning xisobidan yechildi';
                    Action::studentAddGroup($message, $request->student_id, $results['price']);
                    if($new_student->price !== null) { Discount::groupDiscount($group, $request->student_id, $new_student->price ); }
                    Alert::success($message);
                } else {
                    Alert::success('Talaba guruxga qo\'shildi');
                }
            } elseif ($request->has('lesson_limit')) {
                if ($request->lesson_limit == '0') { // qolgan dars limiti kiritilmagandagi xolatda
                    $subject_price = is_null($new_student->price) ? $group->subject->price : $new_student->price;
                    self::getGroupPayment($request, $subject_price);
                    $message = 'Talaba ' . $group->name . ' guruxiga qo\'shildi, Uning xisobidan 12 ta dars uchun ' . $subject_price . ' miqdoridagi pul yechib olindi';
                    Action::studentAddGroup($message, $request->student_id, $subject_price);
                    Alert::success($message);
                } else {
                    Alert::success('Talaba guruxga qo\'shildi');
                }
            }

        } else {
            Alert::warning('Talabani guruxga qo\'shish uchun gurux mavjud emas');
        }
    }

    private static function getMonthlyPayFromBalance($student_id, $group_id, $price)
    {
        $student = Student::query()->find($student_id);
        $group = Group::query()->with(['subject'])->find($group_id);
        $today = date('j'); // number of  current date this month
        $last_day = date('t'); // number of last day in month
        $remaining_lessons = self::returningLesson($group, $today, $last_day);
        $lessons_this_month = self::lessonsThisMonth($group, $last_day);

        if ($lessons_this_month) {
            $monthly_subject_price = is_null($price) ? $group->subject->price : $price;
            $remaining_payment_for_this_month = round(($monthly_subject_price / $lessons_this_month) * $remaining_lessons, -3);
        }

        $student->getFromBalance($remaining_payment_for_this_month);

        return [
            'days' => $remaining_lessons,
            'price' => $remaining_payment_for_this_month,
        ];
    }

    private static function getGroupPayment(\Illuminate\Http\Request $request, $subject_price)
    {
        $student = Student::query()->find($request->student_id);
        $student->getFromBalance($subject_price);
    }

    public static function getPayment(\Illuminate\Http\Request $request)
    {
        $student = Student::query()->find($request->student_id);
        Action::studentPayment($student, $request->sum, $request->type);
        if ($student->debt > 0) {
            $student->returnBalance($request->sum);
        }else {
            $student->balance += $request->sum;
            $student->save();
        }
        return $student;
    }

    private static function returningLesson(Group $group,  $today,  $last_day)
    {
        $lessons = 0;
        for($i = $today + 1; $i <= $last_day; $i++) // calculate returning lessons
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week

            if ($group->day_type === 'even' and in_array($day, Group::EVEN_DAYS)) {
                $lessons++;
            }elseif ($group->day_type === 'odd' and in_array($day, Group::ODD_DAYS)) {
                $lessons++;
            }
        }
        return $lessons;
    }

    private static function lessonsThisMonth(Group $group,  $last_day)
    {
        $lessons_this_month = 0;
        for($i = 1; $i <= $last_day; $i++) // calculate all lessons count in this month
        {
            $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
            if ($group->day_type === 'even' and in_array($day, Group::EVEN_DAYS)) {
                $lessons_this_month++;
            }elseif ($group->day_type === 'odd' and in_array($day, Group::ODD_DAYS)) {
                $lessons_this_month++;
            }
        }
        return $lessons_this_month;
    }

    private static function returningPaymentForThisMonth(StudentGroup $group,  $today,  $last_day)
    {
        $lessons_this_month = self::lessonsThisMonth($group->group, $last_day);
        $returning_lessons = self::returningLesson($group->group, $today, $last_day);
        if ($lessons_this_month) {
            $returning_payment_for_this_month = round((self::getSubjectPrice($group) / $lessons_this_month) * $returning_lessons, -3);
        }
        return [
            'days' => $returning_lessons,
            'balance' => $returning_payment_for_this_month,
        ];
    }

    public static function getSubjectPrice(StudentGroup $group)
    {
        return is_null($group->price) ? $group->group->subject->price : $group->price;
    }

    public static function rollbackPayment(\Illuminate\Http\Request $request)
    {
        $student = Student::query()->find($request->id);
        if ($student->balance < $request->sum) {
            Alert::error('Talabaning xisobida '. number_format($request->sum) . ' so\'m mavjud emas');
        } else {
            $student->balance -= $request->sum;
            $student->save();
            Expense::studentBalanceRollBack($student, $request->sum);
            $message = 'Talabaning xisobidan '. number_format($request->sum) . ' so\'m unga qaytarildi';
            Action::rollbackPayment($message, $request);
            Alert::success($message);
        }
    }

    public static function changeGroupPrice(\Illuminate\Http\Request $request)
    {
        $group = Group::query()->find($request->group_id);
        StudentGroup::query()->where('student_id', '=', $request->student_id)
            ->where('group_id', '=', $request->group_id)
            ->update(['price' => $request->price]);
        $message = 'Talabaning ' . $group->name . ' guruxi narxi '. number_format($request->price) . ' so\'mga o\'zgartirildi';
        Action::changeGroupPrice($request, $message);
        Alert::success($message);
    }
}
