<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Comment extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'message', 'rating'];
    protected $jsonColumns = ['meta'];

    const TYP_FEEDBACK = 0;
    const TYP_REVIEW = 1;

    public static $rulesForCreatingFeedback = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required',
        'g-recaptcha-response' => 'required|captcha'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "message":null,
            "post_id":null,
            "rating":null,
            "read_by_users":[]
        }');
    }

    /**
     * Accessors
     */
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

}
