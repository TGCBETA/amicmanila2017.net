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

Route::get('/', 'PageController@loadHome');

ROute::get('/testmail', ['as' => 'testmail', 'uses' => 'PageController@testMail']);

Route::post('/send', 'EmailController@send');

Route::get('/sendermail', 'EmailController@sendermail');

Route::group(['prefix' => 'registration'], function(){
	Route::get('/', ['as' => 'get-registration', 'uses' => 'RegistrationController@getRegistration']);






	Route::get('/single', ['as' => 'get-single-registration', 'uses' => 'RegistrationController@getSingleRegistration']);
	Route::post('/', ['as' => 'save-registration', 'uses' => 'RegistrationController@saveRegistration']);

	Route::post('/save', ['as' => 'save', 'uses' => 'RegistrationController@save']);


	Route::get('/confirm-registration', ['as' => 'confirm-registration', 'uses' => 'RegistrationController@confirmRegistration']);

	Route::get('/paypal', ['as' => 'process-paypal', 'uses' => 'PaypalController@processPaypal']);
	Route::post('/paypal-postback', ['as' => 'paypal-postback', 'uses' => 'PaypalController@postback']);
	Route::get('/paypal/cancel', ['as' => 'cancel-process-paypal', 'uses' => 'PaypalController@cancel']);
	Route::get('/paypal/return', ['as' => 'return-process-paypal', 'uses' => 'PaypalController@paypalReturn']);
	Route::get('/bank', ['as' => 'process-bank', 'uses' => 'BankController@processBank']);
	Route::get('/bank/return', ['as' => 'return-process-bank', 'uses' => 'BankController@bankReturn']);

	/*
		Group Registration
	*/
	Route::get('/group', ['as' => 'get-group-registration', 'uses' => 'RegistrationController@getGroupRegistration']);
	Route::post('/group/no-of-registrants', ['as' => 'post-no-of-registrants', 'uses' => 'RegistrationController@postNoofRegistrants']);
	Route::get('/group/add-registrant/{idx}', ['as' => 'add-registrant', 'uses' => 'RegistrationController@getAddRegistrant']);
	Route::put('/group/add-registrant/{idx}', ['as' => 'post-add-registrant', 'uses' => 'RegistrationController@postAddRegistrant']);
	Route::get('/group/registration-category', ['as' => 'get-registration-category', 'uses' => 'RegistrationController@getRegistrationCategory']);
	Route::post('/group/registration-category', ['as' => 'post-registration-category', 'uses' => 'RegistrationController@postRegistrationCategory']);

	Route::get('/group/contact', ['as' => 'get-group-contact', 'uses' => 'RegistrationController@getGroupContact']);
	Route::post('/group/contact', ['as' => 'post-group-contact', 'uses' => 'RegistrationController@postGroupContact']);

	Route::get('/group/confirm-registration', ['as' => 'get-group-confirmation', 'uses' => 'RegistrationController@getGroupConfirmation']);

	Route::post('/group/save', ['as' => 'save-group', 'uses' => 'RegistrationController@saveGroup']);
	Route::get('/group/bank', ['as' => 'process-bank-group', 'uses' => 'BankController@processBankGroup']);


	Route::get('/group/paypal', ['as' => 'process-paypal-group', 'uses' => 'PaypalController@processPaypalGroup']);
	Route::post('/group/paypal-postback', ['as' => 'paypal-postback-group', 'uses' => 'PaypalController@postbackGroup']);

		
});

Route::get('/{page}', ['as' => 'get-page', 'uses' => 'PageController@getPage']);