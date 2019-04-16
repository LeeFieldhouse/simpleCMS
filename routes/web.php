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

Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'pageController@home')->name('home');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');



Route::resource('companies', 'CompanyController');
