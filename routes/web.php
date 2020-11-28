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
Route::get('/sprint/{idproject}/{idsprint}', 'ProjectController@tampil')->name('sprint.index');


// Task CRUD
Route::resource('/task', 'TaskController');
Route::post('/task/store/{idproject}/{idsprint}', 'TaskController@store')->name('task.store');
Route::get('/task/create/{idproject}/{idsprint}', 'TaskController@create')->name('task.create');
Route::get('/task/edit/{idproject}/{idsprint}/{idtask}', 'TaskController@edit')->name('task.edit');
Route::put('/task/update/{idproject}/{idsprint}/{idtask}', 'TaskController@update')->name('task.update');

//Laporan Harian CRUD
Route::get('laporan/harian/{idproject}/{idsprint}', 'HarianController@index')->name('harian.index');
Route::get('laporan/harian/show/{idproject}/{idsprint}/{iddaily}', 'HarianController@show')->name('harian.show');
Route::get('laporan/harian/create/{idproject}/{idsprint}', 'HarianController@create')->name('harian.create');
Route::post('laporan/harian/store/{idproject}/{idsprint}', 'HarianController@store')->name('harian.store');
Route::get('laporan/harian/edit/{idproject}/{idsprint}/{iddaily}', 'HarianController@edit')->name('harian.edit');
Route::put('laporan/harian/update/{idproject}/{idsprint}/{iddaily}', 'HarianController@update')->name('harian.update');
Route::delete('laporan/harian/destroy{daily}', 'HarianController@destroy')->name('harian.destroy');


// Laporan Sprint CRUD
Route::get('laporan/sprint/{idproject}', 'LaporsprintController@index')->name('laporan.sprint.index');
Route::get('laporan/sprints/{sprints}/{idproject}/show', 'LaporsprintController@show')->name('laporan.sprint.show');
Route::get('laporan/sprint/{idproject}/create', 'LaporsprintController@create')->name('laporan.sprint.create');
Route::post('laporan/sprint/store/{idproject}', 'LaporsprintController@store')->name('laporan.sprint.store');
// idsprint disini itu adaalah sprint report
Route::get('laporan/sprint/{idsprint}/{idproject}/edit', 'LaporsprintController@edit')->name('laporan.sprint.edit');
Route::put('laporan/sprint/{idreport}/{idproject}/update', 'LaporsprintController@update')->name('laporan.sprint.update');
Route::delete('laporan/sprints/{sprints}', 'LaporsprintController@destroy')->name('laporan.sprint.destroy');
// Untuk Scrum Master Feedback
Route::post('laporan/sprint/feedback/{idsprint}', 'LaporsprintController@feedback')->name('laporan.sprint.feedback');
