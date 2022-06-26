<?php
namespace App\Traits;

trait GetValue
{
    public static function getTextByKey($key, $student_name)
    {
        return str_replace('@name', $student_name, self::query()->where('key', $key)->pluck('message')->first());
    }
}
