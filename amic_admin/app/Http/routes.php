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

Route::post('PaidUpdate', 'HomeController@update');

Route::post('AttendUpdate', 'HomeController@attendUpdate');

Route::get('dash', 'DashController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*Route::get('/payments/excel', 
[
  'as' => 'admin.invoices.excel',
  'uses' => 'PaymentsController@excel'
]);


Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister'); */
