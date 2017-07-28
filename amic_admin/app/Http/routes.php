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
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('destroy/{id}','HomeController@destroy');

Route::post('PaidUpdate', 'HomeController@update');

Route::post('AttendUpdate', 'HomeController@attendUpdate');

Route::post('CheckInfo', 'HomeController@CheckInfo');

Route::get('downloadExcel', 'ExportController@downloadExcel');

Route::get('dash', 'DashController@index');

Route::get('user', 'UserController@index');

Route::get('add_user', 'UserController@add_user');

Route::post('TypeUserUpdate', 'UserController@TypeUserUpdate');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

