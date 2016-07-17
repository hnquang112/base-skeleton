<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/03/2016
 * Time: 10:05 PM
 */

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function gate() {
        if (auth()->check()) return redirect()->route('cms.dashboard.index');

        return redirect('/cms/login');
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