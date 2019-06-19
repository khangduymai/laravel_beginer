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


//Route for displaying all the project
Route::get('/', 'ProjectController@index');

//Route for storing data
Route::post('/', 'ProjectController@store');

//Route for create project page
Route::get('/create', 'ProjectController@create');