<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;
use Carbon\Carbon;

class Comment extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'message', 'rating', 'post_id'];
    protected $jsonColumns = ['meta'];

    const TYP_FEEDBACK = 0;
    const TYP_REVIEW = 1;
    const TYP_TESTIMONIAL = 2;
    const STT_DISAPPROVED = 0;
    const STT_APPROVED = 1;

    public static $rulesForCreatingFeedback = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required',
        'g-recaptcha-response' => 'required|captcha'
    ];

    public static $rulesForCreatingReview = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required',
        'rating' => 'required',
        'post_id' => 'required'
    ];

    public static $rulesForCreatingTestimonial = [
        'name' => 'required|max:255',
        'message' => 'required',
        'image' => 'required'
    ];

    public static $rulesForUpdatingTestimonial = [
        'name' => 'required|max:255',
        'message' => 'required'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "message":null,
            "post_id":null,
            "rating":null,
            "read_by_users":[],
            "image_id":null
        }');
    }

    /**
     * Accessors
     */
    public function getIsApprovedAttribute() {
        return (int) ($this->approved_at != null);
    }

    public function getImagePathAttribute() {
        return $this->image ? $this->image->path : '';
    }

//    public function getIsReadAttribute() {
//        if (empty($this->read_by_users) || in_array(auth()->user()->id, $this->read_by_users)) return true;
//        return false;
//    }

    /**
     * Mutators
     */
    public function setApprovedAtAttribute($value) {
        $this->attributes['approved_at'] = ($value == self::STT_APPROVED ? Carbon::now() : null);
    }

    /**
     * Relationships
     */
    public function product() {
        return $this->belongsTo('App\Product', "meta->post_id", 'id');
    }

    public function image() {
        return $this->hasOne('App\File', 'id', "meta->>'image_id'");
    }

    /**
     * Scopes
     */
    public function scopeFeedback($query) {
        return $query->where('type', self::TYP_FEEDBACK);
    }

    public function scopeReviews($query) {
        return $query->where('type', self::TYP_REVIEW);
    }

    public function scopeTestimonials($query) {
        return $query->where('type', self::TYP_TESTIMONIAL);
    }

    public function scopeOrderByDesc($query, $field) {
        return $query->orderBy($field, 'DESC');
    }

    // Filter featured testimonials only
    public function scopeFeatured($query) {
        return $query->orderByDesc('meta->rating')->orderByDesc('created_at')->take(2);
    }

    // Filter approved reviews only
    public function scopeApproved($query) {
        return $query->whereNotNull('approved_at');
    }

}
