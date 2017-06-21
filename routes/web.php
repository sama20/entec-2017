<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('auth');

Route::get('/users', 'UserController@index')->name('users')->middleware('auth');

Route::get('/doctors', 'DoctorController@index')
    ->name('doctors.index')
    ->middleware('auth');

Route::get('/doctor/create', 'DoctorController@create')
    ->name('doctor.create')
    ->middleware('auth');

Route::post('/doctor', 'DoctorController@store')
    ->name('doctor.save')
    ->middleware('auth');

Route::get('/doctor/{doctor}/edit', 'DoctorController@edit')
    ->name('doctor.edit')
    ->middleware('auth');
Route::post('/doctor/{doctor}/update', 'DoctorController@update')
    ->name('doctor.update')
    ->middleware('auth');

Route::get('/doctor/{doctor}/delete', 'DoctorController@delete')
    ->name('doctor.delete')
    ->middleware('auth');

Route::get('/doctor/{doctor}/appointments', 'DoctorController@appointments')
    ->name('doctor.appointments')
    ->middleware('auth');

Route::get('/appointments', 'AppointmentController@index')
    ->name('appointments.index')
    ->middleware('auth');

Route::get('/appointment/create', 'AppointmentController@create')
    ->name('appointment.create')
    ->middleware('auth');

Route::post('/appointment', 'AppointmentController@store')
    ->name('appointment.save')
    ->middleware('auth');

Route::get('/appointment/{appointment}/delete', 'AppointmentController@delete')
    ->name('appointment.delete')
    ->middleware('auth');
