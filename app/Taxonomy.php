<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {
    use SoftDeletes, Sluggable, SluggableScopeHelpers, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description'];
    protected $jsonColumns = ['meta'];

	const TYP_CATEGORY = 0;
	const TYP_TAG = 1;

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'name' => 'required|max:255',
        'description' => 'max:255'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
             "description":null
        }');
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Relationships
     */
    public function posts() {
        return $this->belongsToMany('App\Post', 'post_taxonomy', 'taxonomy_id', 'post_id')
            ->where('taxonomy_type', $this->type)->where('post_type', Post::TYP_BLOG)->withTimestamps();
    }

    public function products() {
        return $this->belongsToMany('App\Product', 'post_taxonomy', 'taxonomy_id', 'post_id')
            ->where('taxonomy_type', $this->type)->where('post_type', Post::TYP_PRODUCT)->withTimestamps();
    }

    /**
     * Scopes
     */
    public function scopeCategories($query) {
        return $query->whereType(self::TYP_CATEGORY);
    }

    public function scopeTags($query) {
        return $query->whereType(self::TYP_TAG);
    }

    /**
     * Helpers
     */
    public function getRelatedPosts() {
        return $this->posts()->articles()->published()->orderBy('title')->get();
    }

    public function getRelatedProducts() {
        return $this->posts()->products()->published()->orderBy('title')->get();
    }

}
