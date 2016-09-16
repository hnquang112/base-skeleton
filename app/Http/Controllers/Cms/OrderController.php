<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 15/09/2016
 * Time: 10:14
 */

namespace App\Http\Controllers\Cms;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends CmsController {

    // GET: /cms/orders
    public function index() {
        $orders = Order::withCount('products')->orderByDesc('created_at')->get();

        return view('cms.orders.index', compact('orders'));
    }

    // GET: /cms/orders/create
    public function create() {

    }

    // POST: /cms/orders
    public function store(Request $request) {

    }

    // GET: /cms/orders/1
    public function show($order) {
        return view('cms.orders.show', compact('order'));
    }

    // GET: /cms/orders/1/edit
    public function edit($order) {

    }

    // PUT: /cms/orders/1
    public function update(Request $request, $order) {

    }

    // DELETE: /cms/orders/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Order::class, $request->selected_ids);

        return back();
    }

    // GET: /cms/orders/123456/print
    public function printOrder($order) {
        return view('cms.orders.print', compact('order'));
    }

}
