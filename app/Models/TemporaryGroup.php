<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class TemporaryGroup extends Model
{
    use HasFactory;
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'branch_id',
        'name',
        'surname',
        'phone',
        'parent_phone',
        'subject_id',
        'source_id'
    ];

    public static function createStudent(\Illuminate\Http\Request $request)
    {
        return self::query()->create([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'subject_id' => $request->subject_id,
            'source_id' => $request->source_id,
        ]);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
}
