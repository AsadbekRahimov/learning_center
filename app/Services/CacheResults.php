<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Room;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Cache;

class CacheResults
{

    public static function cacheAll()
    {
        if (!Cache::has('students'))
        {
            Cache::rememberForever('students', function (){
                return Student::query()->get()->pluck('fio_name', 'id');
            });
        }

        if (!Cache::has('privilege'))
        {
            Cache::rememberForever('privilege', function (){
                return Student::query()->get()->pluck('privilege', 'id');
            });
        }

        if (!Cache::has('groups'))
        {
            Cache::rememberForever('groups', function (){
                return Group::query()->pluck('name', 'id');
            });
        }

        if (!Cache::has('rooms'))
        {
            Cache::rememberForever('rooms', function (){
                return Room::query()->pluck('name', 'id');
            });
        }

        if (!Cache::has('sources'))
        {
            Cache::rememberForever('sources', function (){
                return Source::query()->pluck('name', 'id');
            });
        }

        if (!Cache::has('subjects'))
        {
            Cache::rememberForever('subjects', function (){
                return Subject::query()->pluck('name', 'id');
            });
        }

        if (!Cache::has('teachers'))
        {
            Cache::rememberForever('teachers', function (){
                return Teacher::query()->pluck('name', 'id');
            });
        }
    }
}
