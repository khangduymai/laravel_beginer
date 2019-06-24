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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check-in', 'TimeTrackingController@showCheckIn')->name('show-check-in');
Route::post('/check-in', 'TimeTrackingController@checkIn')->name('check-in');

Route::get('/check-out', 'TimeTrackingController@showCheckOut')->name('show-check-out');
Route::post('/check-out/{userId}', 'TimeTrackingController@checkOut')->name('check-out');
