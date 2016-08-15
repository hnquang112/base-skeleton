<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;
use DB;

class Setting extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['type', 'label', 'description', 'value'];
    protected $jsonColumns = ['meta'];

    const TYP_SLIDER = 0;
    const TYP_MENU = 1;
    const TYP_SITE = 2;

    public static $languages = [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
    ];

    public static $siteConfigLabels = [
        'front_page_language',
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
            "image_id":null,
            "menu_item":null,
            "menu_url":null,
            "value":null
        }');
    }

    /**
     * Relationships
     */
    public function image() {
        return $this->hasOne('App\File', 'id', "meta->>'image_id'");
    }

    /**
     * Accessors
     */
    public function getImagePathAttribute() {
        return $this->image ? $this->image->path : '';
    }

    /**
     * Mutators
     */
    public function setImageIdAttribute($value) {
        if (!empty($value)) {
            $this->attributes['image_id'] = create_file_from_path($value);
        }
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
        return self::where('type', self::TYP_SITE)->where("meta->'label'", $key)->pluck(DB::raw("meta->'value'"));
    }
}
