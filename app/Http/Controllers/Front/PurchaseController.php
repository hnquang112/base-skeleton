<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 09/04/2016
 * Time: 9:48 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Cart;
use App\User;

class PurchaseController extends FrontController {

    // GET: /checkout
    public function index() {
        if (Cart::count() == 0) {
            return redirect()->route('cart.index');
        }

        $cartData = Cart::content();

        if (auth()->guard('web')->check()) {
            $user = auth()->guard('web')->user();
        } else {
            $user = new User;
        }

        return view('front.shop.purchase', compact('cartData', 'user'));
    }

    // POST: /checkout
    public function store(Request $request) {
        dd($request->all());
    }

}