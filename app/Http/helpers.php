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
        $file->type = File::TYP_INTERNAL;
        $file->path = $path;
        $file->save();

        return $file->id;
    }

    return null;
}

function create_file_from_input($input) {
    // if hasFile and file isValid
    // set new name with timestamp and extension
    // storeAs new name to storage public path
    // create new File record with file path and return id

    if (empty($input)) {
        return null;
    }

    if (!request()->file($input)->isValid()) {
        return null;
    }

    $validFile = request()->file($input);

    $newName = time() . '_' . $validFile->getClientOriginalName();
    $path = $validFile->storeAs('uploads', $newName);

    $file = new File;
    $file->type = File::TYP_INTERNAL;
    $file->path = $path;
    $file->name = $newName;
    $file->size = $validFile->getClientSize();
    $file->content_type = $validFile->getMimeType();
    $file->extension = $validFile->guessExtension();

    $file->save();

    return $file->id;
}

function get_auth_admin_type() {
    if (!auth()->check()) return null;
    return auth()->user()->type;
}

function get_front_lang_attribute($attr = null) {
    $lang = Cache::get('front.language');
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

function get_image_path($relationship, $scale = 'medium') {
    if (!$relationship) {
        return config('misc.no_preview_image');
    }

    $path = $relationship->url;

    if (app('env') != 'local') {
        $server = crc32($path) % 5;

        switch ($scale) {
            case 'thumb':
                $size = File::SIZ_THUMB;
                break;
            case 'large':
                $size = File::SIZ_LARGE;
                break;
            case 'full':
                $size = File::SIZ_FULL;
                break;
            default:
                $size = File::SIZ_MEDIUM;
                break;
        }

        return '//images' . $server . '-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&resize_w=' .
        $size . '&rewriteMime=image/*&url=' . urlencode(asset($path));
    } else {
        return asset($path);
    }
}

function format_day_string($datetime) {
    return Carbon::parse($datetime)->toDayDateTimeString();
}
