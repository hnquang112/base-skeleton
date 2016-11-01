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

    public function getScaledUrl($scale = 'medium') {
        if (!is_string($this->path)) {
            return config('misc.no_preview_image');
        }

        $server = crc32($this->path) % 5;

        switch ($scale) {
            case 'thumb':
                $size = self::SIZ_THUMB;
                break;
            case 'large':
                $size = self::SIZ_LARGE;
                break;
            case 'full':
                $size = self::SIZ_FULL;
                break;
            default:
                $size = self::SIZ_MEDIUM;
                break;
        }

        if (app('env') != 'local') {
            return '//images' . $server . '-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&resize_w=' .
                $size . '&rewriteMime=image/*&url=' . urlencode(asset($this->path));
        } else {
            return asset($this->path);
        }
    }

}
