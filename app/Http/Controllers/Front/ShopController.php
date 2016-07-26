<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-24
 * Time: 8:29 PM
 */

namespace App\Http\Controllers\Front;


class ShopController extends FrontController {
    public function index() {

    }

    public function show($product) {
        return view('front.shop.show', compact('product'));
    }
}