<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', 'TagController@adminIndex');
        Route::get('create', 'TagController@adminCreate');
        Route::post('store', 'TagController@adminStore');
        Route::get('/{id}', 'TagController@adminEdit');
        Route::put('update/{id}', 'TagController@adminUpdate');
        Route::delete('destroy/{id}', 'TagController@adminDestroy');
    });

});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
