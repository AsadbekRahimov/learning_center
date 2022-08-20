<?php


namespace App\Services;


use App\Models\Action;
use App\Models\Discount;
use App\Models\Expense;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\TemporaryGroup;
use Illuminate\Support\Facades\Auth;
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

    public static function createGroupWithStudents(\Illuminate\Http\Request $request)
    {
        $branch_id = Auth::user()->branch_id;
        $ids = self::getTemporaryAddedStudentIds($request->students);
        $students_ids = self::addToRealStudents($ids);
        $new_group = Group::addGroup($request);
        self::addStudentToGroup($students_ids, $new_group->id, $new_group->subject->price, $branch_id);
    }

    private static function getTemporaryAddedStudentIds($students)
    {
        $ids = [];
        foreach ($students as $student) {
            if ($student['add'] === '1') {
                $ids[] = (int)$student['id'];
            }
        }
        return $ids;
    }

    private static function addToRealStudents(array $ids)
    {
        $student_ids = [];
        foreach ($ids as $id) {
            $student = TemporaryGroup::query()->find($id);
            $new_student = Student::createNewStudent($student);
            $student->delete();
            $student_ids[] = $new_student->id;
        }
        return $student_ids;
    }

    private static function addStudentToGroup($students_ids, $group_id, $subject_price, $branch_id)
    {
        foreach ($students_ids as $id) {
            StudentGroup::saveStudents($id, $group_id);
            Payment::addPaymentForNewStudent($id, $group_id, $subject_price, $branch_id);
        }
    }
}
