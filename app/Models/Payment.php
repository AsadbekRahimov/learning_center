<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Payment extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = ['student_id', 'sum', 'type'];

    public const TYPES = [
         'paper' => 'Naqt',
         'card' => 'Bank kartasi',
         'digital' => 'Click/Payme/...'
    ];
}
