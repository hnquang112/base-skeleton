<?php

namespace App\Http\Controllers\Cms;

use App\Article;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Repositories\PostRepository;

class ArticleController extends CmsController {
    /**
     * The post repository instance.
     */
    protected $posts;

    public function __construct(PostRepository $posts) {
        $this->posts = $posts;
    }

    // GET: /cms/articles
    public function index(Request $request) {
        $articles = Article::with('author', 'tags')->orderByDesc('created_at')->get();

        return view('cms.articles.index', compact('articles'));
    }

    // GET: /cms/articles/create
    public function create() {
        $article = new Article;
        $tags = [];

        return view('cms.articles.form', compact('article', 'tags'));
    }

    // POST: /cms/articles
    public function store(Request $request) {
        $this->validate($request, Article::$rulesForCreating);

        $article = new Article;

        $article->user_id = $this->getCurrentUser()->id;
        $article->published_at = $request->do_publish;

        if (!empty($request->represent_image)) {
            $article->represent_image_id = create_file_from_path($request->represent_image);
        }

        $article->fill($request->except('do_publish', 'represent_image'));

        if ($article->save()) {
            $article->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }
        
        return back();
    }

    // GET: /cms/articles/1/edit
    public function edit($article) {
        $tags = $article->tag_ids;

        return view('cms.articles.form', compact('article', 'tags'));
    }

    // PUT: /cms/articles/1
    public function update(Request $request, $article) {
        $this->validate($request, Article::$rulesForCreating);

        if ($request->do_publish == Article::STT_PUBLISHED || $request->publish == Article::STT_PUBLISHED) {
            $article->published_at = $request->do_publish;
        } else {
            $article->published_at = null;
        }

        if (!empty($request->represent_image)) {
            $article->represent_image_id = create_file_from_path($request->represent_image);
        }

        $article->fill($request->except('do_publish', 'represent_image'));

        if ($article->save()) {
            $article->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/articles/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Article::class, $request->selected_ids);

        return back();
    }

    /**
     * Toggle publish status of a post
     */
    // POST: /cms/articles/1/publish
    public function publish($article) {
        if (is_null($article->published_at)) {
            $article->published_at = Article::STT_PUBLISHED;
        } else {
            $article->published_at = Article::STT_DRAFT;
        }

        if ($article->save()) {
            $err = 0;
            $data = $article->published_at;
            $msg = $article->is_published ? 'Published' : 'Unpublished';
        } else {
            $err = 1;
            $data = 'Draft';
            $msg = 'Error!';
        }

        return json_encode([
            'error' => $err,
            'message' => $msg,
            'data' => $data
        ]);
    }
}
