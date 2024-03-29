<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends CmsController {

    public function __construct() {
        $this->middleware('can:view,App\User');
    }

    // GET: /cms/categories
    public function index(Request $request) {
        $this->seo()->setTitle('Category List');
        $categories = Category::withCount('products')->orderByDesc('created_at')->get();
        $category = new Category;

        return view('cms.categories.index', compact('categories', 'category'));
    }

    // GET: /cms/categories/create
    public function create() {
        $this->seo()->setTitle('Create Category');
        $category = new Category;

        return view('cms.categories.form', compact('category'));
    }

    // POST: /cms/categories
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

    // GET: /cms/categories/1/edit
    public function edit($category) {
        $this->seo()->setTitle('Edit Category');

        return view('cms.categories.form', compact('category'));
    }

    // PUT: /cms/categories/1
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

    // DELETE: /cms/categories/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Category::class, $request->selected_ids);

        return back();
    }
}
