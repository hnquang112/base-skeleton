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

function createFileFromPath($path) {
    if (!empty($path)) {
        $file = new File;
        $file->path = $path;
        $file->save();

        return $file->id;
    }

    return null;
}
