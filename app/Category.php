<?php

namespace App;

class Category extends Taxonomy
{
    protected $table = 'taxonomies';
    protected $attributes = [
        'type' => self::TYP_CATEGORY,
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)->categories();
    }

    /**
     * Accessors
     */
    public function getFrontUrlAttribute()
    {
        return route('category.show', $this->slug);
    }
}
