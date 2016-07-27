<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-24
 * Time: 8:29 PM
 */

namespace App\Http\Controllers\Front;

use App\Product;
use DB;

class ShopController extends FrontController {
    public function index() {

    }

    public function show($product) {
        $similarProducts = $product->similar()->get();

        return view('front.shop.show', compact('product', 'similarProducts'));
    }

    public function addToCart() {

    }
}
