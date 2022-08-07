<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable, Chartable;

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
        'status',
        'privilege'
    ];

    public static function createStudent($student)
    {
        $name = explode(' ', $student['val0']);
        return self::query()->create([
            'name' => $name[0],
            'surname' => isset($name[1]) ? $name[1] : '',
            'phone' => self::getPhone($student['val1']),
            'source_id' => 6,
            'branch_id' => 3,
            'registered_id' => 1,
            'come_date' => date('d.m.Y'),
            'debt' => 0,
            'discount' => 0,
            'status' => 'accepted',
            'privilege' => 0,
        ]);
    }

    private static function getPhone($number)
    {
        if (!empty($number)) {
            $nums = explode(' ', $number);
            return '(' . $nums[0] . ') ' . $nums[1] . '-' . $nums[2] . '-' . $nums[3];
        } else {
            return null;
        }
    }

    public static function createNewStudent(TemporaryGroup $student)
    {
        return self::query()->create([
            'name' => $student->name,
            'surname' => $student->surname,
            'phone' => $student->number,
            'source_id' => $student->source_id,
            'branch_id' => $student->branch_id,
            'registered_id' => Auth::user()->id,
            'come_date' => date('d.m.Y'),
            'debt' => 0,
            'discount' => 0,
            'status' => 'accepted',
            'privilege' => 0,
        ]);
    }


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
        return $this->belongsTo(User::class, 'registered_id', 'id')->withTrashed();
    }

    public function groups() {
        return $this->hasMany(StudentGroup::class, 'student_id', 'id');
    }

    public const STATUS = [
        'accepted' => 'Faol',
        'stopped' => 'Vaqtincha to`xtatilgan',
        'finished' => 'Yakunlangan'
    ];

    public const PRIVILEGE = [
        '1' => 'Imtiyozli talaba',
        '0' => 'Oddiy talaba',
    ];

    public static function telephone($number) {
        return '+998' . str_replace(['(', ')', '-', ' '], '', $number);
    }
    public static function telephoneFormMessage($number) {
        return '998' . str_replace(['(', ')', '-', ' '], '', $number);
    }

    protected $allowedSorts = [
        'id',
        'privilege',
        'come_date',
        'debt',
        'discount',
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
        'created_at',
    ];

    public function attandances()
    {
        return $this->hasMany(Attandance::class, 'student_id', 'id');
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
            return round(($this->attandances->where('attand', '=', 1)->count() / $this->attandances->where('attand', '!=', 2)->count()) * 100);
        else
            return 0;
    }

    public function getFioNameAttribute()
    {
        return $this->name . ' ' . $this->surname . ' ' . $this->lastname;
    }

    public function returnBalance($returned_balance)
    {
        if ($this->debt >= $returned_balance) {
            $this->debt -= $returned_balance;
        } else {
            $this->balance += $returned_balance - $this->debt;
            $this->debt = 0;
        }
        $this->save();
    }

    public function getFromBalance($getting_balance)
    {
        if ($this->balance >= $getting_balance) {
            $this->balance -= $getting_balance;
        } else {
            $this->debt += ($getting_balance - $this->balance);
            $this->balance = 0;
        }
        $this->save();
    }
}
