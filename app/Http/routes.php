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

Route::get('/', function () { return view('index'); });
Route::get('/docs', function() { return view('docs.api.v1.index'); });

Route::group(['prefix' => 'api/v1'], function() {
    Route::get('activities', 'ActivityController@index');
    Route::post('activities', 'ActivityController@store');
    Route::delete('activities/{id}', 'ActivityController@destroy');

    Route::get('auth', 'UserController@index');
    Route::post('auth', 'UserController@store');
    Route::get('user/logout', 'UserController@logout');
    Route::get('user/profile', 'UserController@profile');

    Route::get('tags', 'TagController@index');
    Route::post('tags', 'TagController@store');

    Route::get('categories', 'CategoryController@index');

    Route::get('dashboard/{date?}', 'DashboardController@index');
});
