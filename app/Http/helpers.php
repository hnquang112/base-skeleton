<?php
/**
 * Created by PhpStorm.
 * User: hnquang112
 * Date: 07/16/2016
 * Time: 1:45 PM
 */
use Carbon\Carbon;

function format_date_as_string($date) {
    return Carbon::parse($date)->format('Y/m/d');
}
