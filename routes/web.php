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


Route::get('admin', 'AdminController@index');

Route::get('login', 'UserController@index')->name('login.form');
Route::post('login/attempt', 'UserController@attempt')->name('login.attempt');

Route::get('register', 'UserController@create')->name('register.form');
Route::post('register/attempt', 'UserController@store')->name('register.attempt');

Route::post('logout', 'UserController@destroy')->name('logout');

Route::get('homepage', 'LayoutController@homepage')->name('homepage');
Route::get('contact', 'LayoutController@contact')->name('contact');