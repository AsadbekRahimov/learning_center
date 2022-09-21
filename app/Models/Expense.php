<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public const MONTH = [
        1 => 'Yanvar',
        2 => 'Fevral',
        3 => 'Mart',
        4 => 'Aprel',
        5 => 'May',
        6 => 'Iyun',
        7 => 'Iyul',
        8 => 'Avgust',
        9 => 'Sentyabr',
        10 => 'Oktyabr',
        11 => 'Noyabr',
        12 => 'Dekabr',
    ];

    protected $fillable = [
        'price',
        'type',
        'desc',
        'branch_id',
        'teacher_id'
    ];

    protected $allowedFilters = [
        'teacher_id',
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
            'desc' => date('Y') . ' yil ' . self::MONTH[date('n')] . ' dagi ' . $group->name . ' gurux darslari uchun ' .  Auth::user()->name . ' tomonidan  ' . number_format($salary) . ' so\'m miqdorida ' . $group->teacher->name . ' uchun oylik maosh berildi',
        ]);
    }


    public static function giveSalaries($teacher, $salary, $group_names, $year, $month)
    {
        return self::query()->create([
            'branch_id' => $teacher->branch_id,
            'price' => $salary,
            'teacher_id' => $teacher->id,
            'type' => 'salary',
            'desc' => $year . ' yil ' . self::MONTH[(int)$month] . ' dagi ' . $group_names . ' gurux darslari uchun ' .  Auth::user()->name . ' tomonidan  ' . number_format($salary) . ' so\'m miqdorida ' . $teacher->name . ' uchun oylik maosh berildi',
        ]);
    }
}
