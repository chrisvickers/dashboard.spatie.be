<?php

Route::group(['middleware' => ['auth.basic','employees']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/support','DashboardController@support');

    Route::get('/users/{id}/status','UsersController@status');
});
