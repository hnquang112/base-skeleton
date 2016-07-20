<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Eloquent\Dialect\Json;

class Post extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'short_description', 'content', 'short_description', 'represent_image', 'seo_title',
        'seo_description', 'seo_keywords'];
    protected $jsonColumns = ['meta'];

    const STT_DRAFT = 0;
    const STT_PUBLISHED = 1;

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'title' => 'required|max:255',
        'short_description' => 'required|max:255',
        'content' => 'required'
    ];

     public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "short_description":null,
            "represent_image":null,
            "seo_title":null,
            "seo_description":null,
            "seo_keywords":null
        }');
     }

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

    public function categories() {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Accessors
     */
    public function getCategoryNamesAttribute() {
        return implode($this->categories()->lists('name')->toArray(), ', ');
    }

    public function getTagNamesAttribute() {
        return implode($this->tags()->lists('name')->toArray(), ', ');
    }

    public function getCategoryIdsAttribute() {
        return $this->categories()->lists('taxonomies.id')->toArray();
    }

    public function getTagIdsAttribute() {
        return $this->tags()->lists('taxonomies.id')->toArray();
    }

    public function getFrontUrlAttribute() {
        return route('blog.show', $this->slug);
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
        return $query->whereNotNull('published_at');
    }

    public function scopeOrderByDesc($query, $field) {
        return $query->orderBy($field, 'DESC');
    }

    public function scopeFilter($query, $inputs) {
        // if ($inputs->has('filter_date')) $query = $query->where()
        // if ($inputs->has('filter_category')) $query = $query->where()
    }

    /**
     * Need to move to repository
     */
    public function syncCategories($categoryIds) {
        $this->categories()->sync($categoryIds);
    }

    public function syncTags($tagIds) {
        $arrIds = Tag::lists('id')->toArray();
        $newTagNames = array_diff($tagIds, $arrIds);
        $syncItems = array_intersect($tagIds, $arrIds);

        $this->tags()->sync($syncItems);

        foreach ($newTagNames as $name) {
            $tag = new Tag;
            $tag->name = $name;
            $tag->save();

            $this->tags()->attach($tag->id);
        }
    }
}
