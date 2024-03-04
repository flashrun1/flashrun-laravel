<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\RaceController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders');
    Route::get('/order/create', 'create')->name('orders.create');
    Route::post('/orders', ['middleware' => 'throttle:5,1'], 'store')->name('orders.store');
    Route::post('/liqpay/callback', 'callbackStatus')->name('callback-status');
    Route::get('/liq-pay/payment-result', 'paymentResult')->name('payment-result');
    Route::post('/admin/orders/{order}/set-paid', 'setPaid')->name('admin.orders.set-paid');
    Route::post('/admin/orders/{order}/set-unpaid', 'setUnpaid')->name('admin.orders.set-unpaid');
    Route::post('/admin/orders/{order}/set-deleted', 'setDeleted')->name('admin.orders.set-deleted');
});

Route::controller(PromocodeController::class)->group(function () {
    Route::get('/promocodes', 'index')->name('promocodes');
    Route::post('/promocodes', 'store')->name('promocodes.store');
});

Route::post('/race-register', [RaceController::class, 'register'])->name('race-register');
Route::get('/races/{raceId}/participants', [RaceController::class, 'participants'])->name('race-participants');

Auth::routes();
Route::get('/admin/home/EgZjaHJvbWUyCQgAEEUY', [HomeController::class, 'index'])
    ->name('admin/home/EgZjaHJvbWUyCQgAEEUY')
    ->middleware('auth');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
