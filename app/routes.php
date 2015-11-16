<?php

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
// dd(123);
Route::group(['prefix' => 'admin'], function () {

	Route::get('/login', array('uses' => 'AdminController@getLogin', 'as' => 'admin.get.login'));
	Route::post('/login', array('uses' => 'AdminController@postLogin', 'as' => 'admin.post.login'));
	Route::resource('/', 'AdminController');

	Route::get('/category_parent/create', array('uses' => 'CategoryParentController@create', 'as' => 'create'));
	Route::post('/category_parent/create', array('uses' => 'CategoryParentController@postcreate', 'as' => 'postcreate'));
	Route::resource('/category_parent', 'CategoryParentController');

	Route::resource('/games', 'GameController');

});


