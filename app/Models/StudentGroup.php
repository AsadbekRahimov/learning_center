<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class StudentGroup extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'student_id',
        'group_id',
        'lesson_limit',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function attandances()
    {
        return $this->hasMany(Attandance::class, 'student_id', 'student_id');
    }

    public function attand_count()
    {
        return $this->attandances->where('attand', '=', 1)->count() . ' / ' . $this->attandances->count();
    }

    public function attand_percent()
    {
        return ($this->attandances->where('attand', '=', 1)->count() / $this->attandances->count()) * 100 . ' %';
    }
}
