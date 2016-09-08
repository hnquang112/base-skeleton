<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Eloquent\Dialect\Json;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'short_description', 'published_at', 'content', 'seo_title', 'seo_description',
        'seo_keywords', 'price', 'discount_price', 'is_in_stock', 'product_image_ids'];
    protected $jsonColumns = ['meta'];
    protected $attributes = [
        'type' => self::TYP_ARTICLE,
    ];

    const TYP_ARTICLE = 0;
    const TYP_PRODUCT = 1;

    const STT_DRAFT = 0;
    const STT_PUBLISHED = 1;

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'title' => 'required|max:255',
        'short_description' => 'required|max:255',
        'content' => 'required',
        'represent_image' => 'image'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "short_description":null,
            "seo_title":null,
            "seo_description":null,
            "seo_keywords":null,
            "price":0,
            "discount_price":null,
            "is_in_stock":true,
            "represent_image_id":null,
            "product_image_ids":[]
        }');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
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
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'post_taxonomy', 'post_id', 'taxonomy_id')
            ->withPivot('post_type', 'taxonomy_type')->withTimestamps()
            ->wherePivot('post_type', $this->type)
            ->wherePivot('taxonomy_type', Taxonomy::TYP_CATEGORY);
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_taxonomy', 'post_id', 'taxonomy_id')
            ->withPivot('post_type', 'taxonomy_type')->withTimestamps()
            ->wherePivot('post_type', $this->type)
            ->wherePivot('taxonomy_type', Taxonomy::TYP_TAG);
    }

    public function represent_image() {
        return $this->hasOne('App\File', 'id', "meta->>'represent_image_id'");
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

    public function getIsPublishedAttribute() {
        return $this->published_at != null;
    }

    public function getRepresentImagePathAttribute() {
        return !empty($this->represent_image) ? $this->represent_image->path :
            'https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg';
    }

    /**
     * Mutators
     */
    public function setPublishedAtAttribute($value) {
        $this->attributes['published_at'] = ($value == self::STT_PUBLISHED ? Carbon::now() : null);
    }

    /**
     * Scopes
     */
    public function scopeMine($query) {
        return $query->where('user_id', auth()->user()->id);
    }

    public function scopePublished($query) {
        return $query->whereNotNull('published_at');
    }

    public function scopeOrderByDesc($query, $field) {
        return $query->orderBy($field, 'DESC');
    }

    public function scopeSearch($query, $keyword) {
        return $query->where('title', 'like', "%$keyword%")
            ->orWhere('content', 'like', "%$keyword%");
    }

    public function scopeArticles($query) {
        return $query->where('type', self::TYP_ARTICLE);
    }

    public function scopeProducts($query) {
        return $query->where('type', self::TYP_PRODUCT);
    }

    /**
     * Need to move to repository
     */
    public function syncCategories($categoryIds) {
        $tmpCatIds = [];
        foreach ($categoryIds as $id) {
            $tmpCatIds[$id] = ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_CATEGORY];
        }

        $this->categories()->sync($tmpCatIds);
    }

    public function syncTags($tagIds) {
        $arrIds = Tag::lists('id')->toArray();
        // List names of new tags
        $newTagNames = array_diff($tagIds, $arrIds);
        // List of existed tags to be sync
        $syncItems = array_intersect($tagIds, $arrIds);

        $tmpTagIds = [];
        foreach ($syncItems as $id) {
            $tmpTagIds[$id] = ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_TAG];
        }

        $this->tags()->sync($tmpTagIds);

        foreach ($newTagNames as $name) {
            $tag = new Tag;
            $tag->name = $name;
            $tag->save();

            $this->tags()->attach($tag->id, ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_TAG]);
        }
    }

    public function delete() {
        $this->categories()->detach();
        $this->tags()->detach();

        parent::delete();
    }
}
