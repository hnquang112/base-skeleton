<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Setting;

class SliderController extends CmsController
{
    public function index(Request $request) {
        $sliders = Setting::with('image')->sliders()->get();
        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;

        return view('cms.sliders.index', compact('sliders', 'slider'));
    }

    public function create() {
        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;

        return view('cms.sliders.form', compact('slider'));
    }

    public function store(Request $request) {
        $this->validate($request, Setting::$rulesForCreatingSliders);

        $slider = new Setting;
        $slider->type = Setting::TYP_SLIDER;
        $slider->image_id = $request->image;
        $slider->fill($request->except('image'));

        if ($slider->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    public function edit($slider) {
        return view('cms.sliders.form', compact('slider'));
    }

    public function update(Request $request, $slider) {
        $this->validate($request, Setting::$rulesForUpdatingSliders);

        $slider->image_id = $request->image;
        $slider->fill($request->except('image'));

        if ($slider->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.sliders.index');
        }

        flash()->error('Save failed');

        return back();
    }

    public function destroy(Request $request) {
        $this->deleteMultipleItems(Setting::class, $request->selected_ids);

        return back();
    }
}
