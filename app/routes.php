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

Route::group(['prefix' => 'admin'], function () {

	Route::get('/changepassword', array('uses' => 'PasswordController@changePass', 'as' => 'password.changepass'));
	Route::resource('/resetpassword', 'PasswordController', array('only'=>array('store', 'index')));
	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout', 'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');

	Route::get('/manager/search', array('uses' => 'ManagerController@search', 'as' => 'admin.manager.search'));
	Route::resource('/manager', 'ManagerController');

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

	Route::get('/comment/search', array('uses' =>  'CommentController@search', 'as' => 'admin.comment.search'));
	Route::post('/comment/deleteSelected', 'CommentController@deleteSelected');
	Route::post('/comment/updateIndexData', 'CommentController@updateIndexData');
	Route::resource('/comment', 'CommentController');

	Route::get('/score/search', array('uses' =>  'ScoreManagerController@search', 'as' => 'admin.score.search'));
	Route::resource('/score', 'ScoreManagerController');


	Route::get('/advertise_child', 'AdvertiseController@indexChild');
	Route::get('/create/advertise_child', 'AdvertiseController@createChild');
	Route::post('/create/advertise_child', 'AdvertiseController@storeChild');
	Route::get('/edit/advertise_child/{id}/{model_id}', 'AdvertiseController@editChild');
	Route::put('/edit/advertise_child/{id}/{model_id}', 'AdvertiseController@updateChild');
	Route::delete('/delete/advertise_child/{id}', 'AdvertiseController@destroyChild');
	Route::resource('/advertise', 'AdvertiseController');

	Route::get('/feedback/search', array('uses' =>  'FeedbackController@search', 'as' => 'admin.feedback.search'));
	Route::resource('/feedback', 'FeedbackController');

	Route::get('/feedback_game/search', array('uses' =>  'FeedbackGameController@search', 'as' => 'admin.feedback_game.search'));
	Route::resource('/feedback_game', 'FeedbackGameController');

	Route::resource('/seo', 'SeoController');

	Route::resource('/policy', 'PolicyController');

	Route::resource('/slider', 'AdminSlideController');

});

// FRONTEND
Route::get('/dang-nhap', array('uses' => 'SiteController@login', 'as' => 'login'));
Route::post('/dang-nhap', array('uses' => 'SiteController@doLogin'));
Route::get('/dang-xuat', array('uses' => 'SiteController@logout', 'as' => 'logout'));

Route::get('/dang-ky', array('uses' => 'AccountController@create', 'as' => 'register'));
Route::post('/dang-ky', array('uses' => 'AccountController@store'));
Route::get('/thong-tin-tai-khoan', array('uses' => 'AccountController@account', 'as' => 'account'));
Route::put('/thong-tin-tai-khoan', array('uses' => 'AccountController@doAccount'));

Route::resource('/', 'SiteIndexController');

Route::get('/{slug}', 'GameController@listgame');

Route::get('/{type}/{slug}.html', 'GameController@detailGame');
