<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Eloquent\Dialect\Json;

class Post extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'content'];

    const STT_DRAFT = 0;
    const STT_PUBLISHED = 1;

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'title' => 'required|max:255',
        'content' => 'required'
    ];

    // public function __construct() {
    //     parent::__construct();
    //     $this->hintJsonStructure('meta', '{
    //         "seo_title":null,
    //         "seo_description":null,
    //         "published_date":null
    //     }');
    // }

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
     * Relationships
     */
    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * Mutators
     */
//    public function setSlugAttribute($value) {
//        $this->attributes['slug'] = str_slug($value);
//    }

    /**
     * Scopes
     */
    public function scopeMine($query) {
        return $query->where('author_id', auth()->user()->id);
    }

    public function scopePublished($query) {
        return $query->where('is_published', self::STT_PUBLISHED);
    }

    public function scopeFilter($query, $inputs) {
        // if ($inputs->has('filter_date')) $query = $query->where()
        // if ($inputs->has('filter_category')) $query = $query->where()
    }
}
