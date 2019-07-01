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
})->name('welcome');
Route::group(['prefix' => 'tasks'],function (){
    Route::get('/index', 'TaskController@index')->name('tasks.index');
    Route::get('/create', 'TaskController@create')->name('tasks.create');
    Route::post('/create', 'TaskController@store')->name('tasks.store');
    Route::get('/delete/{id}', 'TaskController@delete')->name('tasks.delete');
    Route::get('/edit/{id}', 'TaskController@edit')->name('tasks.edit');
    Route::post('/edit/{id}', 'TaskController@update')->name('tasks.update');


});
