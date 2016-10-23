<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:52 PM
 */

namespace App\Http\Controllers\Front;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends FrontController
{
    // GET: /
    public function index(Request $request) {
        $featuredProducts = Product::featured()->get();
        $testimonials = Comment::with('product')->testimonials()->get();

        return $this->theme->scope('home.index', compact('featuredProducts', 'testimonials'))->render();
    }

    // GET: /search?q=lorem-ipsum
    public function search(Request $request) {
        if (!empty($request->q)) {
            $keyword = $request->q;

            $articles = Article::search($keyword)->published()->get();
            $products = Product::search($keyword)->get();

            return $this->theme->scope('home.search', compact('keyword', 'articles', 'products'))->render();
        }

        return back();
    }

}
