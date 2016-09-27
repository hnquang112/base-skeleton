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

    // GET: /contact
    public function index() {
        return $this->theme->scope('contact.index')->render();
    }

    // POST: /contact
    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingFeedback);

        $comment = new Comment;
        $comment->type = Comment::TYP_FEEDBACK;
        $comment->fill($request->all());

        if ($comment->save()) {
            return back()->with('contact.saved', true);
        }

        return back();
    }
}
