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
        $this->seo()->setTitle('Home');

        $featuredProducts = Product::featured()->get();
        $testimonials = Comment::with('product')->testimonials()->get();

        return view('front.home.index', compact('featuredProducts', 'testimonials'));
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

    //GET: /sitemap
    public function sitemap() {
        // create new sitemap object
        $sitemap = app()->make("sitemap");

        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached()) {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(route('index'), Carbon::today()->toW3cString(), '1.0', 'daily');
            $sitemap->add(route('contact.index'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

//            // add item with translations (url, date, priority, freq, images, title, translations)
//            $translations = [
//                ['language' => 'fr', 'url' => url()->to('pageFr')],
//                ['language' => 'de', 'url' => url()->to('pageDe')],
//                ['language' => 'bg', 'url' => url()->to('pageBg')],
//            ];
//            $sitemap->add(url()->to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);
//
//            // add item with images
//            $images = [
//                ['url' => url()->to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
//                ['url' => url()->to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
//                ['url' => url()->to('images/pic3.jpg'), 'title' => 'Image title3'],
//            ];
//            $sitemap->add(url()->to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);

            // get all posts from db
            $posts = Post::published()->orderBy('created_at', 'desc')->get();

            // add every post to the sitemap
            foreach ($posts as $post) {
                $sitemap->add($post->slug, $post->updated_at, 0.5, 'daily');
            }
        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }

}
