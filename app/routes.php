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

	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout', 'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');

	Route::get('/manager/search', array('uses' => 'ManagerController@search', 'as' => 'admin.manager.search'));
	Route::resource('/manager', 'ManagerController');

	// Route::post('/category_parent/create', array('uses' => 'CategoryParentController@postcreate', 'as' => 'postcreate'));
	Route::get('/category_parent/content/create', array('uses' => 'CategoryParentController@contentCreate', 'as' => 'content.create'));
	Route::get('/category_parent/content', array('uses' => 'CategoryParentController@contentIndex', 'as' => 'content.index'));
	Route::resource('/category_parent', 'CategoryParentController');

	Route::resource('/category', 'CategoryController');

	Route::get('/games/search', array('uses' => 'AdminGameController@search', 'as' => 'admin.games.search'));
	Route::resource('/games', 'AdminGameController');

	Route::resource('/gametype', 'GameTypeController');

	Route::resource('/newstype', 'NewsTypeController');

	Route::get('/news/search', array('uses' => 'NewsController@search', 'as' => 'admin.news.search'));
	Route::resource('/news', 'NewsController');
	
	Route::resource('/relation', 'RelationController');

});

Route::resource('/', 'SiteController');