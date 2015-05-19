<?php

// app/routes.php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Bind route parameters.
Route::model('reg', 'Registration');

// Show pages.
Route::get('/', 'RegistrationController@index');
Route::get('/register', 'RegistrationController@register');
Route::get('/edit/{reg}', 'RegistrationController@edit');
Route::get('/delete/{reg}', 'RegistrationController@delete');

// Handle form submissions.
Route::post('/register', 'RegistrationController@handleRegister');
Route::post('/edit', 'RegistrationController@handleEdit');
Route::post('/delete', 'RegistrationController@handleDelete');
