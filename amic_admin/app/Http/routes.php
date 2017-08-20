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

Route::get('home', 'HomeController@chart');

Route::get('AddFdata', 'HomeController@AddFdata');

Route::get('destroy/{id}','HomeController@destroy');

Route::post('PaidUpdate', 'HomeController@update');

Route::post('AttendUpdate', 'HomeController@attendUpdate');

Route::post('CheckInfo', 'HomeController@CheckInfo');

Route::get('refreshDB', 'HomeController@RefreshDB');

Route::get('downloadExcel', 'ExportController@downloadExcel');

Route::get('downloadExcel1', 'ExportController@downloadExcel1');

//Foreign Excel Export
Route::get('f_excelAmic', 'ExportController@f_excelAmic');
Route::get('f_excelNonAmic', 'ExportController@f_excelNonAmic');
Route::get('f_excelStudent', 'ExportController@f_excelStudent');

//Local Excel Export
Route::get('l_excelAmic', 'ExportController@l_excelAmic');
Route::get('l_excelNonAmic', 'ExportController@l_excelNonAmic');
Route::get('l_excelGrad', 'ExportController@l_excelGrad');
Route::get('l_excelGrad_nom', 'ExportController@l_excelGrad_nom');
Route::get('l_excelUnder', 'ExportController@l_excelUnder');
Route::get('l_excelUnder_nom', 'ExportController@l_excelUnder_nom');


Route::get('dash', 'DashController@index');

Route::get('user', 'UserController@index');

Route::get('add_user', 'UserController@add_user');

Route::post('TypeUserUpdate', 'UserController@TypeUserUpdate');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

