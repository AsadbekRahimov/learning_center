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
        return $this->hasMany(GroupRoom::class, 'room_id', 'id')->orderBy('time', 'ASC');
    }

    public function room_groups($lesson_ids)
    {
        return $this->hasMany(GroupRoom::class, 'room_id', 'id')
            ->where('room_id', $this->id)
            ->whereNotIn('group_id', $lesson_ids)
            ->orderBy('time', 'ASC');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id')->withTrashed();
    }
}
