<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends CmsController {

    public function __construct() {
        $this->middleware('can:view,App\User');
    }

    // GET: /cms/tags
    public function index(Request $request) {
        $tags = Tag::withCount(['products', 'articles'])->orderByDesc('created_at')->get();
        $tag = new Tag;

        return view('cms.tags.index', compact('tags', 'tag'));
    }

    // GET: /cms/tags/create
    public function create() {
        $tag = new Tag;

        return view('cms.tags.form', compact('tag'));
    }

    // POST: /cms/tags
    public function store(Request $request) {
        $this->validate($request, Tag::$rulesForCreating);

        $tag = new Tag([
            'name' => $request->name
        ]);
        $tag->fill($request->all());

        if ($tag->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // GET: /cms/tags/1/edit
    public function edit($tag) {
        return view('cms.tags.form', compact('tag'));
    }

    // PUT: /cms/tags/1
    public function update(Request $request, $tag) {
        $this->validate($request, Tag::$rulesForCreating);

        $tag->fill($request->all());

        if ($tag->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.tags.index');
        }

        flash()->error('Save failed');

        return back();
    }

    // DELETE: /cms/tags/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Tag::class, $request->selected_ids);

        return back();
    }
}
