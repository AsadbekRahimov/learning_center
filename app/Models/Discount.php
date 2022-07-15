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
        return self::query()->create([
            'student_id' => $student_id,
            'type' => 'group',
            'price' => $group->subject->price - $price,
        ]);
    }
}
