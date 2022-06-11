<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'phone',
        'birthday',
        'address',
        'tg_username',
        'parent_phone',
        'source_id',
        'branch_id',
        'registered_id',
        'come_date',
        'comment',
        'hobbies',
        'balance',
        'status',
        'privilege'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id')->withTrashed();
    }

    public function registered()
    {
        return $this->belongsTo(User::class, 'branch_id', 'id')->withTrashed();
    }

    public function groups() {
        return $this->hasMany(StudentGroup::class, 'student_id', 'id');
    }

    public const STATUS = [
        'accepted' => 'Qabul qilingan',
        'stopped' => 'Vaqtincha to`xtatilgan',
        'finished' => 'Yakunlangan'
    ];

    public static function telephone($number) {
        return '+998' . str_replace(['(', ')', '-', ' '], '', $number);
    }

    protected $allowedSorts = [
        'id',
        'privilege',
        'come_date',
        'balance',
        'debt',
        'updated_at',
        'created_at',
    ];

    protected $allowedFilters = [
        'name',
        'surname',
        'lastname',
        'phone',
        'birthday',
        'privilege',
        'status',
        'source_id',
        'address',
        'registered_id',
        'come_date',
        'branch_id',
    ];

    public function attandances()
    {
        return $this->hasMany(Attandance::class, 'student_id', 'id');
    }

    public function attand_count()
    {
        return $this->attandances->where('attand', '=', 1)->count() . ' / ' . $this->attandances->count();
    }

    public function attand_percent()
    {
        return ($this->attandances->where('attand', '=', 1)->count() / $this->attandances->count()) * 100;
    }
}
