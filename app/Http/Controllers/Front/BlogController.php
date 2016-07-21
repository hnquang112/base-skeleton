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
        $posts = Post::with('tags', 'represent_image')->published()->orderByDesc('published_at')->paginate(5);

        return view('front.blog.index', compact('posts'));
    }

    public function show(Request $request, $post) {
        return view('front.blog.show', compact('post'));
    }

    public function filterByCategory($taxo) {
        $taxoType = 'cat';
        $posts = $taxo->getRelatedPosts();

        return view('front.blog.filter', compact('taxo', 'taxoType', 'posts'));
    }

    public function filterByTag($taxo) {
        $taxoType = 'tag';
        $posts = $taxo->getRelatedPosts();

        return view('front.blog.filter', compact('taxo', 'taxoType', 'posts'));
    }
}
