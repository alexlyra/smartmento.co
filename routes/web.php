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


Route::prefix('/login')->controller(App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'login')->name('authenticate');
});

Route::controller(App\Http\Controllers\LandPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/cadastrar')->name('register.')->middleware(['guest'])->controller(App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/mentor', 'mentor')->name('mentor');
    Route::post('/mentor', 'mentorRegister')->name('mentor.register');

    Route::get('/mentee', 'mentee')->name('mentee');
    Route::post('/mentee', 'menteeRegister')->name('mentee.register');
});

Route::prefix('/email')->name('verification.')->controller(App\Http\Controllers\Auth\EmailVerificationController::class)->group(function () {
    Route::get('/verificacao', 'mustVerify')->middleware('auth')->name('notice');
    Route::get('/verificacao/{id}/{hash}', 'verify')->middleware(['auth', 'signed'])->name('verify');
    Route::post('/reenviar', 'send')->middleware(['auth', 'throttle:6,1'])->name('send');
});