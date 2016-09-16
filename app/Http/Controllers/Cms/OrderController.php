<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 15/09/2016
 * Time: 10:14
 */

namespace App\Http\Controllers\Cms;

use App\Order;

class OrderController extends CmsController {
    public function index() {
        $orders = Order::withCount('products')->orderByDesc('created_at')->get();

        return view('cms.orders.index', compact('orders'));
    }

    public function create() {
    }

    public function show($order) {
        return view('cms.orders.show');
    }

    public function edit($order) {

    }

    public function update($order) {

    }

    public function destroy($order) {

    }

    public function printOrder($order) {
        return view('cms.orders.print');
    }

}
