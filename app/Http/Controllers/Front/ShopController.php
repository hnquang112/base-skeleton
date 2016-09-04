<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-24
 * Time: 8:29 PM
 */

namespace App\Http\Controllers\Front;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShopController extends FrontController {

    // GET: /shop
    public function index(Request $request) {
        $products = Product::with('represent_image');

        switch ($request->sort) {
            case 'alphabet':
                $products = Product::sortByAlphabet();
                break;
            case 'recent':
                $products = Product::sortByTime();
                break;
            case 'price':
                $products = Product::sortByPrice();
                break;
            default:
                break;
        }

        $products->filterPrice($request->min_price, $request->max_price)->sortByPrice();

        $products = $products->paginate(12);
        $products->appends($request->all());

        return view('front.shop.index', compact('products'));
    }

    // GET: /shop/lorem-ipsum
    public function show($product) {
        $similarProducts = $product->similar()->get();

        return view('front.shop.show', compact('product', 'similarProducts'));
    }

    // POST: /shop/lorem-ipsum/review
    public function writeReview() {

    }
}
