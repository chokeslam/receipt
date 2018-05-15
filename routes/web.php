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


//receipt route
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/admin', 'IndexController@admin')->name('admin');

Route::POST('/create', 'IndexController@create')->name('create');
Route::POST('/createsales', 'IndexController@createsales')->name('createsales');
Route::POST('/checkuser', 'IndexController@checkuser')->name('checkuser');

Route::get('/index/{Name}', 'IndexController@close')->name('close');
Route::POST('/index/CheckNumbers', 'IndexController@CheckNumbers')->name('CheckNumbers');
Route::POST('/index/CheckNumbers/Check', 'IndexController@Check')->name('Check');



Route::get('/retrieve', 'RetrieveController@retrieve')->name('retrieve');
Route::POST('/index/RollBack', 'RetrieveController@rollback')->name('RollBack');

Route::get('/Disabled', 'DisabledController@Disabled')->name('Disabled');