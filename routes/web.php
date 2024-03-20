<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/admin/orders/EgZjaHJvbWUyCQgAEEUY', 'index')->name('orders')->middleware('auth');
    Route::get('/admin/order/create/EgZjaHJvbWUyCQgAEEUY', 'create')->name('orders.create')->middleware('auth');
    Route::post('/admin/orders/EgZjaHJvbWUyCQgAEEUY', ['middleware' => 'throttle:5,1'], 'store')->name('orders.store')->middleware('auth');
    Route::post('/liqpay/callback', 'callbackStatus')->name('callback-status');
    Route::get('/liq-pay/payment-result', 'paymentResult')->name('payment-result');
    Route::post('/admin/orders/{order}/set-paid/EgZjaHJvbWUyCQgAEEUY', 'setPaid')->name('admin.orders.set-paid')->middleware('auth');
    Route::post('/admin/orders/{order}/set-unpaid/EgZjaHJvbWUyCQgAEEUY', 'setUnpaid')->name('admin.orders.set-unpaid')->middleware('auth');
    Route::post('/admin/orders/{order}/set-deleted/EgZjaHJvbWUyCQgAEEUY', 'setDeleted')->name('admin.orders.set-deleted')->middleware('auth');
});

Route::controller(PromocodeController::class)->group(function () {
    Route::get('/admin/promocodes/EgZjaHJvbWUyCQgAEEUY', 'index')->name('promocodes')->middleware('auth');
    Route::post('/admin/promocodes/EgZjaHJvbWUyCQgAEEUY', 'store')->name('promocodes.store')->middleware('auth');
});

Route::controller(RaceController::class)->group(function () {
    Route::get('/admin/races/EgZjaHJvbWUyCQgAEEUY', 'index')->name('races.index')->middleware('auth');
    Route::get('/admin/race-types/EgZjaHJvbWUyCQgAEEUY', 'raceTypesIndex')->name('race-types.index')->middleware('auth');

    Route::get('/admin/create-race/EgZjaHJvbWUyCQgAEEUY', 'createRaceIndex')->name('create-race.index')->middleware('auth');
    Route::post('/admin/create-race/EgZjaHJvbWUyCQgAEEUY', 'createRaceStore')->name('create-race.store')->middleware('auth');
    Route::get('/admin/create-race-type/EgZjaHJvbWUyCQgAEEUY', 'createRaceTypeIndex')->name('create-race-type.index')->middleware('auth');
    Route::post('/admin/create-race-type/EgZjaHJvbWUyCQgAEEUY', 'createRaceTypeStore')->name('create-race-type.store')->middleware('auth');
    Route::get('/admin/create-race-form/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'createRaceFormIndex')->name('create-race-form.index')->middleware('auth');
    Route::post('/admin/create-race-form/EgZjaHJvbWUyCQgAEEUY', 'createRaceFormStore')->name('create-race-form.store')->middleware('auth');

    Route::get('/admin/edit-race/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'updateRaceView')->name('edit-race.index')->middleware('auth');
    Route::post('/admin/edit-race/EgZjaHJvbWUyCQgAEEUY', 'updateRace')->name('edit-race.store')->middleware('auth');
    Route::get('/admin/edit-race-type/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'updateRaceTypeView')->name('edit-race-type.index')->middleware('auth');
    Route::post('/admin/edit-race-type', 'updateRaceType')->name('edit-race-type.store')->middleware('auth');
    Route::get('/admin/edit-race-form/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'updateRaceFormView')->name('edit-race-form.index')->middleware('auth');
    Route::post('/admin/edit-race-form', 'updateRaceForm')->name('edit-race-form.store')->middleware('auth');

    Route::get('/admin/delete-race/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'deleteRace')->name('delete-race')->middleware('auth');
    Route::get('/admin/delete-race-type/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'deleteRaceType')->name('delete-race-type')->middleware('auth');
    Route::get('/admin/delete-race-form/EgZjaHJvbWUyCQgAEEUY/id/{id}', 'deleteRaceForm')->name('delete-race-form')->middleware('auth');

    Route::post('/race-register', 'register')->name('race-register');
    Route::get('/races/{raceId}/participants', 'participants')->name('race-participants');
});

Auth::routes();
Route::get('/admin/login/EgZjaHJvbWUyCQgAEEUY', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login/EgZjaHJvbWUyCQgAEEUY', [LoginController::class, 'login'])->name('admin.login.post');
Route::get('/admin/home/EgZjaHJvbWUyCQgAEEUY', [HomeController::class, 'index'])
    ->name('admin.home')
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
