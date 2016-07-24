<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Comment extends Post {
    const TYP_PAGE = 0;
    const TYP_POST = 1;

    public static $rulesForCreatingSliders = [
        'name' => 'required|max:255',
        'email' => 'required|max:255'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
            "email":null,
            "content":null,
            "rating":null
        }');
    }
}
