<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:52 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends FrontController
{
    // GET: /blog
    public function index(Request $request) {
        $articles = Article::with('tags', 'represent_image')->published()->orderByDesc('published_at')->paginate(5);

        return view('front.blog.index', compact('articles'));
    }

    // GET: /blog/lorem-ipsum
    public function show(Request $request, $article) {
        return view('front.blog.show', compact('article'));
    }

    // GET: /category/lorem-ipsum/{prod|post}
    public function filterByCategory($taxo, $postType = 'prod') {
        $taxoType = 'cat';

        if ($postType == 'post') {
            $articles = $taxo->getRelatedPosts();
        } else {
            $articles = $taxo->getRelatedProducts();
        }

        return view('front.blog.filter', compact('taxo', 'taxoType', 'postType', 'articles'));
    }

    // GET: /tag/lorem-ipsum/{prod|post}
    public function filterByTag($taxo, $postType = 'prod') {
        $taxoType = 'tag';

        if ($postType == 'post') {
            $articles = $taxo->getRelatedPosts();
        } else {
            $articles = $taxo->getRelatedProducts();
        }

        return view('front.blog.filter', compact('taxo', 'taxoType', 'postType', 'articles'));
    }
}
