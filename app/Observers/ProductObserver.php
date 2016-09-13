<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 12/09/2016
 * Time: 16:49
 */

namespace App\Observers;

use Cache;
use App\Product;

class ProductObserver {
    public function saved(Product $product) {
        Cache::forget('front.max_product_prices');
    }
}
