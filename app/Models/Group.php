<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Group extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable;

    public const DAY_TYPE = [
        'odd' => 'Toq kunlar',
        'even' => 'Juft kunlar',
    ];

    public const EVEN_DAYS = [
        'Tuesday',
        'Thursday',
        'Saturday',
    ];

    public const ODD_DAYS = [
        'Monday',
        'Wednesday',
        'Friday',
    ];

    protected $fillable = [
        'name',
        'subject_id',
        'branch_id',
        'teacher_id',
        'day_type',
        'is_active'
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id')->withTrashed();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id')->withTrashed();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }

    public function students()
    {
        return $this->hasMany(StudentGroup::class, 'group_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'group_id', 'id');
    }

    protected $allowedFilters = [
        'name',
        'subject_id',
        'branch_id',
        'day_type',
    ];

    protected $allowedSorts = [
        'is_active',
        'day_type',
    ];

    public function getAllNameAttribute($value)
    {
        return $this->name . ' (' . $this->subject->name . ' : ' . $this->subject->price . ')';
    }

    public function getNameWithTypeAttribute($value)
    {
        return $this->name . ' (' . self::DAY_TYPE[$this->day_type] . ')';
    }
}
