<?php

namespace App;

class Tag extends Taxonomy
{
    protected $table = 'taxonomies';
    protected $attributes = [
        'type' => self::TYP_TAG,
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)->tags();
    }

//    /**
//     * Relationships
//     */
//    public function posts() {
//        return $this->belongsToMany('App\Post', 'post_taxonomy', 'taxonomy_id', 'post_id')
//            ->where('taxonomy_type', self::TYP_TAG)->where('post_type', Post::TYP_BLOG)->withTimestamps();
//    }
//
//    public function products() {
//        return $this->belongsToMany('App\Product', 'post_taxonomy', 'taxonomy_id', 'post_id')
//            ->where('taxonomy_type', self::TYP_TAG)->where('post_type', Post::TYP_PRODUCT)->withTimestamps();
//    }

    /**
     * Accessors
     */
    public function getFrontUrlAttribute()
    {
        return route('tag.show', $this->slug);
    }
}
