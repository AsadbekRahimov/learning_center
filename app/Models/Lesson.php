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

    public function attandances()
    {
        return $this->hasMany(Attandance::class, 'lesson_id', 'id');
    }


    public function attand_count()
    {
        if ($this->attandances->where('attand', '!=', 2)->count())
            return $this->attandances->where('attand', '=', 1)->count() . ' / ' . $this->attandances->where('attand', '!=', 2)->count();
        else
            return 0;
    }

    public function attand_percent()
    {
        if ($this->attandances->where('attand', '!=', 2)->count())
            return round(($this->attandances->where('attand', '=', 1)->count() / $this->attandances->where('attand', '!=', 2)->count()) * 100) . ' %';
        else
            return 0;
    }
}
