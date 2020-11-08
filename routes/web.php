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
Route::get('/task/create/{idsprint}', 'TaskController@create')->name('task.create');
Route::get('/task/{idsprint}/{idtask}/edit', 'TaskController@edit')->name('task.edit');

//Laporan Harian CRUD
Route::get('laporan/harian/{idsprint}', 'HarianController@index')->name('harian.index');
Route::get('laporan/harian/show/{daily}', 'HarianController@show')->name('harian.show');
Route::get('laporan/harian/create/{idsprint}', 'HarianController@create')->name('harian.create');
Route::post('laporan/harian/create', 'HarianController@store')->name('harian.store');
Route::get('laporan/harian/edit/{idsprint}/{iddaily}', 'HarianController@edit')->name('harian.edit');
Route::put('laporan/harian/{iddaily}/update', 'HarianController@update')->name('harian.update');
Route::delete('laporan/harian/destroy{daily}', 'HarianController@destroy')->name('harian.destroy');


// Laporan Sprint CRUD
Route::get('laporan/sprint/{idproject}', 'LaporsprintController@index')->name('laporan.sprint.index');
Route::get('laporan/sprints/{sprints}/{idproject}/show', 'LaporsprintController@show')->name('laporan.sprint.show');
Route::get('laporan/sprint/{idproject}/create', 'LaporsprintController@create')->name('laporan.sprint.create');
Route::post('laporan/sprint/store/{idproject}', 'LaporsprintController@store')->name('laporan.sprint.store');
// idsprint disini itu adaalah sprint report
Route::get('laporan/sprint/{idsprint}/{idproject}/edit', 'LaporsprintController@edit')->name('laporan.sprint.edit');
Route::put('laporan/sprint/{idsprint}/{idproject}/update', 'LaporsprintController@store')->name('laporan.sprint.update');
Route::delete('laporan/sprints/{sprints}', 'LaporsprintController@destroy')->name('laporan.sprint.destroy');
