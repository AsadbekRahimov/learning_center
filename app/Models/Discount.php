<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Discount extends Model
{
    use HasFactory;
    use AsSource,  Attachable;

    protected $fillable = [
        'student_id',
        'price',
        'type',
    ];

    public const TYPES = [
       'exam' => 'Imtixon chegirmasi',
       'group' => 'Gurux to\'lovi chegirmasi',
    ];

    public static function groupDiscount(Group $group, $student_id, $price)
    {
        $discount = $group->subject->price - $price;
        self::saveStudentDiscount($student_id, $discount);
        return self::query()->create([
            'student_id' => $student_id,
            'type' => 'group',
            'price' => $discount,
        ]);
    }

    private static function saveStudentDiscount($student_id, $discount)
    {
        $student = Student::query()->find($student_id);
        $student->discount += $discount;
        $student->save();
    }
}
