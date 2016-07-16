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
//        return $this->belongsToMany('App\User', 'author_id');
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
}
