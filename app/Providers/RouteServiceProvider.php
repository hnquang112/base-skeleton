<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Post;
use App\Tag;
use App\Category;
use App\Product;
use Route;

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

        Route::model('posts', 'App\Post');
        Route::model('categories', 'App\Category');
        Route::model('tags', 'App\Tag');
        Route::model('settings', 'App\Setting');
        Route::model('products', 'App\Post');
        Route::model('users', 'App\User');
        Route::model('comments', 'App\Comment');
        
        Route::bind('blog', function ($slug) {
            return Post::findBySlugOrFail($slug);
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
