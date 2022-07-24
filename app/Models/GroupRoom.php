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
        return $this->belongsTo(Group::class, 'group_id', 'id')->orderBy('day_type', 'desc');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public static function getTimeline($time, $duration)
    {
        $hour = (int) $time / 1;
        $minute = ($time - $hour) * 100;
        return self::startTime($hour, $minute) . '-' . self::endTime($hour, $minute, $duration);
    }

    private static function startTime($hour, $minute)
    {
        if($minute == 0)
            return $hour . ':00';
        else
            return $hour . ':' . $minute;
    }

    private static function endTime($hour, $minute, $duration)
    {
        $minutes = ($hour * 60) + $minute + $duration;
        $endHour = (int)($minutes / 60);
        if ($minutes % 60 == 0) {
            $endMinute = '00';
        } else {
            $endMinute = $minutes % 60;
        }
        return $endHour . ':' . $endMinute;
    }
}
