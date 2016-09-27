<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-24
 * Time: 8:29 PM
 */

namespace App\Http\Controllers\Front;

use App\Comment;
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

        return $this->theme->scope('shop.index', compact('products'))->render();
    }

    // GET: /shop/lorem-ipsum
    public function show($product) {
        $similarProducts = $product->similar()->get();
        $reviews = $product->reviews;

        return $this->theme->scope('shop.show', compact('product', 'similarProducts', 'reviews'))->render();
    }

    // POST: /shop/lorem-ipsum/review
    public function writeReview(Request $request, $product) {
        $review = new Comment;
        $review->type = Comment::TYP_REVIEW;
        $review->post_id = $product->id;
        $review->fill($request->all());

        if ($review->save()) {
            return redirect($product->front_url . '#reviews');
        }

        return back();
    }
}
