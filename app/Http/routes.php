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

// Front-end routes
Route::get('/', 'PageController@homepage');
Route::get('/about', 'PageController@about');
Route::get('/submit', 'PageController@submit');
Route::post('/submit/resource', 'FeedbackController@submitResource');
Route::get('/t/{tagSlug}', 'PageController@tag');
Route::get('/sitemap.xml', 'PageController@sitemap');

// Admin routes
Route::get('/admin/login', 'AdminController@showLogin');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');

// Admin routes that require authentications
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    // Admin pages
    Route::get('/', 'AdminController@index');

    // Admin Tag routes
    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', 'TagController@adminIndex');
        Route::get('create', 'TagController@adminCreate');
        Route::post('store', 'TagController@adminStore');
        Route::get('/{id}', 'TagController@adminEdit');
        Route::put('update/{id}', 'TagController@adminUpdate');
        Route::delete('destroy/{id}', 'TagController@adminDestroy');
    });

    // Admin Resources routes
    Route::group(['prefix' => 'resources'], function() {
        Route::get('/', 'ResourceController@adminIndex');
        Route::get('create', 'ResourceController@adminCreate');
        Route::post('store', 'ResourceController@adminStore');
        Route::get('/{id}', 'ResourceController@adminEdit');
        Route::put('update/{id}', 'ResourceController@adminUpdate');
        Route::delete('destroy/{id}', 'ResourceController@adminDestroy');
    });

    // Admin Formats routes
    Route::group(['prefix' => 'formats'], function() {
        Route::get('/', 'FormatController@adminIndex');
        Route::get('create', 'FormatController@adminCreate');
        Route::post('store', 'FormatController@adminStore');
        Route::get('/{id}', 'FormatController@adminEdit');
        Route::put('update/{id}', 'FormatController@adminUpdate');
        Route::delete('destroy/{id}', 'FormatController@adminDestroy');
    });

    // Admin Article routes
    Route::group(['prefix' => 'articles'], function() {
        Route::get('/', 'ArticleController@adminIndex');
        Route::get('create', 'ArticleController@adminCreate');
        Route::post('store', 'ArticleController@adminStore');
        Route::get('/{id}', 'ArticleController@adminEdit');
        Route::put('update/{id}', 'ArticleController@adminUpdate');
        Route::delete('destroy/{id}', 'ArticleController@adminDestroy');
    });

    // Admin User routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UserController@adminIndex');
        Route::get('create', 'UserController@adminCreate');
        Route::post('store', 'UserController@adminStore');
        Route::get('/{id}', 'UserController@adminEdit');
        Route::put('update/{id}', 'UserController@adminUpdate');
        Route::delete('destroy/{id}', 'UserController@adminDestroy');
    });

    // Admin feedback routes
    Route::group(['prefix' => 'feedback'], function() {
        Route::get('/', 'FeedbackController@adminIndex');
        Route::get('/{id}', 'FeedbackController@adminShow');
        Route::delete('destroy/{id}', 'FeedbackController@adminDestroy');
    });

});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
