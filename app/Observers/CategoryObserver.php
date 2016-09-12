<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 12/09/2016
 * Time: 16:49
 */

namespace App\Observers;

use Cache;
use App\Category;

class CategoryObserver {
    public function saved(Category $category) {
        Cache::forget('front.all_categories');
    }
}
