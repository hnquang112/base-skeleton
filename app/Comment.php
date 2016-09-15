<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Comment extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'message', 'rating', 'post_id'];
    protected $jsonColumns = ['meta'];

    const TYP_FEEDBACK = 0;
    const TYP_REVIEW = 1;
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

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "message":null,
            "post_id":null,
            "rating":null,
            "read_by_users":[],
            "status":null
        }');
    }

    /**
     * Accessors
     */
    public function getStatusClassAttribute() {
        return $this->status ? 'thumbs-o-up' : 'thumbs-o-down';
    }

//    public function getIsReadAttribute() {
//        if (empty($this->read_by_users) || in_array(auth()->user()->id, $this->read_by_users)) return true;
//        return false;
//    }

    /**
     * Relationships
     */
    public function product() {
        return $this->belongsTo('App\Product', "meta->post_id", 'id');
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

    public function scopeOrderByDesc($query, $field) {
        return $query->orderBy($field, 'DESC');
    }

    public function scopeFeatured($query) {
        return $query->orderByDesc('meta->rating')->orderByDesc('created_at')->take(2);
    }

    public function scopeApproved($query) {
        return $query->where('meta->status', self::STT_APPROVED);
    }

}
