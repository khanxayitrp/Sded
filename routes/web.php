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
// public route
Route::get('/','HomeController@Home')->name('index');



//Registaer section

Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/signin','HomeController@Login')->name('web.signin');

Route::get('/register','HomeController@Register')->name('web.signup');

Route::post('/sign-up','Auth\RegisterController@register')->name('register');

Route::get('/logout','Auth\LoginController@logout')->name('logout');


// Admin section

Route::get('/admin','WebadminController@Listdata')->name('webadmin.index')->middleware('auth');;


