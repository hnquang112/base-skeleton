<?php

namespace App;

use DB;

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

    public function getIsOnSaleAttribute() {
        return !empty($this->discount_price);
    }

    public function getFrontUrlAttribute() {
        return route('shop.show', $this->slug);
    }

    public function scopeSortByAlphabet($query) {
        return $query->orderBy('title');
    }

    public function scopeSortByTime($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeSortByPrice($query) {
        return $query->orderBy(DB::raw("meta->'price'"));
    }

    public function scopeFilterPrice($query, $start, $end) {
        if (empty($start) && empty($end)) return $query;
        return $query->whereBetween(DB::raw("meta->'price'"), [$start, $end]);
    }
}
