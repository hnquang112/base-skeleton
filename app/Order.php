<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent\Dialect\Json;
use DB;

class Order extends Model {
    use Json;

    protected $fillable = ['shipping_full_name', 'shipping_address', 'shipping_city', 'shipping_country', 'shipping_email',
        'shipping_phone', 'delivery_note', 'ship_to_billing'];
    protected $jsonColumns = ['meta'];

    /**
     * Validations
     */
    public static $rules = [
        'shipping_full_name' => 'required',
        'shipping_address' => 'required',
        'shipping_city' => 'required',
        'shipping_email' => 'required',
        'shipping_phone' => 'required'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "ship_to_billing":null,
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

    public function getTotalPriceAttribute() {
        return DB::table('order_post')->whereOrderId($this->id)->sum('price');
    }

}
