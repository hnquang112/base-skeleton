<?php

namespace App\Providers;

use App\Article;
use App\Order;
use App\Category;
use App\Product;
use App\Setting;
use App\Tag;
use App\Observers\ArticleObserver;
use App\Observers\ProductObserver;
use App\Observers\SettingObserver;
use App\Observers\TagObserver;
use App\Observers\OrderObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        Category::observe(CategoryObserver::class);
        Article::observe(ArticleObserver::class);
        Product::observe(ProductObserver::class);
        Setting::observe(SettingObserver::class);
        Tag::observe(TagObserver::class);
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
