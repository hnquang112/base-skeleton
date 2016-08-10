<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Comment extends Model {
    use SoftDeletes, Json;

    protected $fillable = ['type', 'name', 'email', 'message', 'rating', 'post_id'];
    protected $jsonColumns = ['meta'];

    const TYP_FEEDBACK = 0;
    const TYP_REVIEW = 1;

    public static $rulesForCreatingFeedback = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "message":null,
            "rating":null,
            "post_id":null,
            "read_by_users":[]
        }');
    }

    /**
     * Accessors
     */
    public function getIsReadAttribute() {
        if (in_array(auth()->user()->id, $this->read_by_users ?: [])) return true;
        return false;
    }

    /**
     * Relationships
     */
    public function post() {
        return $this->belongsTo('App\Post', "meta->>'post_id'", 'id');
    }

    /**
     * Scopes
     */
    public function scopeFeedback($query) {
        return $query->where('type', self::TYP_FEEDBACK);
    }
}
