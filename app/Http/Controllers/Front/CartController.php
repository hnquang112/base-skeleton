<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-27
 * Time: 10:39 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Cart;

class CartController extends FrontController {

    // GET: /cart
    public function index() {
        $cartData = Cart::content();

        return view('shop.cart', compact('cartData'));
    }

    // [AJAX] POST: /shop/lorem-ipsum/cart
    public function store(Request $request, $product) {
        if ($request->quantity > 0 && Cart::add($product, $request->quantity)) {
            $err = 0;
            $msg = trans('front.cart.added');
            $data = [
                'product_id' => $product->id,
                'cart_count' => Cart::count()
            ];
        } else {
            $err = 1;
            $msg = trans('front.common.error');
            $data = [];
        }

        return json_encode([
            'error' => $err,
            'message' => $msg,
            'data' => $data
        ]);
    }

    // [AJAX] PUT: /cart/88aad65a1416c8271cddc2ee48e4a30b
    public function update(Request $request, $cart) {
        $qty = $request->quantity;
        if ($qty > 0) {
            Cart::update($cart, $qty);
            $err = 0;
            $msg = trans('front.cart.updated');
            $data = [
                'total_price' => Cart::subtotal(0, '.', ',')
            ];
        } else {
            $err = 1;
            $msg = trans('front.common.error');
            $data = [];
        }

        return json_encode([
            'error' => $err,
            'message' => $msg,
            'data' => $data
        ]);
    }

    // [AJAX] DELETE: /cart/88aad65a1416c8271cddc2ee48e4a30b
    public function destroy($cart) {
        if (Cart::get($cart)) {
            Cart::remove($cart);
            $err = 0;
            $msg = trans('front.cart.removed');
            $data = [
                'total_price' => Cart::subtotal(0, '.', ',')
            ];
        } else {
            $err = 1;
            $msg = trans('front.common.error');
            $data = [];
        }

        return json_encode([
            'error' => $err,
            'message' => $msg,
            'data' => $data
        ]);
    }

}