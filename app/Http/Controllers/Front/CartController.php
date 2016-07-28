<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-27
 * Time: 10:39 PM
 */

namespace App\Http\Controllers\Front;

use Cart;

class CartController extends FrontController {
    public function index() {
        return response()->json([
            'data' => Cart::content(),
            'meta' => [
                'status' => 200,
                'result' => 1
            ]
        ]);
    }
}