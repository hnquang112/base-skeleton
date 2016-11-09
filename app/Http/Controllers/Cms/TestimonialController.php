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

class TestimonialController extends CmsController {

    // GET: /cms/testimonials
    public function index() {
        $testimonials = Comment::testimonials()->orderByDesc('created_at')->get();
        $testimonial = new Comment;

        return view('cms.testimonials.index', compact('testimonials', 'testimonial'));
    }

    // GET: /cms/testimonials/create
    public function create() {
        $testimonial = new Comment;

        return view('cms.testimonials.form', compact('testimonial'));
    }

    // POST: /cms/testimonials
    public function store(Request $request) {
        $this->validate($request, Comment::$rulesForCreatingTestimonial);

        $testimonial = new Comment;
        $testimonial->type = Comment::TYP_TESTIMONIAL;
        if (!empty($request->image)) $testimonial->image_id = create_file_from_path($request->image);
        $testimonial->fill($request->except('image'));

        if ($testimonial->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // GET: /cms/testimonials/1/edit
    public function edit($testimonial) {
        return view('cms.testimonials.form', compact('testimonial'));
    }

    // PUT: /cms/testimonials/1
    public function update(Request $request, $testimonial) {
        $this->validate($request, Comment::$rulesForUpdatingTestimonial);

        if (!empty($request->image)) $testimonial->image_id = create_file_from_path($request->image);
        $testimonial->fill($request->except('image'));

        if ($testimonial->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/testimonials/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Comment::class, $request->selected_ids);

        return back();
    }
}