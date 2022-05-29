<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Subject extends Model
{
    use SoftDeletes;
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = ['name', 'price', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }

    protected $allowedFilters = [
        'branch_id'
    ];
}
