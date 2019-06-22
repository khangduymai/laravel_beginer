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


route::resource('projects','ProjectController');

route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

route::patch('tasks/{task}', 'ProjectTasksController@update');

//Route for displaying all the project
//Route::get('/projects', 'ProjectController@index');

//Route for display create project page 
//Route::get('/projects/create', 'ProjectController@create');

//Route for displaying specific project
//Route::get('/projects/{project}', 'ProjectController@show');

//Route for storing data
//Route::post('/projects', 'ProjectController@store');

//Route for display edit specific project
//Route::get('/projects/{project}/edit', 'ProjectController@edit');

//Route for patching (update) specific project
//Route::patch('/projects/{project}', 'ProjectController@update');

//Route for destroy (delete) specific project
//Route::delete('/projects/{project}', 'ProjectController@destroy');