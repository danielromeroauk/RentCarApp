<?php

Route::group(['prefix' => '/', 'namespace' => 'Modules\Auth\Http\Controllers'], function()
{
	Route::get('/', 'AuthController@index');
	Route::get('/auth/login', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
    Route::post('/auth/test', ['as' => 'auth.test', 'uses' => 'AuthController@login']);

    Route::resource('auth/permission', 'PermissionController');
    Route::resource('auth/role', 'RoleController');
});