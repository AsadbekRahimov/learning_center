<?php

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
})->name('deleteGroupRoom');
