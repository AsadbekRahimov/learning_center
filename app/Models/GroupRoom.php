<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'room_id',
        'time',
        'duration',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public static function getTimeline($value)
    {
        $hour = (int) $value / 1;
        $minute = ($value - $hour) * 100;
        return self::startTime($hour, $minute) . '-' . self::endTime($hour, $minute);
    }

    private static function startTime($hour, $minute)
    {
        if($minute == 0)
            return $hour . ':00';
        else
            return $hour . ':' . $minute;
    }

    private static function endTime($hour, $minute)
    {
        if($minute == 0) {
            return ($hour + 1) . ':30';
        } elseif($minute = 30) {
            return ($hour + 2 ) . ':00';
        } elseif($minute < 30) {
            return ($hour + 1) . ':' . ($minute + 30);
        } elseif ($minute > 30) {
            return ($hour + 2) . ':' . ($minute - 30);
        }
    }
}
