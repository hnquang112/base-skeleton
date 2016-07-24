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

    /**
     * Accessors
     */
    public function getFrontUrlAttribute()
    {
        return route('tag.show', $this->slug);
    }
}
