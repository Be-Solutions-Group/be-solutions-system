<?php

Route::group(['middleware' => 'auth' ,'namespace' => 'Dashboard'], function () {

    /* -- Return Home Page -- */
    Route::get('/be-group-system', 'DashboardController@index');

    /* -- Return Projects Pages -- */
    Route::resource('/be-group-system/project', 'ProjectController');
    Route::get('/be-group-system/my-projects', 'ProjectController@myProjects');

    /* -- Return Project Timeline Pages -- */
    Route::resource('/be-group-system/project-timeline', 'ProjectTimeLineController');
    Route::get('/be-group-system/developer-edit/{id}', 'ProjectTimeLineController@developerEdit');
    Route::get('/be-group-system/designer-edit/{id}', 'ProjectTimeLineController@designerEdit');

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
