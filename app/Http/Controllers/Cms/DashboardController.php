<?php
/**
 * Created by PhpStorm.
 * User: hnquang
 * Date: 2016-07-12
 * Time: 5:30 AM
 */

namespace App\Http\Controllers\Cms;

use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends CmsController {
    // GET: /cms/dashboard
    public function index() {
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));

        return view('cms.dashboard.index', compact('analyticsData'));
    }
}