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
    return view('welcome');
});

Route::get('/dashboard', 'HomeController@show')->name('dashboard');
Route::get('/project', 'ProjectController@index')->name('project');
Route::get('/project/{projects}', 'SprintController@index');
Route::get('/sprint/{projects}/{idsprints}', 'SprintController@show');
Route::post('/task/store', 'TaskController@store');
