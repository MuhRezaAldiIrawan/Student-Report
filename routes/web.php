<?php

use App\Http\Controllers\Auth\Api\AuthContoller;
use App\Http\Controllers\Auth\AuthSociliateContoller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;


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


Route::group(['middleware' => ['web']], function () {
    Route::get('/auth/{provider}', [AuthSociliateContoller::class, 'redirectToProvider']);
    Route::get('/auth/{provider}/callback', [AuthSociliateContoller::class, 'handleProvideCallback']);
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
