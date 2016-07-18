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
        dd($request->category_ids);
        $this->validate($request, Post::$rulesForCreating);

        $post = new Post;
        $post->fill($request->all());
        $post->author_id = $this->getCurrentUser()->id;
        
        if ($post->save()) {
            $category_ids = $request->input('category_ids', []);
            $post->categories()->attach($category_ids);

            flash()->success('Saved successfully');

            return redirect()->route('cms.posts.index');
        }
        
        flash()->error('Save failed');

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
        $categories = $post->categories()->lists('taxonomies.id')->toArray();
//        $tags = Tag::lists('name', 'id');

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

        $post->fill($request->all());
        $post->author_id = $this->getCurrentUser()->id;

        if ($post->save()) {
            $category_ids = $request->input('category_ids', []);
            $post->categories()->sync($category_ids);

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

}
