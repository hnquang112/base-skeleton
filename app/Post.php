<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'content'];

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'title' => 'required',
        'content' => 'required'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Mutators
     */
//    public function setSlugAttribute($value) {
//        $this->attributes['slug'] = str_slug($value);
//    }
}
