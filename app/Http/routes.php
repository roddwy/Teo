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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

		Route::resource('users','UserController');
				Route::get('users/{id}/destroy',[
					'uses'	=>	'UserController@destroy',
					'as'	=>	'admin.users.destroy'
		]);
		Route::resource('phases','PhasesController');
				Route::get('phases/{id}/destroy',[
					'uses'	=>	'PhasesController@destroy',
					'as'	=>	'admin.phases.destroy'
		]);
		Route::resource('products','ProductsController');
				Route::get('products/{id}/destroy',[
					'uses'	=>	'ProductsController@destroy',
					'as'	=>	'admin.products.destroy'
		]);
});

Route::get('admin/auth/login', [
	'uses'	=>	'Auth\AuthController@getLogin',
	'as'	=>	'admin.auth.login'
]);
Route::post('admin/auth/login', [
	'uses'	=>	'Auth\AuthController@postLogin',
	'as'	=>	'admin.auth.login'

]);	
Route::get('admin/auth/logout', [
	'uses'	=>	'Auth\AuthController@getLogout',
	'as'	=>	'admin.auth.logout'
]);