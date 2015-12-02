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
Route::resource('/api/v1/activities', 'ActivityController');
Route::resource('/api/v1/auth', 'UserController');
Route::get('/api/v1/user/logout', 'UserController@logout');
Route::get('/api/v1/user/profile', 'UserController@profile');

Route::resource('/api/v1/dashboard/{date?}', 'DashboardController');
