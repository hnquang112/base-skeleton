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

    public function __construct() {
        $this->middleware('can:view,App\User');
    }

    // GET: /cms/feedback
    public function index() {
        $this->seo()->setTitle('Feedback List');
        $feedback = Comment::feedback()->orderBy('created_at', 'desc')->get();

        $newFb = new Comment;

        return view('cms.feedback.index', compact('feedback', 'newFb'));
    }

    // GET: /cms/feedback/1
    public function show($feedback) {
        $this->seo()->setTitle('Feedback Detail');

        return view('cms.feedback.show', compact('feedback'));
    }

    // DELETE: /cms/feedback/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Comment::class, $request->selected_ids);

        return back();
    }

}
