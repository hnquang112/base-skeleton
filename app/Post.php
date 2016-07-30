<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Eloquent\Dialect\Json;
use Carbon\Carbon;
use DB;

class Post extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'short_description', 'published_at', 'content', 'short_description', 'seo_title',
        'seo_description', 'seo_keywords', 'price', 'discount_price', 'is_in_stock', 'product_image_ids'];
    protected $jsonColumns = ['meta'];
    protected $attributes = [
        'type' => self::TYP_BLOG,
    ];

    const TYP_BLOG = 0;
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
        'represent_image' => 'active_url'
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
        return $this->belongsToMany('App\Category', 'post_taxonomy', 'post_id', 'taxonomy_id')
            ->where('post_type', $this->type)->where('taxonomy_type', Taxonomy::TYP_CATEGORY)
            ->withPivot('post_type', 'taxonomy_type')->withTimestamps();
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_taxonomy', 'post_id', 'taxonomy_id')
            ->where('post_type', $this->type)->where('taxonomy_type', Taxonomy::TYP_TAG)
            ->withPivot('post_type', 'taxonomy_type')->withTimestamps();
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

    public function getFrontUrlAttribute() {
        return route('blog.show', $this->slug);
    }

    public function getIsPublishedAttribute() {
        return $this->published_at != null;
    }

//    public function getPublishStatusAttribute() {
//        @if ($post->is_published)
//                                                <span class="text-success"><strong>Published</strong> at {{ $post->published_at }}</span>
//        @else
//                                                <span class="text-warning"><strong>Draft</strong>
//        @endif
//    }

    public function getRepresentImagePathAttribute() {
        return $this->represent_image ? $this->represent_image->path :
            'https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg';
    }

    /**
     * Mutators
     */
    public function setPublishedAtAttribute($value) {
        $this->attributes['published_at'] = ($value == self::STT_PUBLISHED ? Carbon::now() : null);
    }

    public function setRepresentImageIdAttribute($value) {
        if (!empty($value)) {
            $this->attributes['represent_image_id'] = create_file_from_path($value);
        }
    }

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

    public function scopeBlogPosts($query) {
        return $query->where('type', self::TYP_BLOG);
    }

    public function scopeProducts($query) {
        return $query->where('type', self::TYP_PRODUCT);
    }

    public function scopeSimilar($query) {
        return $query->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
            ->select('posts.*', DB::raw('COUNT(*) AS matched_tags'))
            ->whereIn('post_tag.tag_id', DB::table('post_tag')->where('post_id', $this->id)->lists('tag_id'))
            ->where('posts.id', '<>', $this->id)
            ->groupBy('posts.id')->havingRaw('COUNT(*) > 1')
            ->orderBy('matched_tags', 'desc')->take(3);
    }

    /**
     * Need to move to repository
     */
    public function syncCategories($categoryIds) {
        if (count($categoryIds) > 0) {
            $this->categories()->detach($this->category_ids);
            foreach ($categoryIds as $cate) {
                $this->categories()->attach([$cate => ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_CATEGORY]]);
            }
        } else {
            $this->categories()->detach($this->category_ids);
        }
    }

    public function syncTags($tagIds) {
        $arrIds = Tag::lists('id')->toArray();
        // List names of new tags
        $newTagNames = array_diff($tagIds, $arrIds);
        // List of existed tags to be sync
        $syncItems = array_intersect($tagIds, $arrIds);

        if (count($syncItems) > 0) {
            \Log::info('before detach');
            \Log::info($this->categories);
            \Log::info($this->tags);

            $this->tags()->detach($this->tag_ids);

            \Log::info('after detach');
            \Log::info($this->categories);
            \Log::info($this->tags);
            foreach ($syncItems as $tag) {
                $this->tags()->attach([$tag => ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_TAG]]);
            }
        } else {
            $this->tags()->detach($this->category_ids);
        }

        if (count($newTagNames) > 0) {
            foreach ($newTagNames as $name) {
                $tag = new Tag;
                $tag->name = $name;
                $tag->save();

                $this->tags()->attach([$tag->id => ['post_type' => $this->type, 'taxonomy_type' => Taxonomy::TYP_TAG]]);
            }
        }
    }
}
