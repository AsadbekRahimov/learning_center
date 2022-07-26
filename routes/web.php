<?php

use App\Models\Lesson;
use App\Services\GroupService;
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

Route::get('/deleteGroupRoom/{id}', function ($id) {
    $groupRoom = \App\Models\GroupRoom::find($id);
    $groupRoom->delete();
    return redirect()->back();
})->middleware('auth')->name('deleteGroupRoom');

Route::get('/addLesson/{id}', function ($id) {
    $group = \App\Models\Group::find($id);
    Lesson::query()->create([
        'date' => date('Y-m-d'),
        'group_id' => $group->id,
        'teacher_id' => $group->teacher_id,
        'payment' => GroupService::calculatedLessonPrice($group),
        'finish' => 0,
    ]);
    \Orchid\Support\Facades\Alert::success('Gurux uchun dars qoshildi, yo\'qlama qilishingiz mumkin!');
    return redirect()->route('platform.groupInfo', ['group' => $group->id]);
})->middleware('auth')->name('addLesson');

Route::get('/checkPrint/{id}', function ($id) {
    $receipt = \App\Models\Payment::query()->find($id);
    return view('printCheck', compact('receipt'));
})->name('checkPrint');
