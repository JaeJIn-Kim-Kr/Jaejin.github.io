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
    Route::get('/todoList',         'TaskController@index');            // Todo List Main Page
    Route::get('/create',           'TaskController@create_View');      // Todo List Create Page
    Route::get('/tasks/view/{num}', 'TaskController@View');             // Todo List Detail Page
    Route::post('/create_todoList', 'TaskController@todoList');         // Todo List Create
    Route::get('/delete/{num}',  'TaskController@delete');           // Todo List Delete
    Route::get('/edit/{num}',       'TaskController@edit');             // Todo List Edit Page
    Route::get('/todo/complete',    'TaskController@completeList');     // Todo List Edit Page
    Route::get('/todo/incomplete',    'TaskController@incompleteList');   // Todo List Edit Page

    Route::put('/update/{num}',     'TaskController@update');           // Todo List Update
    Route::put('/complete/{num}',   'TaskController@complete');         // Todo List Complete
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
