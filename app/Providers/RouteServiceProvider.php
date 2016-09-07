<?php

namespace App\Providers;

use Illuminate\Routing\Router;
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
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::model('articles', 'App\Article');
        Route::model('categories', 'App\Category');
        Route::model('tags', 'App\Tag');
        Route::model('settings', 'App\Setting');
        Route::model('products', 'App\Product');
        Route::model('users', 'App\User');
        Route::model('comments', 'App\Comment');
        Route::model('orders', 'App\Order');
        
        Route::bind('blog', function ($slug) {
            return Article::findBySlugOrFail($slug);
        });
        Route::bind('tag', function ($slug) {
            return Tag::findBySlugOrFail($slug);
        });
        Route::bind('category', function ($slug) {
            return Category::findBySlugOrFail($slug);
        });
        Route::bind('shop', function ($slug) {
            return Product::findBySlugOrFail($slug);
        });
        Route::bind('checkout', function ($code) {
            // sort by created time, in case code is duplicated
            return Order::whereCode($code)->orderBy('created_at', 'desc')->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
