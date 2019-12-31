<?php

Route::group(['middleware' => 'auth' ,'namespace' => 'Dashboard'], function () {

    /* -- Return Home Page -- */
    Route::get('/be-group-system', 'DashboardController@index');

    /* -- Return Projects Pages -- */
    Route::resource('/be-group-system/project', 'ProjectController');
    Route::get('/be-group-system/my-projects', 'ProjectController@myProjects');

    /* -- Return Member Pages -- */
    Route::resource('/be-group-system/project-timeline', 'ProjectTimeLineController');

    /* -- Return Member Pages -- */
    Route::resource('/be-group-system/member', 'MemberController');

    /* -- Return Team Pages -- */
    Route::resource('/be-group-system/team', 'TeamController');

    /* -- Return Branch Pages -- */
    Route::resource('/be-group-system/branch', 'BranchController');

    /* -- Return Client Pages -- */
    Route::resource('/be-group-system/client', 'ClientController');

});

Auth::routes();
