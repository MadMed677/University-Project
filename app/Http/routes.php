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

Route::get('/api/v1/activities', 'ActivityController@index');
Route::post('/api/v1/activities', 'ActivityController@store');
Route::delete('/api/v1/activities/{id}', 'ActivityController@destroy');

Route::get('/api/v1/auth', 'UserController@index');
Route::post('/api/v1/auth', 'UserController@store');
Route::get('/api/v1/user/logout', 'UserController@logout');
Route::get('/api/v1/user/profile', 'UserController@profile');

Route::get('/api/v1/tags', 'TagController@index');
Route::post('/api/v1/tags', 'TagController@store');

Route::get('/api/v1/categories', 'CategoryController@index');

Route::get('/api/v1/dashboard/{date?}', 'DashboardController@index');
