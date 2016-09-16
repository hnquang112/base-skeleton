<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent\Dialect\Json;
use DB;

class Order extends Model {
    use Json;

    protected $fillable = ['delivery_note', 'ship_to_billing', 'shipping_email', 'shipping_phone',];
    protected $jsonColumns = ['meta'];

    /**
     * Validations
     */
    public static $rules = [
        'shipping_email' => 'required',
        'shipping_phone' => 'required'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "ship_to_billing":null,
            "delivery_note":null,
            "shipping_email":null,
            "shipping_phone":null
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

    public function getFrontUrlAttribute() {
        return route('checkout.show', $this->code);
    }

    public function getUserNameAttribute() {
        // if ship_to_billing = 1 return bill name
        // else return ship name
        return $this->ship_to_billing ? $this->user->display_name : $this->user->shipping_full_name;
    }

    public function getUserAddressAttribute() {
        return $this->ship_to_billing ? $this->user->address : $this->user->shipping_address;
    }

    public function getUserCityAttribute() {
        return $this->ship_to_billing ? $this->user->city : $this->user->shipping_city;
    }

    public function getUserCountryAttribute() {
        return $this->ship_to_billing ? $this->user->country : $this->user->shipping_country;
    }

    public function getUserPhoneAttribute() {
        return $this->ship_to_billing ? $this->user->phone : $this->shipping_phone;
    }

    public function getUserEmailAttribute() {
        return $this->ship_to_billing ? $this->user->email : $this->shipping_email;
    }

    public function scopeOrderByDesc($query, $field) {
        return $query->orderBy($field, 'DESC');
    }

}
