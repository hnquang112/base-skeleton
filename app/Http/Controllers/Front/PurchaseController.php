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

        return view('front.purchase.create', compact('cartData', 'user'));
    }

    // POST: /checkout
    public function store(Request $request) {
        // check if billing email is existed
        // create new or get the user with corresponding email
        // create new order with user id above and the shipping info if provided
        // attach products from cart to created order
        // inform that the order is created and notify via billing email

        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            $user = new User;
            $user->fill($request->all());
            $user->type = User::USER;

            $user->save();
        }

        $order = new Order;
        if ($request->ship_to_billing != 1) {
            $this->validate($request, Order::$rules);
            $order->ship_to_billing = 0;
        }
        $order->fill($request->all());
        $order->user()->associate($user);

        if (!$order->save()) {
            return back();
        }

        $tmpCartItems = [];
        foreach (Cart::content() as $cartItem) {
            $tmpCartItems[$cartItem->id] = [
                'price' => $cartItem->price,
                'quantity' => $cartItem->qty
            ];
        }
        $order->products()->attach($tmpCartItems);

        Cart::destroy();

        return redirect()->route('checkout.show', $order->code);
    }

    // GET: /checkout/123456
    public function show($order) {
        // need to check authorization and session
        return view('front.purchase.show', compact('order'));
    }

}