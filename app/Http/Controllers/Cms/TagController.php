<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends CmsController
{
    public function index(Request $request) {
        $tags = Tag::withCount('posts')->get();
        $tag = new Tag;

        return view('cms.tags.index', compact('tags', 'tag'));
    }

    public function create() {
        $tag = new Tag;

        return view('cms.tags.form', compact('tag'));
    }

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

    public function edit($tag) {
        return view('cms.tags.form', compact('tag'));
    }

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

    public function destroy(Request $request) {
        $this->deleteMultipleItems(Tag::class, $request->selected_ids);

        return back();
    }
}
