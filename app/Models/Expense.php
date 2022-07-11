<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Expense extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable;

    public const TYPE = [
        'other' => 'Boshqa xarajatlar',
        'payment_rollback' => 'Pul qaytarildi',
        'salary' => 'Oylik maosh',
    ];

    protected $fillable = [
        'price',
        'type',
        'desc',
    ];

    protected $allowedFilters = [
        'price',
        'type',
        'desc',
    ];

    protected $allowedSorts = [
        'price',
        'type',
        'desc',
    ];
}
