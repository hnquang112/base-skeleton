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
    public function index() {
        return view('cms.settings.index');
    }

    public function store(Request $request) {
        // Set language
        $langConf = Setting::firstOrCreate([
            'type' => Setting::TYP_SITE,
            'meta->label' => 'front_page_language'
        ]);
//        $langConf = DB::table('settings')->where("meta->label", 'front_page_language')->count();
        return ($langConf);
        $langConf->value = $request->front_page_language;
        $langConf->save();

        return back();
    }
}
