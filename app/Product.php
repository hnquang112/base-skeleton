<?php

namespace App;

class Product extends Post {
    protected $table = 'posts';
    protected $attributes = [
        'type' => self::TYP_PRODUCT,
    ];

    public static $additionalRules = [
        'price' => 'numeric|min:0|max:1000000000',
        'discount_price' => 'numeric|min:0|max:1000000000'
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->products();
    }

}
