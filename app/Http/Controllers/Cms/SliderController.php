<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Setting;

class SliderController extends CmsController {

    // GET: /cms/sliders
    public function index(Request $request) {
        $sliders = Setting::with('image')->sliders()->get();
        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;

        return view('cms.sliders.index', compact('sliders', 'slider'));
    }

    // GET: /cms/settings/create
    public function create() {
        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;

        return view('cms.sliders.form', compact('slider'));
    }

    // POST: /cms/settings
    public function store(Request $request) {
        $this->validate($request, Setting::$rulesForCreatingSliders);

        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;
        if (!empty($request->image)) $slider->image_id = create_file_from_path($request->image);
        $slider->fill($request->except('image'));

        if ($slider->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // GET: /cms/settings/1/edit
    public function edit($slider) {
        return view('cms.sliders.form', compact('slider'));
    }

    // PUT: /cms/settings/1
    public function update(Request $request, $slider) {
        $this->validate($request, Setting::$rulesForUpdatingSliders);

        if (!empty($request->image)) $slider->image_id = create_file_from_path($request->image);
        $slider->fill($request->except('image'));

        if ($slider->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.sliders.index');
        }

        flash()->error('Save failed');

        return back();
    }

    // DELETE: /cms/settings/1
    public function destroy(Request $request) {
        $this->deleteMultipleItems(Setting::class, $request->selected_ids);

        return back();
    }
}
