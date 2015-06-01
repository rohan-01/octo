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

Route::get('/', array('as' => "main", 'uses' => "RegistrationController@index"));
Route::get('/home', array('as' => "home", 'uses' => "RegistrationController@home"));
Route::get('/login', array('as' => "login", 'uses' => "RegistrationController@login"));
Route::get('/logout', array('as' => "logout", 'uses' => "RegistrationController@handleLogout"));
Route::get('/dashboard', array('as' => "dashboard", 'uses' => "RegistrationController@dashboard"));
Route::get('/edit/{reg}', array('as' => "edit{reg}", 'uses' => "RegistrationController@edit"));
Route::get('/delete/{reg}', array('as' => "delete", 'uses' => "RegistrationController@delete"));
Route::get('/change-password', array('as' => "change-password", 'uses' => "RegistrationController@password"));
//Route::get('/paging', array('as' => "paging", 'uses' => "RegistrationController@paging"));

// Handle form submissions.

Route::post('/', array('as' => "handleRegister", 'uses' => "RegistrationController@handleRegister"));
Route::post('/login', array('as' => "handleLogin", 'uses' => "RegistrationController@handleLogin"));
Route::post('/edit', array('as' => "handleEdit", 'uses' => "RegistrationController@handleEdit"));
Route::post('/delete', array('as' => "handleDelete", 'uses' => "RegistrationController@handleDelete"));
Route::post('/password', array('as' => "handlePassword", 'uses' => "RegistrationController@handlePassword"));
