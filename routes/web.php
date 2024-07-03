<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/schedules', App\Http\Controllers\ScheduleController::class);
Route::put('/schedules/{schedule}/updateByCalendar', [App\Http\Controllers\ScheduleController::class, 'updateByCalendar'])->name('schedules.updateByCalendar');