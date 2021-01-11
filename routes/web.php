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

    Route::prefix('servico')->group(function () {
        Route::get('/diario', 'DiaryController@service')->name('diaries.service');
        Route::get('/medicao', 'MeasurementController@service')->name('measurements.service');
        Route::get('/usuarios', 'UserController@service')->name('users.service');
        Route::get('/pacientes', 'PatientController@service')->name('patients.service');
    });
    Route::resource('/pacientes', 'PatientController')->names('patients')->parameters(['pacientes' => 'patient']);
    Route::resource('/medicoes', 'MeasurementController')->names('measurements')->parameters(['medicoes' => 'measurement']);
    Route::resource('/diarios', 'DiaryController')->names('diaries')->parameters(['diarios' => 'diary']);
    Route::resource('/usuarios', 'UserController')->names('users')->parameters(['usuarios' => 'user']);
    Route::get('/excel/pacientes', 'PatientController@excel')->name('patients.excelAll');
    Route::get('/excel/{patient}', 'PatientController@excelPatient')->name('patients.excel');
});
