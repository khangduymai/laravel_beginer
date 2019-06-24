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

Route::get('/checkin', 'TimeTrackingController@showCheckin');
Route::post('/checkin', 'TimeTrackingController@checkin')->name('checkin');

Route::get('/checkout', 'TimeTrackingController@showCheckout');
Route::post('/checkout', 'TimeTrackingController@checkout')->name('checkout');
