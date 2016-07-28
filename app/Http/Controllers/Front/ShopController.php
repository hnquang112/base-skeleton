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

    public function show($product) {
        $similarProducts = $product->similar()->get();

        return view('front.shop.show', compact('product', 'similarProducts'));
    }

    public function addToCart(Request $request, $product) {
        Cart::add($product->id, $product->title, $request->quantity, $product->price);

        return redirect()->route('cart.index');
    }

    public function writeReview() {

    }
}
