<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Teacher extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'branch_id',
        'head_teacher_id',
        'balance',
        'percent',
        'last_payment',
        'last_paid_date',
    ];

    public function group()
    {
        return $this->hasOne(Group::class, 'teacher_id', 'id')->withTrashed();
    }

    public function headTeacher()
    {
        return $this->belongsTo(Teacher::class, 'head_teacher_id', 'id');
    }

    public function lowTeachers()
    {
        return $this->hasMany(Teacher::class, 'head_teacher_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'teacher_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
