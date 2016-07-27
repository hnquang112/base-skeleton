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
use Cart;
use Illuminate\Http\Request;

class ShopController extends FrontController {
    public function index() {
        $products = Product::paginate(12);

        return view('front.shop.index', compact('products'));
    }

    public function show($product) {
        $similarProducts = $product->similar()->get();

        return view('front.shop.show', compact('product', 'similarProducts'));
    }

    public function addToCart(Request $request, $product) {
        Cart::add($product->id, $product->title, $request->quantity, $product->price);

        return back();
    }

    public function writeReview() {

    }
}
