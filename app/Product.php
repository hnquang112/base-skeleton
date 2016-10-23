<?php

namespace App;

use DB;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Carbon\Carbon;

class Product extends Post implements Buyable {
    const STT_NORMAL = 0;
    const STT_FEATURED = 1;

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

    public function reviews() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->products();
    }

    public function getIsOnSaleAttribute() {
        return !empty($this->discount_price);
    }

    public function getFrontUrlAttribute() {
        return route('shop.show', $this->slug);
    }

    public function getCurrentPriceAttribute() {
        return $this->is_on_sale ? $this->discount_price : $this->price;
    }

    public function getAverageRatingAttribute() {
        return round($this->reviews()->avg(DB::raw("cast(meta->>'rating' as integer)")), 1);
    }

    public function getIsFeaturedAttribute() {
        return (int) ($this->featured_at != null);
    }

    public function setFeaturedAtAttribute($value) {
        $this->attributes['featured_at'] = ($value == self::STT_FEATURED ? Carbon::now() : null);
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
        return $query->join('post_taxonomy', 'post_taxonomy.post_id', '=', 'posts.id')
            ->select('posts.*', DB::raw('COUNT(*) AS matched_tags'))
            ->whereIn('post_taxonomy.taxonomy_id', DB::table('post_taxonomy')->where('post_id', $this->id)->pluck('taxonomy_id'))
            ->where('posts.id', '<>', $this->id)
            ->groupBy('posts.id')->havingRaw('COUNT(*) > 1')
            ->orderBy('matched_tags', 'desc')->take(3);
    }

    public function scopeFeatured($query) {
        return $query->whereNotNull('featured_at')->take(4);
    }

    public function delete() {
        $this->reviews()->delete();
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
