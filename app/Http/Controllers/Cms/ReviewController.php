<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 29/08/2016
 * Time: 09:54
 */

namespace App\Http\Controllers\Cms;

use App\Comment;
use Illuminate\Http\Request;

class ReviewController extends CmsController {

    // GET: /cms/reviews
    public function index() {
        $reviews = Comment::reviews()->orderByDesc('created_at')->get();
        $review = new Comment;

        return view('cms.reviews.index', compact('reviews', 'review'));
    }

    // GET: /cms/reviews/create
    public function create() {
        $review = new Comment;

        return view('cms.reviews.form', compact('review'));
    }

    // POST: /cms/reviews
    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingReview);

        $review = new Comment;
        $review->type = Comment::TYP_REVIEW;
        $review->fill($request->all());

        if ($review->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // GET: /cms/reviews/1/edit
    public function edit($review) {
        return view('cms.reviews.form', compact('review'));
    }

    // PUT: /cms/reviews/1
    public function update(Request $request, $review) {
        $this->validate($request, Comment::$rulesForCreatingReview);

        $review->fill($request->all());

        if ($review->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/reviews/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Category::class, $request->selected_ids);

        return back();
    }
}