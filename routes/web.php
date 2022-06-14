<?php

use App\Models\Group;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/day', function () {
    $student = Student::query()->find(3);
    $group = Group::query()->find(5);
    $today = date('j'); // 14
    $last_day = date('t'); // 30
    $count = [];
    for($i = $today + 1; $i <= $last_day; $i++)
    {
        $day = date('l', mktime(0, 0, 0, date('m'), $i, date('Y'))); // day name of the week
        if ($group->day_type === 'even' and in_array($day, ['Tuesday', 'Thursday', 'Saturday'])) {
            $count[] = $day;
        }elseif ($group->day_type === 'odd' and in_array($day, ['Monday', 'Wednesday', 'Friday'])) {
            $count[] = $day;
        }
        $date = date('Y-m-' . $i);
    }
    return $count;
});
