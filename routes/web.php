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
    return view('auth.login');
});

Auth::routes();

Route::get('/index', 'IndexController@index')->name('index');
Route::get('/admin', 'IndexController@admin')->name('admin');

Route::POST('/create', 'IndexController@create')->name('create');
Route::POST('/createsales', 'IndexController@createsales')->name('createsales');
Route::POST('/checkuser', 'IndexController@checkuser')->name('checkuser');

Route::get('/index/{Name}', 'IndexController@close')->name('close');
Route::POST('/index/CheckNumbers', 'IndexController@CheckNumbers')->name('CheckNumbers');