<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 12/09/2016
 * Time: 16:49
 */

namespace App\Observers;

use Cache;
use App\Setting;

class SettingObserver {
    public function saved(Setting $setting) {
        Cache::forget('front.all_sliders');
        Cache::forget('front.language');
    }
}
