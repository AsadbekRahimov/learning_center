<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Room extends Model
{
    use HasFactory;
    use AsSource, Filterable;

    protected $fillable = [
        'name',
        'branch_id',
    ];

    protected $allowedFilters = [
        'name',
        'branch_id'
    ];

    public function groups()
    {
        return $this->hasMany(GroupRoom::class, 'group_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }
}
