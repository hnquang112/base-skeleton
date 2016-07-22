<?php

namespace App\Http\Controllers\Cms;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Repositories\PostRepository;

class PostController extends CmsController
{
    /**
     * The post repository instance.
     */
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('author', 'categories')->orderByDesc('created_at')->paginate(10);

        return view('cms.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        $categories = [];
        $tags = [];

        return view('cms.posts.form', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rulesForCreating);

        $post = new Post;

        $post->author_id = $this->getCurrentUser()->id;
        $post->published_at = $request->do_publish;
        $post->represent_image_id = $request->represent_image;
        $post->fill($request->except('do_publish', 'represent_image'));
        
        if ($post->save()) {
            $post->syncCategories($request->input('category_ids', []));
            $post->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }
        
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $categories = $post->category_ids;
        $tags = $post->tag_ids;

        return view('cms.posts.form', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $this->validate($request, Post::$rulesForCreating);

        if ($request->do_publish == Post::STT_PUBLISHED) $post->published_at = $request->do_publish;
        $post->represent_image_id = $request->represent_image;
        $post->fill($request->except('do_publish', 'represent_image'));

        if ($post->save()) {
            $post->syncCategories($request->input('category_ids', []));
            $post->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
