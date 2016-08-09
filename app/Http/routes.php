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

Route::group(['namespace' => 'Front'], function () {
    Route::resource('/', 'HomeController', ['only' => ['index', 'store', 'show']]);

    Route::get('category/{category}/{type?}', ['uses' => 'BlogController@filterByCategory', 'as' => 'category.show']);
    Route::get('tag/{tag}/{type?}', ['uses' => 'BlogController@filterByTag', 'as' => 'tag.show']);

    Route::resource('blog', 'BlogController', ['only' => ['index', 'show']]);

    Route::post('shop/{shop}/cart', ['uses' => 'ShopController@addToCart', 'as' => 'shop.cart']);
    Route::post('shop/{shop}/review', ['uses' => 'ShopController@writeReview', 'as' => 'shop.review']);
    Route::resource('shop', 'ShopController', ['only' => ['index', 'show']]);
    Route::resource('cart', 'CartController', ['only' => ['index', 'update']]);

    Route::resource('contact', 'ContactController', ['only' => ['index', 'store']]);
});

Route::group(['prefix' => 'cms'], function () {
    Route::auth();

    Route::group(['namespace' => 'Cms', 'middleware' => 'auth:cms'], function () {
        Route::get('/', ['uses' => 'CmsController@gate', 'as' => 'cms.index']);
        Route::resource('dashboard', 'DashboardController', ['only' => ['index']]);
        Route::resource('posts', 'PostController', ['except' => ['show']]);
        Route::resource('tags', 'TagController', ['except' => ['show']]);
        Route::resource('categories', 'CategoryController', ['except' => ['show']]);
        Route::resource('products', 'ProductController', ['except' => ['show']]);
        Route::resource('users', 'UserController', ['except' => ['show']]);

        Route::resource('sliders', 'SliderController', ['except' => ['show'], 'parameters' => ['sliders' => 'settings']]);
//        Route::resource('menus', 'MenuController', ['except' => ['show'], 'parameters' => ['menus' => 'settings']]);
        Route::resource('reviews', 'ReviewController', ['except' => ['show'], 'parameters' => ['reviews' => 'comments']]);
        Route::resource('feedback', 'FeedbackController', ['except' => ['show'], 'parameters' => ['feedback' => 'comments']]);
    });
});

Route::get('home', 'HomeController@index');
