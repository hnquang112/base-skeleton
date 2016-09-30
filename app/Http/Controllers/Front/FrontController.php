<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:54 PM
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Session;
use App\Theme;

class FrontController extends Controller {
    protected $theme;

    public function __construct(Theme $theme) {
        $this->theme = $theme;
    }

    public function getSessionId() {
        return Session::getId();
    }
}
