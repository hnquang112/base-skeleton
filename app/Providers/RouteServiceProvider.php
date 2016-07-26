<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Post;
use App\Tag;
use App\Category;
use App\Product;

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
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('posts', 'App\Post');
        $router->model('categories', 'App\Category');
        $router->model('tags', 'App\Tag');
        $router->model('settings', 'App\Setting');
        $router->model('products', 'App\Post');
        
        $router->bind('blog', function ($slug) {
            return Post::findBySlugOrFail($slug);
        });
        $router->bind('tag', function ($slug) {
            return Tag::findBySlugOrFail($slug);
        });
        $router->bind('category', function ($slug) {
            return Category::findBySlugOrFail($slug);
        });
        $router->bind('shop', function ($slug) {
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
