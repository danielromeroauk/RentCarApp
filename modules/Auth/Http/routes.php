<?php

Route::group(['prefix' => '/', 'namespace' => 'Modules\Auth\Http\Controllers'], function()
{
	Route::get('/', 'AuthController@index');
	Route::get('/auth/login', 'AuthController@index');
    Route::get('/auth/test', function()
    {
        return 'Hello World';
    });
});