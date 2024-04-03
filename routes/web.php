<?php

use App\Http\Controllers\MasterData\DosenController;
use App\Http\Controllers\Auth\AuthSociliateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\MahasiswaBimbingan\BimbinganController;
use App\Http\Controllers\MasterData\MahasiswaController;
use App\Http\Controllers\User\UserController;


use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {

    Route::get('/', 'index')->name('default');
    Route::get('/register','register')->name('register');
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

    Route::get('/forget-password', 'forgetpassword')->name('forget-password');
    Route::post('/forgotpassword', 'forgotpassword_action')->name('password.email');
    Route::get('reset-password/{token}', 'create')->name('password.reset');
    Route::post('reset-password', 'store')->name('password.store');

});

Route::controller(DashboardController::class)->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::controller(UserController::class)->group(function () {

    Route::get('/user-profile', 'profile')->name('user');
    Route::get('/user-setting', 'userSetting')->name('user-setting');
    Route::post('/user-update', 'userUpdate')->name('user-update');


});

Route::controller(DosenController::class)->group(function () {

    Route::get('/dosen' , 'index')->name('dosen');
    Route::post('/dosen' , 'store')->name('dosen.store');
    Route::get('/delete-dosen/{id}' , 'destroy')->name('dosen.destroy');
    Route::post('/update-dosen' , 'update')->name('dosen.update');

    Route::get('/dosen-create-page', 'createView')->name('dosen.create-page');

    Route::get('/modal-get', 'modalAdd')->name('modal-add');
    Route::get('/modal-edit/{id}' , 'show')->name('dosen.edit');
    Route::get('/modal-import-dosen' , 'modalImport')->name('dosen.import');
    Route::get('/download-tamplate', 'downloadTamplate')->name('dosen.download-tamplate');
    Route::post('/import-dosen', 'importDosen')->name('dosen.import-dosen');
});

Route::controller(MahasiswaController::class)->group(function () {

    Route::get('/mahasiswa' , 'index')->name('mahasiswa');
    Route::get('/modal-mahasiswa', 'modalUp')->name('mahasiswa.modal-mahasiswa');
    Route::get('/mahasiswa-create-page', 'createView')->name('mahasiswa.create-page');
    Route::post('/mahasiswa' , 'store')->name('mahasiswa.store');
    Route::get('/modal-edit-mahasiswa/{id}' , 'show')->name('mahasiswa.edit');
    Route::post('/update-mahasiswa' , 'update')->name('mahasiswa.update');
    Route::get('/delete-mahasiswa/{id}' , 'destroy')->name('mahasiswa.destroy');

    Route::get('/modal-import-mahasiswa' , 'modalImport')->name('mahasiswa.import');
    Route::post('/import-mahasiswa', 'importMahasiswa')->name('mahasiswa.import-mahasiswa');

});

Route::controller(BimbinganController::class)->group(function () {

    Route::get('/bimbingan', 'index')->name('bimbingan');

});





