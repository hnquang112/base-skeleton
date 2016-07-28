<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-15
 * Time: 9:52 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class HomeController extends FrontController
{
    public function index(Request $request) {
        return view('front.home.index');
    }

    public function store(Request $request) {

    }

    public function show($keyword) {

    }
}
