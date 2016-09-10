<?php
/**
 * Created by PhpStorm.
 * User: hnquang112
 * Date: 07/16/2016
 * Time: 1:45 PM
 */
use Carbon\Carbon;
use App\File;
use App\Setting;

function format_date_as_string($date) {
    return Carbon::parse($date)->format('d/m/Y');
}

function format_price_with_currency($price, $currency = 'đ') {
    if (empty($price)) return '';
    return number_format(floatval($price)) . $currency;
}

function create_file_from_path($path) {
    if (!empty($path)) {
        $file = new File;
        $file->file = $path;
        $file->save();

        return $file->id;
    }

    return null;
}

function get_auth_admin_type() {
    if (!auth()->check()) return null;
    return auth()->user()->type;
}

function get_front_lang_attribute($attr = null) {
    $lang = Setting::getSiteConfigValue('front_page_language');
    $fallback = 'en';

    if (is_null($attr)) {
        return !empty($lang) ? $lang : $fallback;
    }

    return !empty($lang) ? Setting::$languages[$lang][$attr] : $fallback;
}

function get_cms_lang_attribute($attr = null) {
    $lang = Setting::getSiteConfigValue('cms_page_language');
    $fallback = 'en';

    if (is_null($attr)) {
        return !empty($lang) ? $lang : $fallback;
    }

    return !empty($lang) ? Setting::$languages[$lang][$attr] : $fallback;
}

function calc_stars_from_rating($rating) {
    // rating from 1 to 5. stars' width is 80px
    return $rating / 5 * 80;
}
