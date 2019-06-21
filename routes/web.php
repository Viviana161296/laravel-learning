<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/projects','ProjectsController@index');
Route::post('/projects','ProjectsController@store');
Route::get('/projects/{project}','ProjectsController@show');
Route::get('/projects/create','ProjectsController@create');
Route::get('/projects/{project}/edit','ProjectsController@edit');
Route::path('/projects/{project}','ProjectsController@update');
Route::delete('/projects/{project}','ProjectsController@destroy');

*/

Route::get('/', function () {
    return view('welcome');
});

route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');
Route::patch('/tasks/{task}', 'ProjectTaskController@update');
