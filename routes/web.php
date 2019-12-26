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

Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth'], function () {

    /* -- Return Statistics Page -- */
    Route::get('/', 'DashboardController@index');

});

Auth::routes();
