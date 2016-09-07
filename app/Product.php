<?php

namespace App;

use DB;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Post implements Buyable {
    protected $table = 'posts';
    protected $attributes = [
        'type' => self::TYP_PRODUCT,
    ];

    public static $additionalRules = [
        'price' => 'numeric|min:0|max:1000000000',
        'discount_price' => 'numeric|min:0|max:1000000000'
    ];

    public function orders() {
        return $this->belongsToMany('App\Order', 'order_post', 'post_id', 'order_id');
    }

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->products();
    }

//    public function categories() {
//        return $this->belongsToMany('App\Category', 'post_taxonomy', 'post_id', 'taxonomy_id')
//            ->where('post_type', self::TYP_PRODUCT)->where('taxonomy_type', Taxonomy::TYP_CATEGORY)->withTimestamps();
//    }
//
//    public function tags() {
//        return $this->belongsToMany('App\Tag', 'post_taxonomy', 'post_id', 'taxonomy_id')
//            ->where('post_type', self::TYP_PRODUCT)->where('taxonomy_type', Taxonomy::TYP_TAG)->withTimestamps();
//    }

    public function getIsOnSaleAttribute() {
        return !empty($this->discount_price);
    }

    public function getFrontUrlAttribute() {
        return route('shop.show', $this->slug);
    }

    public function getCurrentPriceAttribute() {
        return $this->is_on_sale ? $this->discount_price : $this->price;
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

    public function scopeSimilar($query) {
        return $query->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
            ->select('posts.*', DB::raw('COUNT(*) AS matched_tags'))
            ->whereIn('post_tag.tag_id', DB::table('post_tag')->where('post_id', $this->id)->lists('tag_id'))
            ->where('posts.id', '<>', $this->id)
            ->groupBy('posts.id')->havingRaw('COUNT(*) > 1')
            ->orderBy('matched_tags', 'desc')->take(3);
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = []) {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = []) {
        return $this->title;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = []) {
        return $this->current_price;
    }

}
