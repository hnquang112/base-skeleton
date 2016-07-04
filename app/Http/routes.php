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

Route::group(['prefix' => 'cms', 'namespace' => 'Cms'], function () {
	Route::get('login', function () {
		return view('cms.login.index');
	});

	Route::get('dashboard', function () {
		return view('cms.dashboard.index');
	});

	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('posts', 'PostController');
	Route::resource('tags', 'TagController');
	Route::resource('categories', 'CategoryController');
	Route::resource('comments', 'CommentController');
	Route::resource('menus', 'MenuController');

});
