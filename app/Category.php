<?php

namespace App;

class Category extends Taxonomy {
    protected $table = 'taxonomies';
    protected $attributes = array(
        'type' => Taxonomy::TYP_CATEGORY,
    );

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->categories();
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getFillable() {
        return $this->fillable;
    }
}
