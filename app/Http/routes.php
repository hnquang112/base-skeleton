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
    return view('front.home.index');
});

Route::group(['prefix' => 'cms'], function () {
	Route::auth();

	Route::group(['namespace' => 'Cms', 'middleware' => 'auth:cms'], function () {
		Route::get('/', function () {
			if (auth()->check()) return redirect()->route('cms.dashboard.index');

			return redirect('/cms/login');
		});
		
		Route::resource('dashboard', 'DashboardController');

		Route::delete('posts', [
			'uses' => 'PostController@destroy',
			'as' => 'cms.posts.destroy'
		]);
		Route::resource('posts', 'PostController', ['except' => ['show', 'destroy']]);

		Route::resource('tags', 'TagController');
		Route::resource('categories', 'CategoryController');
		// Route::resource('users', 'UserController');
		// Route::resource('roles', 'RoleController');
		
		
		// Route::resource('comments', 'CommentController');
		// Route::resource('menus', 'MenuController');
	});
});

Route::get('/home', 'HomeController@index');
