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

Route::get("/",'RegistrationController@index')->name('home');
Route::get("register",'RegistrationController@create')->name('user.create');
Route::post("register",'RegistrationController@store')->name('user.store');
Route::get("edit/{id}",'RegistrationController@edit')->name('user.edit');
Route::put("update/{id}",'RegistrationController@update')->name('user.update');

Route::get("login",'UserController@show')->name('login.show');
Route::post("login",'UserController@store')->name('logon.store');
Route::get("logout",'UserController@distroy')->name('login.logout');
