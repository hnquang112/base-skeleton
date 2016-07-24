<?php

namespace App;

class Product extends Post {
    protected $table = 'posts';
    protected $attributes = [
        'type' => self::TYP_PRODUCT,
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->tags();
    }

}
