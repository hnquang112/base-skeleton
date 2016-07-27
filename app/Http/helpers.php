<?php
/**
 * Created by PhpStorm.
 * User: hnquang112
 * Date: 07/16/2016
 * Time: 1:45 PM
 */
use Carbon\Carbon;
use App\File;

function format_date_as_string($date) {
    return Carbon::parse($date)->format('Y/m/d');
}

function format_price_with_currency($price, $currency = 'đ') {
    if (empty($price)) return '';
    return number_format(floatval($price)) . $currency;
}

function create_file_from_path($path) {
    if (!empty($path)) {
        $file = new File;
        $file->path = $path;
        $file->save();

        return $file->id;
    }

    return null;
}
