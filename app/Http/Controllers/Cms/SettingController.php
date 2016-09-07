<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 15/08/2016
 * Time: 16:04
 */

namespace App\Http\Controllers\Cms;

use DB;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends CmsController {

    // GET: /cms/settings
    public function index() {
        return view('cms.settings.index');
    }

    // POST: /cms/settings
    public function store(Request $request) {
        // Set language
        Setting::setSiteConfigValue('front_page_language', $request->front_page_language);

        flash()->success('Saved successfully');
        return back();
    }
}
