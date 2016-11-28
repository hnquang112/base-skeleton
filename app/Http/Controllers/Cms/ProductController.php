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

    // GET: /cms/products
    public function index() {
        $products = Product::orderByDesc('created_at')->get();

        return view('cms.products.index', compact('products'));
    }

    // GET: /cms/products/create
    public function create() {
        $product = new Product;
        $categories = [];
        $tags = [];

        return view('cms.products.form', compact('product', 'categories', 'tags'));
    }

    // POST: /cms/products
    public function store(Request $request) {
        $this->validate($request, array_merge(Product::$rulesForCreating, Product::$additionalRules));

        $product = new Product;

        $product->user_id = $this->getCurrentUser()->id;
        $product->published_at = Product::STT_PUBLISHED;

        $product->fill($request->except('represent_image'));

        if (!empty($request->represent_image)) $product->represent_image_id = create_file_from_path($request->represent_image);

        if ($product->save()) {
            $product->syncCategories($request->input('category_ids', []));
            $product->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }
        
        return back();
    }

    // GET: /cms/products/1/edit
    public function edit($product) {
        $categories = $product->category_ids;
        $tags = $product->tag_ids;

        return view('cms.products.form', compact('product', 'categories', 'tags'));
    }

    // PUT: /cms/products/1
    public function update(Request $request, $product) {
        $this->validate($request, array_merge(Product::$rulesForCreating, Product::$additionalRules));

        $product->fill($request->except('represent_image'));

        if (!empty($request->represent_image)) $product->represent_image_id = create_file_from_path($request->represent_image);

        if ($product->save()) {
            $product->syncCategories($request->input('category_ids', []));
            $product->syncTags($request->input('tag_ids', []));

            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/products/1
    public function destroy(Request $request)
    {
        $this->deleteMultipleItems(Product::class, $request->selected_ids);

        return back();
    }

    // POST: /cms/products/1/featured
    public function featured($product) {
        if (is_null($product->featured_at)) {
            $product->featured_at = Product::STT_FEATURED;
        } else {
            $product->featured_at = Product::STT_NORMAL;
        }

        if ($product->save()) {
            $err = 0;
            $data = [
                'status' => $product->is_featured,
                'value' => $product->featured_at ? $product->featured_at->format('Y-m-d H:i:s') : 'Not Featured',
            ];
            $msg = $product->is_featured ? 'Featured' : 'Not Featured';
        } else {
            $err = 1;
            $data = [];
            $msg = 'Error!';
        }

        return json_encode([
            'error' => $err,
            'message' => $msg,
            'data' => $data
        ]);
    }
}
