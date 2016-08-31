<?php

namespace App\Http\Controllers\Cms;

use App\Post;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Repositories\PostRepository;

class PostController extends CmsController
{
    /**
     * The post repository instance.
     */
    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    // GET: /cms/posts
    public function index(Request $request)
    {
        $posts = Post::with('author', 'tags')->articles()->orderByDesc('created_at')->get();

        return view('cms.posts.index', compact('posts'));
    }

    // GET: /cms/posts/create
    public function create()
    {
        $post = new Post;
        $tags = [];

        return view('cms.posts.form', compact('post', 'tags'));
    }

    // POST: /cms/posts
    public function store(Request $request)
    {
        $this->validate($request, Post::$rulesForCreating);

        $post = new Post;

        $post->author_id = $this->getCurrentUser()->id;
        $post->published_at = $request->do_publish;

        if (!empty($request->represent_image)) {
            $post->represent_image_id = create_file_from_path($request->represent_image);
        }

        $post->fill($request->except('do_publish', 'represent_image'));

        if ($post->save()) {
            $post->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }
        
        return back();
    }

    // GET: /cms/posts/1/edit
    public function edit($post)
    {
        $tags = $post->tag_ids;

        return view('cms.posts.form', compact('post', 'tags'));
    }

    // PUT: /cms/posts/1
    public function update(Request $request, $post)
    {
        $this->validate($request, Post::$rulesForCreating);

        if ($request->do_publish == Post::STT_PUBLISHED || $request->publish == Post::STT_PUBLISHED) {
            $post->published_at = $request->do_publish;
        } else {
            $post->published_at = null;
        }

        if (!empty($request->represent_image)) {
            $post->represent_image_id = create_file_from_path($request->represent_image);
        }

        $post->fill($request->except('do_publish', 'represent_image'));

        if ($post->save()) {
            $post->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/posts/1
    public function destroy(Request $request)
    {
        $this->deleteMultipleItems(Post::class, $request->selected_ids);

        return back();
    }

    /**
     * Toggle publish status of a post
     */
    public function togglePublish($post) {
        if (is_null($post->published_at)) {
            $post->published_at = Post::STT_PUBLISHED;
        } else {
            $post->published_at = Post::STT_DRAFT;
        }

        $post->save();

        return $post->published_at;
    }
}
