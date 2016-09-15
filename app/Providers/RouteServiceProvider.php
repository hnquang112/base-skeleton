<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Article;
use App\Tag;
use App\Category;
use App\Product;
use App\Order;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('article', 'App\Article');
        Route::model('category', 'App\Category');
        Route::model('tag', 'App\Tag');
        Route::model('setting', 'App\Setting');
        Route::model('product', 'App\Product');
        Route::model('user', 'App\User');
        Route::model('comment', 'App\Comment');
        Route::model('order', 'App\Order');

        Route::bind('blog', function ($slug) {
            return Article::findBySlugOrFail($slug);
        });
        Route::bind('tag_slug', function ($slug) {
            return Tag::findBySlugOrFail($slug);
        });
        Route::bind('category_slug', function ($slug) {
            return Category::findBySlugOrFail($slug);
        });
        Route::bind('shop', function ($slug) {
            return Product::findBySlugOrFail($slug);
        });
        Route::bind('checkout', function ($code) {
            // sort by created time, in case code is duplicated
            return Order::whereCode($code)->orderByDesc('created_at')->first();
        });
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
