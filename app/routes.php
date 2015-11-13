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

Route::get('/', function()
{
	return View::make('admin.dashboard');
});

Route::get('login', function()
{
	return View::make('admin.layout.login');
});

Route::get('users', function()
{
	return View::make('admin.users.index');
});

Route::get('users/create', function()
{
	return View::make('admin.users.create');
});

Route::get('users/edit', function()
{
	return View::make('admin.users.edit');
});

Route::get('users/show', function()
{
	return View::make('admin.users.show');
});
