<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/03/2016
 * Time: 10:05 PM
 */

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Setting;
use App;

class CmsController extends Controller {

    public function __construct() {
        $lang = Setting::getSiteConfigValue('cms_page_language');

        if (!App::isLocale($lang)) {
            App::setLocale($lang);
        }
    }

    // GET: /cms
    public function gate() {
        return redirect()->route('cms.dashboard.index');
    }

    // GET: /cms/{vi|en}
    public function changeLanguage($lang) {
        Setting::setSiteConfigValue('cms_page_language', $lang);

        return back();
    }

	public function getCurrentUser() {
		return auth()->check() ? auth()->user() : null;
	}

	public function deleteMultipleItems($model, $input) {
        if (empty($input)) {
            flash()->warning('Select item');
        } else {
            $model::destroy($input);

            flash()->success('Deleted successfully');
        }
    }
}