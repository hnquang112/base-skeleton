<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Setting extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['type', 'label', 'description', 'value', 'image_id'];
    protected $jsonColumns = ['meta'];

    const TYP_SLIDER = 0;
    const TYP_MENU = 1;
    const TYP_CONFIG = 2;
    const TYP_QUOTE = 3;

    public static $languages = [
        'vi' => [
            'name' => 'Tiếng Việt',
            'flag' => 'vn',
            'code' => 'vi_VN',
        ],
        'en' => [
            'name' => 'English',
            'flag' => 'us',
            'code' => 'en_US',
        ]
    ];

    public static $siteConfigLabels = [
        'front_page_language',
        'cms_page_language',
        'store_address',
        'store_phone',
        'store_email',
    ];

    public static $rulesForCreatingSliders = [
        'label' => 'required|max:255',
        'image' => 'required'
    ];

    public static $rulesForUpdatingSliders = [
        'label' => 'required|max:255'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "label":null,
            "description":null,
            "menu_item":null,
            "menu_url":null,
            "config_value":null,
            "quote_content":null,
            "quote_author":null
        }');
    }

    /**
     * Relationships
     */
    public function image() {
        return $this->hasOne('App\File', 'id', 'image_id');
    }

    /**
     * Accessors
     */
    public function getImagePathAttribute() {
        return $this->image ? $this->image->path : '';
    }

    /**
     * Scopes
     */
    public function scopeSliders($query) {
        return $query->whereType(self::TYP_SLIDER);
    }

    public function scopeMenus($query) {
        return $query->whereType(self::TYP_MENU);
    }

    /**
     * Other functions
     */
    public function delete() {
        $this->image()->delete();
        parent::delete();
    }

    public static function getSiteConfigValue($key) {
        $conf = Setting::where('type', self::TYP_CONFIG)->where('meta->label', $key);
        if ($conf->count() > 0) return $conf->first()->config_value;
        return null;
    }

    public static function setSiteConfigValue($key, $value) {
        $conf = Setting::firstOrNew(['meta->label' => $key, 'type' => self::TYP_CONFIG]);
        $conf->type = self::TYP_CONFIG;
        $conf->label = $key;
        $conf->config_value = $value;
        $conf->save();
    }

}
