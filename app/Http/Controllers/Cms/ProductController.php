<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/24/2016
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends CmsController {
    public function index() {
        $products = Product::all();

        return view('cms.products.index', compact('products'));
    }

    public function create() {
        $product = new Product;
        $categories = [];
        $tags = [];

        return view('cms.products.form', compact('product', 'categories', 'tags'));
    }

    public function store(Request $request) {
        $this->validate($request, array_merge(Product::$rulesForCreating, Product::$additionalRules));

        $product = new Product;

        $product->author_id = $this->getCurrentUser()->id;
        $product->represent_image_id = $request->represent_image;
        $product->fill($request->except('represent_image'));
        
        if ($product->save()) {
            $product->syncCategories($request->input('category_ids', []));
            $product->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }
        
        return back();
    }

    public function edit($product) {
        $categories = $product->category_ids;
        $tags = $product->tag_ids;

        return view('cms.products.form', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, $product) {
        $this->validate($request, array_merge(Product::$rulesForCreating, Product::$additionalRules));

        $product->represent_image_id = $request->represent_image;
        $product->fill($request->except('represent_image'));

        if ($product->save()) {
            $product->syncCategories($request->input('category_ids', []));
            $product->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }
}
