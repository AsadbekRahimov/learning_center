<?php

namespace App\Models;

use App\Traits\GetValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Message extends Model
{
    use HasFactory, GetValue;
    use AsSource, Filterable, Attachable;
    public $timestamps = false;
    protected $fillable = ['key', 'value', 'message'];
}
