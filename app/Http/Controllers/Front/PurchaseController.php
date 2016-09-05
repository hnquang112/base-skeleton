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
use App\Order;

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
        // check if billing email is existed
        // create new or get the user with corresponding email
        // create new order with user id above and the shipping info if provided
        // attach products from cart to created order
        // inform that the order is created and notify via billing email
        dd($request->all());

        $user = User::whereEmail($request->billing_email)->first();

        if (!$user) {
            $user = new User;
//            $user->fill($request->only('email', 'display_name', 'address', 'phone', 'city', 'country'));
            $user->fill($request->all());

            $user->save();
        }

        $order = new Order;
        if ($request->ship_to_billing != 1) {
            $order->ship_to_billing = 0;
        }
//        $order->fill($request->only('shipping_full_name', 'shipping_address', 'shipping_city', 'shipping_phone',
//            'shipping_country', 'shipping_email', 'delivery_note'));
        $order->fill($request->all());
        $order->user()->associate($user);

        $tmpCartItems = [];
        foreach (Cart::content() as $cartItem) {
            $tmpCartItems[$cartItem->id] = [
                'price' => $cartItem->price,
                'quantity' => $cartItem->qty
            ];
        }
        $order->products()->attach($tmpCartItems);
        $order->save();

        return back();
    }

}