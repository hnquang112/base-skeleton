<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent\Dialect\Json;

class Order extends Model {
    use Json;

    protected $fillable = ['full_name', 'address', 'city', 'country', 'email', 'phone', 'delivery_note'];
    protected $jsonColumns = ['meta'];

    /**
     * Validations
     */
    public static $rules = [
        'full_name' => 'required_if:ship_to_billing,0',
        'address' => 'required_if:ship_to_billing,0',
        'city' => 'required_if:ship_to_billing,0',
        'email' => 'required_if:ship_to_billing,0',
        'phone' => 'required_if:ship_to_billing,0'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "price":0,
            "ship_to_billing":1,
            "full_name":null,
            "address":null,
            "city":null,
            "country":null,
            "email":null,
            "phone":null,
            "delivery_note":null
        }');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function products() {
        return $this->belongsToMany('App\Post', 'order_post', 'order_id', 'post_id');
    }


}
