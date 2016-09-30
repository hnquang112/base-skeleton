<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-09-29
 * Time: 11:25 PM
 */

namespace App;

class Theme {
    protected $viewPath;
    protected $assetPath;

    public function __construct() {
        $this->viewPath = 'themes.' . config('view.theme') . '.views.';
    }

    public function load($viewPath, $data = []) {
        return view($this->viewPath . $viewPath, $data);
    }

}
