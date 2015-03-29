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

    Route::group(['prefix' => 'resources'], function() {
        Route::get('/', 'ResourceController@adminIndex');
        Route::get('create', 'ResourceController@adminCreate');
        Route::post('store', 'ResourceController@adminStore');
        Route::get('/{id}', 'ResourceController@adminEdit');
        Route::put('update/{id}', 'ResourceController@adminUpdate');
        Route::delete('destroy/{id}', 'ResourceController@adminDestroy');
    });

    Route::group(['prefix' => 'formats'], function() {
        Route::get('/', 'FormatController@adminIndex');
        Route::get('create', 'FormatController@adminCreate');
        Route::post('store', 'FormatController@adminStore');
        Route::get('/{id}', 'FormatController@adminEdit');
        Route::put('update/{id}', 'FormatController@adminUpdate');
        Route::delete('destroy/{id}', 'FormatController@adminDestroy');
    });

    Route::group(['prefix' => 'articles'], function() {
        Route::get('/', 'ArticleController@adminIndex');
        Route::get('create', 'ArticleController@adminCreate');
        Route::post('store', 'ArticleController@adminStore');
        Route::get('/{id}', 'ArticleController@adminEdit');
        Route::put('update/{id}', 'ArticleController@adminUpdate');
        Route::delete('destroy/{id}', 'ArticleController@adminDestroy');
    });

});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
