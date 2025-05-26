<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\ExtGreetingController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('greeting/{name?}',[GreetingController::class,'greet']);

Route::get('/extgreeting', [ExtGreetingController::class, 'input'])->name('extgreeting.index');
Route::get('/extgreeting/input', [ExtGreetingController::class, 'input'])->name('extgreeting.input');
Route::post('/extgreeting/greet', [ExtGreetingController::class, 'greet'])->name('extgreeting.greet');


