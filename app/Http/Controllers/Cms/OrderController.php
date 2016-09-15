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
        $orders = Order::orderByDesc('created_at')->get();

        return $orders;
    }
}
