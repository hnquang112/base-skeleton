<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-08-07
 * Time: 9:50 PM
 */

namespace App\Http\Controllers\Front;

use App\Notifications\FeedbackSent;
use Illuminate\Http\Request;
use App\Comment;
use App\Admin;

class ContactController extends FrontController {

    // GET: /contact
    public function index() {
        return view('front.contact.index');
    }

    // POST: /contact
    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingFeedback);

        $comment = new Comment;
        $comment->type = Comment::TYP_FEEDBACK;
        $comment->fill($request->all());

        if ($comment->save()) {
            // Notify to all admins via mail
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new FeedbackSent($comment));
            }
            return back()->with('contact.saved', true);
        }

        return back();
    }
}
