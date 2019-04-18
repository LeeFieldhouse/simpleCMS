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


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/test', 'pageController@home')->name('test');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeeController');
});

