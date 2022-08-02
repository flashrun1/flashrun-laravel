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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);

Route::post('/race-register', [\App\Http\Controllers\RaceController::class, 'register'])
    ->name('race-register');

Route::post('/liqpay/callback', [\App\Http\Controllers\OrderController::class, 'callbackStatus'])
    ->name('callback-status');
