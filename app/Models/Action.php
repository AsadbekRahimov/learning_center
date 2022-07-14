<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Action extends Model
{
    use HasFactory;
    use AsSource,  Attachable;

    protected $fillable = [
        'student_id',
        'price',
        'type',
        'action',
        'desc',
    ];


    public const TYPES = [
        'changeStatus' => 'Talaba ta\'lim bosqichi yangilandi',
        'changePrivilege' => 'Talaba statusi yangilandi',
        'payment' => 'Talaba tolov qildi',
        'group_add' => 'Talaba guruxga qo\'shildi'
    ];


    public static function changeStudentStatus(Student $student,  $status)
    {
        return self::query()->create([
            'student_id' => $student->id,
            'type' => 'changeStatus',
            'desc' => 'Talabaning ta\'lim bosqichi ' . Student::STATUS[$student->status] . ' dan ' . Student::STATUS[$status] . ' ga ' . Auth::user()->name . ' tomonidan yangilandi!',
        ]);
    }

    public static function changeStudentPrivilege(Student $student, $privilege)
    {
        return self::query()->create([
            'student_id' => $student->id,
            'type' => 'changePrivilege',
            'desc' => 'Talabaning xolati ' . Student::PRIVILEGE[$student->privilege] . ' dan ' . Student::PRIVILEGE[$privilege] . ' ga ' .  Auth::user()->name . ' tomonidan yangilandi!',
        ]);
    }

    public static function studentPayment(Student $student, $sum, $type)
    {
        return self::query()->create([
            'student_id' => $student->id,
            'type' => 'payment',
            'action' => '1',
            'price' => $sum,
            'desc' => 'Talabaning xisobi ' . $sum . ' so\'mga ' . Payment::TYPES[$type] . ' orqali ' . Auth::user()->name . ' tomonidan to\'ldirildi!',
        ]);
    }

    public static function studentAddGroup($message, $student_id, $price)
    {
        return self::query()->create([
            'student_id' => $student_id,
            'type' => 'group_add',
            'action' => '0',
            'price' => $price,
            'desc' => Auth::user()->name . ' tomonidan ' . $message,
        ]);
    }
}
