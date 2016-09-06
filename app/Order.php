<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent\Dialect\Json;

class Order extends Model {
    use Json;

    protected $fillable = ['shipping_full_name', 'shipping_address', 'shipping_city', 'shipping_country', 'shipping_email',
        'shipping_phone', 'delivery_note'];
    protected $jsonColumns = ['meta'];

    /**
     * Validations
     */
    public static $rules = [
        'shipping_full_name' => 'required_if:ship_to_billing,0',
        'shipping_address' => 'required_if:ship_to_billing,0',
        'shipping_city' => 'required_if:ship_to_billing,0',
        'shipping_email' => 'required_if:ship_to_billing,0',
        'shipping_phone' => 'required_if:ship_to_billing,0'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "ship_to_billing":1,
            "shipping_full_name":null,
            "shipping_address":null,
            "shipping_city":null,
            "shipping_country":null,
            "shipping_email":null,
            "shipping_phone":null,
            "delivery_note":null
        }');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function products() {
        return $this->belongsToMany('App\Post', 'order_post', 'order_id', 'post_id')->withPivot('price', 'quantity');
    }

}
