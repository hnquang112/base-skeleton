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

    public function filterByCategory($taxo, $postType = 'prod') {
        $taxoType = 'cat';

        if ($postType == 'post') {
            $posts = $taxo->getRelatedPosts();
        } else {
            $posts = $taxo->getRelatedProducts();
        }

        return view('front.blog.filter', compact('taxo', 'taxoType', 'postType', 'posts'));
    }

    public function filterByTag($taxo, $postType = 'prod') {
        $taxoType = 'tag';

        if ($postType == 'post') {
            $posts = $taxo->getRelatedPosts();
        } else {
            $posts = $taxo->getRelatedProducts();
        }

        return view('front.blog.filter', compact('taxo', 'taxoType', 'posts'));
    }
}
