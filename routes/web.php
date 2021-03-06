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




Route::get('current-projects', 'WebsitePagesController@currentProjects');
Route::get('/', 'WebsitePagesController@lastAddedProjects');
Route::get('add-new-project', 'WebsitePagesController@addNewProject');
Route::get('show-project/{id}', 'WebsitePagesController@showProject');
Route::post('store-project', 'WebsitePagesController@storeProject');
Route::get('current-updates', 'WebsitePagesController@currentUpdates');
Route::get('add-new-update', 'WebsitePagesController@addNewUpdate');
Route::post('store-update', 'WebsitePagesController@storeUpdate');






