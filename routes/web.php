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

Route::middleware('auth')->group(function(){
    Route::get('/todoList', 'TaskController@index');
    Route::get('/create', 'TaskController@create_View');
    Route::get('/tasks/view/{num}', 'TaskController@View');
    Route::post('/create_todoList', 'TaskController@todoList');
    Route::delete('/delete/{num}', 'TaskController@delete');
    Route::get('/edit/{num}', 'TaskController@edit');
    Route::put('/update/{num}', 'TaskController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
