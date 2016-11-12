<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/21/2016
 * Time: 10:18 PM
 */

namespace App;

use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model {
    use Json, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [];
    protected $jsonColumns = ['meta'];

    const TYP_INTERNAL = 0;
    const TYP_EXTERNAL = 1;

    const SIZ_THUMB = 100;
    const SIZ_MEDIUM = 480;
    const SIZ_LARGE = 960;
    const SIZ_FULL = 1920;

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "name":null,
			"size":null,
			"content_type":null,
			"extension":null
		}');
    }

    public function getIsExternalAttribute() {
        return $this->type == self::TYP_EXTERNAL;
    }

    public function getUrlAttribute() {
        return $this->is_external ? $this->path : asset($this->path);
    }

}
