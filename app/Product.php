<?php

namespace App;

class Product extends Post {
    protected $table = 'posts';
    protected $attributes = array(
        'type' => Post::TYP_PRODUCT,
    );

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->tags();
    }

}
