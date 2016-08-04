<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\Category;
use App\Tag;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->share('_allCategories', Category::all());
       view()->share('_allTags', Tag::all());
       view()->share('_allSliders', Setting::with('image')->sliders()->get());
       view()->share('_recentPosts', Post::with('author')->published()->orderByDesc('published_at')->take(3));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
