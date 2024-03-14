<?php

use App\Http\Controllers\Auth\AuthSociliateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\User\UserController;


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
Route::controller(AuthController::class)->group(function () {

    Route::get('/', 'index')->name('default');
    Route::get('/register','register');
    Route::post('/register','register_action')->name('register');
    Route::post('/login','login_action')->name('login');
    Route::post('/logout','logout')->name('logout');

});

Route::controller(AuthSociliateController::class)->group(function () {

    Route::group(['middleware' => ['web']], function () {
        Route::get('/auth/{provider}', 'redirectToProvider');
        Route::get('/auth/{provider}/callback', 'handleProvideCallback');
    });

});

Route::controller(PasswordResetController::class)->group(function () {

    Route::get('/forgotpassword', 'forgotpassword')->name('forgotpassword');
    Route::post('/forgotpassword', 'forgotpassword_action')->name('password.email');
    Route::get('reset-password/{token}', 'create')->name('password.reset');
    Route::post('reset-password', 'store')->name('password.store');

});

Route::controller(DashboardController::class)->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::controller(UserController::class)->group(function () {

    Route::get('/user-profile', 'index')->name('user');
    Route::get('/user-setting', 'userSetting')->name('user-setting');
    Route::post('/user-update', 'userUpdate')->name('user-update');


});











