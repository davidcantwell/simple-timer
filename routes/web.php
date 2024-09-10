<?php

use App\Http\Controllers\StupidLoginController;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\ManageTimerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StupidAuth;


Route::get('/', [TimerController::class, 'showActive']);

Route::group(['prefix' => 'login', 'middleware' => 'throttle:60,1'], function () {
    Route::get('/', [StupidLoginController::class, 'showForm']);
    Route::post('/', [StupidLoginController::class, 'login']);
});



Route::group(['prefix' => 'manage', 'middleware' => StupidAuth::class], function () {
    Route::get('/', [ManageTimerController::class, 'list']);
    Route::get('create', [ManageTimerController::class, 'create']);
    Route::get('edit', [ManageTimerController::class, 'edit']);

    Route::post('timer/create', [ManageTimerController::class, 'insert']);
    Route::post('timer/update', [ManageTimerController::class, 'update']);
});


