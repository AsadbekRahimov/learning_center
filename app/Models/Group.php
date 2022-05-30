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

    protected $fillable = ['name', 'subject_id', 'branch_id', 'day_type'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id')->withTrashed();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }

    protected $allowedFilters = [
        'subject_id',
        'branch_id',
        'day_type',
    ];
}
