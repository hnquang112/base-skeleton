<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-08-07
 * Time: 9:50 PM
 */

namespace App\Http\Controllers\Front;


class ContactController extends FrontController {
    public function index() {
        return view('front.contact.index');
    }

    public function store() {
        
    }
}