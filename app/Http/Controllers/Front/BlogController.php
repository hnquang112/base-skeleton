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

class BlogController extends FrontController
{
    public function index(Request $request) {
        $posts = Post::published()->orderByDesc('published_at')->paginate(5);

        return view('front.blog.index', compact('posts'));
    }

    public function show(Request $request, $post) {
        return view('front.blog.show', compact('post'));
    }
}