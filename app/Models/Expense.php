<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Expense extends Model
{
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
        'branch_id',
        'teacher_id'
    ];

    protected $allowedFilters = [
        'price',
        'type',
        'desc',
        'branch_id',
        'created_at',
    ];

    protected $allowedSorts = [
        'price',
        'type',
        'desc',
        'branch_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public static function studentBalanceRollBack(Student $student, $sum)
    {
        return self::query()->create([
            'branch_id' => $student->branch_id,
            'price' => $sum,
            'type' => 'payment_rollback',
            'desc' => '№' . $student->id . ' | ' . $student->fio_name . ' ning ' . $sum . '  puli ' . Auth::user()->name . ' tomonidan qaytarildi!',
        ]);
    }

    public static function makeExpense(\Illuminate\Http\Request $request)
    {
        return self::query()->create([
            'branch_id' => $request->branch_id,
            'price' => $request->sum,
            'type' => 'other',
            'desc' => Auth::user()->name . ' tomonidan ' . number_format($request->sum) . ' so\'mga ' . $request->desc . ' uchun chiqim qilindi',
        ]);
    }

    public static function giveSalary(Group $group, $salary)
    {
        return self::query()->create([
            'branch_id' => $group->branch_id,
            'price' => $salary,
            'teacher_id' => $group->teacher_id,
            'type' => 'salary',
            'desc' => $group->name . ' gurux darslari uchun ' .  Auth::user()->name . ' tomonidan  ' . number_format($salary) . ' so\'m miqdorida ' . $group->teacher->name . ' uchun oylik maosh berildi',
        ]);
    }


    public static function giveSalaries($teacher, $salary, $group_names)
    {
        return self::query()->create([
            'branch_id' => $teacher->branch_id,
            'price' => $salary,
            'teacher_id' => $teacher->id,
            'type' => 'salary',
            'desc' => $group_names . ' gurux darslari uchun ' .  Auth::user()->name . ' tomonidan  ' . number_format($salary) . ' so\'m miqdorida ' . $teacher->name . ' uchun oylik maosh berildi',
        ]);
    }
}
