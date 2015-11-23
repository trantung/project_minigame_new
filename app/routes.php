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
	Route::get('/category_parent/content/edit/{id}', array('uses' => 'CategoryParentController@contentedit', 'as' => 'content.edit'));
	Route::get('/category_parent/content', array('uses' => 'CategoryParentController@contentIndex', 'as' => 'content.index'));
	Route::resource('/category_parent', 'CategoryParentController');

	Route::resource('/category', 'CategoryController');

	Route::post('/games/deleteSelected', 'AdminGameController@deleteSelected');
	Route::post('/games/updateIndexData', 'AdminGameController@updateIndexData');
	Route::get('/games/search', array('uses' => 'AdminGameController@search', 'as' => 'admin.games.search'));
	Route::get('/games/history/{id}', array('uses' => 'AdminGameController@history', 'as' => 'admin.games.history'));
	Route::post('/games/history/{id}', array('uses' => 'AdminGameController@deleteHistory', 'as' => 'admin.games.history.delete'));
	Route::resource('/games', 'AdminGameController');

	Route::resource('/gametype', 'GameTypeController');

	Route::resource('/newstype', 'NewsTypeController');

	Route::post('/news/history/{id}', array('uses' => 'NewsController@deleteHistory', 'as' => 'admin.news.history.delete'));
	Route::get('/news/history/{id}', array('uses' => 'NewsController@history', 'as' => 'admin.news.history'));
	Route::get('/news/search', array('uses' => 'NewsController@search', 'as' => 'admin.news.search'));
	Route::resource('/news', 'NewsController');

	Route::post('/relation/ajax', 'RelationController@ajax');
	Route::post('/relation/ajaxedit/{id}', array('uses' => 'RelationController@ajaxedit', 'as' => 'ajax.edit'));
	Route::resource('/relation', 'RelationController');

	Route::resource('/comment', 'CommentController');

	Route::resource('/score', 'ScoreManagerController');	

});

Route::resource('/', 'SiteController');






