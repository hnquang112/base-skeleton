<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        Route::model('articles', 'App\Article');
        Route::model('categories', 'App\Category');
        Route::model('tags', 'App\Tag');
        Route::model('settings', 'App\Setting');
        Route::model('products', 'App\Product');
        Route::model('users', 'App\User');
        Route::model('comments', 'App\Comment');

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
