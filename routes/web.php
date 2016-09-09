<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Front'], function () {
    Route::resource('/', 'HomeController', ['only' => ['index']]);
    Route::get('search', ['uses' => 'HomeController@search', 'as' => 'index.search']);

    Route::get('category/{category}/{type?}', ['uses' => 'BlogController@filterByCategory', 'as' => 'category.show']);
    Route::get('tag/{tag}/{type?}', ['uses' => 'BlogController@filterByTag', 'as' => 'tag.show']);

    Route::resource('blog', 'BlogController', ['only' => ['index', 'show']]);
    Route::resource('contact', 'ContactController', ['only' => ['index', 'store']]);

    Route::post('shop/{products}/review', ['uses' => 'ShopController@writeReview', 'as' => 'shop.review']);
    Route::resource('shop', 'ShopController', ['only' => ['index', 'show']]);

    Route::post('shop/{products}/cart', ['uses' => 'CartController@store', 'as' => 'cart.store']);
    Route::resource('cart', 'CartController', ['only' => ['index', 'update', 'destroy']]);

    Route::get('account/facebook', ['uses' => 'AccountController@redirectToProvider', 'as' => 'auth.redirect']);
    Route::get('account/facebook/callback', ['uses' => 'AccountController@handleProviderCallback', 'as' => 'auth.callback']);
    Route::get('account/logout', ['uses' => 'AccountController@logout', 'as' => 'auth.logout']);
    Route::resource('account', 'AccountController', ['only' => 'index']);

    Route::resource('checkout', 'PurchaseController', ['only' => ['index', 'store', 'show']]);
});

Auth::routes();

Route::group(['namespace' => 'Cms', 'middleware' => 'auth:cms', 'prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('/', ['uses' => 'CmsController@gate', 'as' => 'index']);
    Route::get('/{lang}', ['as' => 'language', 'uses' => 'CmsController@changeLanguage'])
        ->where(['lang' => '(vi|en)']);

    Route::resource('dashboard', 'DashboardController', ['only' => ['index']]);
    Route::resource('articles', 'ArticleController', ['except' => ['show']]);
    Route::resource('tags', 'TagController', ['except' => ['show']]);
    Route::resource('categories', 'CategoryController', ['except' => ['show']]);
    Route::resource('products', 'ProductController', ['except' => ['show']]);
    Route::resource('users', 'UserController', ['except' => ['show']]);

    Route::resource('settings', 'SettingController', ['only' => ['index', 'store']]);
    Route::resource('sliders', 'SliderController', ['except' => ['show'], 'parameters' => ['sliders' => 'settings']]);
//        Route::resource('menus', 'MenuController', ['except' => ['show'], 'parameters' => ['menus' => 'settings']]);
    Route::resource('reviews', 'ReviewController', ['except' => ['show'], 'parameters' => ['reviews' => 'comments']]);
    Route::resource('feedback', 'FeedbackController', ['except' => ['show'], 'parameters' => ['feedback' => 'comments']]);
    Route::resource('media', 'MediaController', ['only' => 'index']);
});
