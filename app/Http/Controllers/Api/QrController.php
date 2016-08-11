<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 11/08/2016
 * Time: 11:55
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use QrCode;

class QrController extends ApiController {
    public function store(Request $request) {
        return QrCode::size(300)->generate($request->info);
    }
}
