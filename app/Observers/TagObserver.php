<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 12/09/2016
 * Time: 16:49
 */

namespace App\Observers;

use Cache;
use App\Tag;

class TagObserver {
    public function saved(Tag $tag) {
        Cache::forget('front.all_tags');
    }
}
