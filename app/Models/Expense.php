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

}
