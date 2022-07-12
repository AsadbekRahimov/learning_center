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

    public static function studentBalanceRollBack(Student $student, $sum)
    {
        return self::query()->create([
            'branch_id' => $student->branch_id,
            'price' => $sum,
            'type' => 'payment_rollback',
            'desc' => '№' . $student->id . ' | ' . $student->fio_name . ' ning ' . $sum . '  puli ' . Auth::user()->name . ' tomonidan qaytarildi!',
        ]);
    }
}
