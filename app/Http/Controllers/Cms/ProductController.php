<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/24/2016
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\Cms;


use App\Product;

class ProductController extends CmsController {
    public function index() {
        $product = new Product;

        return $product;
    }
}