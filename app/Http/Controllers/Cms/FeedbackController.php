<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 09/08/2016
 * Time: 11:29
 */

namespace App\Http\Controllers\Cms;

use App\Comment;
use Illuminate\Http\Request;

class FeedbackController extends CmsController {
    // GET: /cms/feedback
    public function index() {
        $feedback = Comment::feedback()->orderBy('created_at', 'desc')->get();

        $newFb = new Comment;

        return view('cms.feedback.index', compact('feedback', 'newFb'));
    }

    // GET: /cms/feedback/create
    public function create() {
        $feedback = new Comment;
        $feedback->type = Comment::TYP_FEEDBACK;

        return view('cms.feedback.form', compact('feedback'));
    }

    // POST: /cms/feedback
    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingFeedback);

        $feedback = new Comment;
        $feedback->type = Comment::TYP_FEEDBACK;
        $feedback->fill($request->all());

        if ($feedback->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // GET: /cms/feedback/1/edit
    public function edit($feedback) {
        return view('cms.feedback.form', compact('feedback'));
    }

    // PUT: /cms/feedback/1
    public function update(Request $request, $feedback) {
        $this->validate($request, Comment::$rulesForCreatingFeedback);

        $feedback->fill($request->all());

        if ($feedback->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/feedback/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Comment::class, $request->selected_ids);

        return back();
    }

}
