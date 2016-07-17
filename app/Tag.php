<?php

namespace App;

class Tag extends Taxonomy {
    protected $table = 'taxonomies';
    protected $attributes = array(
        'type' => Taxonomy::TYP_TAG,
    );

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->tags();
    }

}
