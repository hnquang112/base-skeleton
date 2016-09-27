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

        return $this->theme->scope('blog.index', compact('articles'))->render();
    }

    // GET: /blog/lorem-ipsum
    public function show(Request $request, $article) {
        return $this->theme->scope('blog.show', compact('article'))->render();
    }

    // GET: /category/lorem-ipsum/{prod|post}
    public function filterByCategory($taxo, $articleType = 'prod') {
        $taxoType = 'cat';

        if ($articleType == 'post') {
            $articles = $taxo->getRelatedArticles();
        } else {
            $articles = $taxo->getRelatedProducts();
        }

        return $this->theme->scope('blog.filter', compact('taxo', 'taxoType', 'articleType', 'articles'))->render();
    }

    // GET: /tag/lorem-ipsum/{prod|post}
    public function filterByTag($taxo, $articleType = 'prod') {
        $taxoType = 'tag';

        if ($articleType == 'post') {
            $articles = $taxo->getRelatedArticles();
        } else {
            $articles = $taxo->getRelatedProducts();
        }

        return $this->theme->scope('blog.filter', compact('taxo', 'taxoType', 'articleType', 'articles'))->render();
    }
}
