<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cache;
use App\Setting;
use App\Category;
use App\Tag;
use App\Article;
use Carbon\Carbon;
use App;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // put common view data to cache
        $expiresIn7days = Carbon::now()->adddays(7);

        if (!Cache::has('front.all_categories')) {
            Cache::put('front.all_categories', Category::all(), $expiresIn7days);
        }

        if (!Cache::has('front.all_tags')) {
            Cache::put('front.all_tags', Tag::all(), $expiresIn7days);
        }

        if (!Cache::has('front.all_sliders')) {
            Cache::put('front.all_sliders', Setting::with('image')->sliders()->get(), $expiresIn7days);
        }

        if (!Cache::has('front.recent_posts')) {
            Cache::put('front.recent_posts', Article::with('author')->published()->orderByDesc('published_at')->paginate(3),
                $expiresIn7days);
        }

        view()->share('_allCategories', Cache::get('front.all_categories'));
        view()->share('_allTags', Cache::get('front.all_tags'));
        view()->share('_allSliders', Cache::get('front.all_sliders'));
        view()->share('_recentArticles', Cache::get('front.recent_posts'));

        // set language
        if (!Cache::has('front.language')) {
            Cache::put('front.language', Setting::getSiteConfigValue('front_page_language'), $expiresIn7days);
        }

        if (!App::isLocale(Cache::get('front.language'))) {
            App::setLocale(Cache::get('front.language'));
        }
    }

}
