<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:52 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends FrontController
{
    // GET: /
    public function index(Request $request) {
        return view('front.home.index');
    }

    // GET: /search?q=abc
    public function search(Request $request) {
        if (!empty($request->q)) {
//            return Post::articles()->published()->count();
            return $results = Post::search($request->q)->published()->get()->count();

            return view('front.home.search', compact('results'));
        }

        return back();
    }

}
