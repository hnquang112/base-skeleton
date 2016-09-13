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
    public function index() {
        $reviews = Comment::reviews()->orderByDesc('created_at')->get();
        $review = new Comment;

        return view('cms.reviews.index', compact('reviews', 'review'));
    }

    public function create() {

    }

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

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}