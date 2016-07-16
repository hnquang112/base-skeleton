<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends CmsController
{
    public function index(Request $request) {
        $categories = Category::all();
        $category = new Category;

        return view('cms.categories.index', compact('categories', 'category'));
    }

    public function create() {
        $category = new Category;

        return view('cms.categories.create', compact('category'));
    }

    public function store(Request $request) {
        $this->validate($request, Category::$rulesForCreating);

        $category = new Category([
            'name' => $request->name
        ]);
        $category->fill($request->all());

        if ($category->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    public function edit($category) {
        return view('cms.categories.create', compact('category'));
    }

    public function update(Request $request, $category) {
        $this->validate($request, Category::$rulesForCreating);

        $category->fill($request->all());

        if ($category->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.categories.index');
        }

        flash()->error('Save failed');

        return back();
    }

    public function destroy(Request $request) {
        if (empty($request->selected_ids)) {
            flash()->warning('Select item');
        } else {
            Category::destroy($request->selected_ids);

            flash()->success('Deleted successfully');
        }

        return back();
    }
}
