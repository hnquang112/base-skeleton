<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 31/08/2016
 * Time: 15:24
 */

namespace App;


class Article extends Post {
    protected $table = 'posts';
    protected $attributes = [
        'type' => self::TYP_ARTICLE,
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->articles();
    }

    public function getFrontUrlAttribute() {
        return route('blog.show', $this->slug);
    }

}
