<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Comment extends Post {

    protected $fillable = ['name', 'email', 'content', 'rating', 'post_id'];

    const TYP_CONTACT = 0;
    const TYP_REVIEW = 1;

    public static $rulesForCreatingContacts = [
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'content' => 'required'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "content":null,
            "rating":null,
            "post_id":null
        }');
    }

    public function post() {
        return $this->belongsTo('App\Post', "meta->>'post_id'", 'id');
    }
}
