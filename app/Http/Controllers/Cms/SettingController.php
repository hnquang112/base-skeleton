<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 15/08/2016
 * Time: 16:04
 */

namespace App\Http\Controllers\Cms;

use Cache;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends CmsController {

    public function __construct() {
        $this->middleware('can:view,App\User');
    }

    // GET: /cms/settings
    public function index() {
        return view('cms.settings.index');
    }

    // POST: /cms/settings
    public function store(Request $request) {
        // Set language
        Setting::setSiteConfigValue('front_page_language', $request->front_page_language);
        Cache::forget('front.language');

        // Set contact
        Setting::setSiteConfigValue('store_address', $request->store_address);
        Setting::setSiteConfigValue('store_phone', $request->store_phone);
        Setting::setSiteConfigValue('store_email', $request->store_email);

        flash()->success('Saved successfully');
        return back();
    }
}
