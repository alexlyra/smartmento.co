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

Route::controller(App\Http\Controllers\LandPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});


Route::prefix('/cadastrar')->name('register.')->controller(App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/mentor', 'mentor')->name('mentor');
    Route::post('/mentor', 'mentorRegister')->name('mentor.register');

    Route::get('/mentee', 'mentee')->name('mentee');
    Route::post('/mentee', 'menteeRegister')->name('mentee.register');
});