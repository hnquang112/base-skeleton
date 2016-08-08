<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-08-07
 * Time: 9:50 PM
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Comment;

class ContactController extends FrontController {
    public function index() {
        return view('front.contact.index');
    }

    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingContacts);

        $comment = new Comment;
        $comment->type = Comment::TYP_CONTACT;
        $comment->fill($request->all());

        $comment->save();
    }
}