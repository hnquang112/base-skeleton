<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-09-06
 * Time: 10:45 PM
 */

namespace App\Observers;

use App\Order;

class OrderObserver {
    public function creating(Order $order) {
        $order->code = sprintf("%06d", mt_rand(1, 999999));
    }
}
