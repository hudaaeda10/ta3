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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', 'HomeController@show')->name('dashboard');

// route ke project menuju sprint
Route::get('/project', 'ProjectController@index')->name('project');
Route::get('/project/{idproject}', 'ProjectController@show')->name('project.index');
Route::get('/sprint/{idsprint}', 'ProjectController@tampil')->name('sprint.index');

// Task CRUD
Route::resource('/task', 'TaskController');
