<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:52 PM
 */

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends FrontController
{
    // GET: /
    public function index(Request $request) {
        return view('front.home.index');
    }

    // GET: /search?q=lorem-ipsum
    public function search(Request $request) {
        if (!empty($request->q)) {
            $keyword = $request->q;

            $articles = Article::search($keyword)->published()->get();
            $products = Product::search($keyword)->get();

            return view('front.home.search', compact('keyword', 'articles', 'products'));
        }

        return back();
    }

}
