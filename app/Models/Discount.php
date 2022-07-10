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
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'student_id',
        'price',
        'type',
        'desc',
    ];

    public const TYPES = [
       'exam' => 'Imtixon chegirmasi',
       'privilege' => 'Imtiyozli talaba',
    ];
}
