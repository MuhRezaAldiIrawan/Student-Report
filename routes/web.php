<?php

use App\Http\Controllers\Auth\AuthSociliateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;


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

Route::get('/', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_action'])->name('register');
Route::post('/login', [AuthController::class, 'login_action'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/forgotpassword', [PasswordResetController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [PasswordResetController::class, 'forgotpassword_action'])->name('password.email');
Route::get('reset-password/{token}', [PasswordResetController::class, 'create'])->name('password.reset');


Route::group(['middleware' => ['web']], function () {
    Route::get('/auth/{provider}', [AuthSociliateController::class, 'redirectToProvider']);
    Route::get('/auth/{provider}/callback', [AuthSociliateController::class, 'handleProvideCallback']);
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
