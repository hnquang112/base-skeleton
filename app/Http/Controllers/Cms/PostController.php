<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Post;
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
        $posts = Post::with('author')->orderByDesc('created_at')->paginate(10);

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

        return view('cms.posts.create', compact('post'));
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
        $post->fill($request->all());
        $post->author_id = $this->getCurrentUser()->id;
        
        if ($post->save()) {
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
        return view('cms.posts.edit', compact('post'));
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
        if (empty($request->selected_ids)) {
            flash()->warning('Select item');
        } else {
            Post::destroy($request->selected_ids);

            flash()->success('Deleted successfully');
        }

        return back();
    }

}
