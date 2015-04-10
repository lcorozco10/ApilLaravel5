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

Route::controllers([
    'users' => 'UserController',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['prefix'=>'admin',/*'middleware'=>['auth','is_admin'],*/'namespace'=>'\Admin'],function(){

    #Resource User Admin
	Route::resource('user','UserController');

    #Resource Seller Controller Routes
    Route::resource('users','UsersController');

});