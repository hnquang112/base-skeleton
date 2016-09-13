<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 12/09/2016
 * Time: 16:49
 */

namespace App\Observers;

use Cache;
use App\Article;

class ArticleObserver {
    public function saved(Article $article) {
        Cache::forget('front.recent_articles');
    }
}
