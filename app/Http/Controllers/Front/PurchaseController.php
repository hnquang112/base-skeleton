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
        // TODO: inform that the order is created and notify via billing email

        if ($request->ship_to_billing != 1) {
            $this->validate($request, User::$rulesForShipping);
            $this->validate($request, Order::$rules);
        }

        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            $user = new User;
            $user->fill($request->all());
            $user->type = User::USER;

            $user->save();
        }

        $order = new Order;
        if ($request->ship_to_billing != 1) {
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

        return redirect($order->front_url);
    }

    // GET: /checkout/123456
    public function show($order) {
        // need to check authorization and session
        return view('front.purchase.show', compact('order'));
    }

}