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

    $val = ["Test","name"];

    return view('welcome',[
        'val'=>$val
    ]);
});

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
