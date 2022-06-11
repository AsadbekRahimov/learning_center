<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Lesson extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = [
       'date',
       'group_id',
       'finish'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(StudentGroup::class, 'group_id', 'group_id');
    }

}
