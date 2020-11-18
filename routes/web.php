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


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('/patients', 'PatientController');
    Route::resource('/measurements', 'MeasurementController');
    Route::resource('/diaries', 'DiaryController');
    Route::resource('/users', 'UserController');
    Route::get('/excel/diario/{patient}', 'DiaryController@excel')->name('diaries.excel');
    Route::get('/excel/dados/{patient}', 'MeasurementController@excel')->name('measurements.excel');
});
