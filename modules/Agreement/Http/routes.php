<?php

Route::group(['prefix' => 'agreement', 'namespace' => 'Modules\Agreement\Http\Controllers'], function()
{
	Route::get('/', 'AgreementController@index');
});