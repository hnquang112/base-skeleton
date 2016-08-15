<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-12
 * Time: 5:30 AM
 */

namespace App\Http\Controllers\Cms;

class DashboardController extends CmsController {
    // GET: /cms/dashboard
    public function index() {
        return view('cms.dashboard.index');
    }
}