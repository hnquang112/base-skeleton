<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;

class Setting extends Model {
  use SoftDeletes, Json;

  protected $dates = ['deleted_at'];
  protected $fillable = ['type', 'label', 'description'];
  protected $jsonColumns = ['meta'];

  const TYP_SLIDER = 0;

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
      "description":null
    }');
  }

  public function image() {
    return $this->hasOne('App\File', 'id', 'image_id');
  }

  public function getImagePathAttribute() {
    return $this->image ? $this->image->path : '';
  }

  public function setImageIdAttribute($value) {
    if (!empty($value)) {
      $this->attributes['image_id'] = create_file_from_path($value);
    }
  }

  public function scopeSliders($query) {
    return $query->whereType(self::TYP_SLIDER);
  }

  public function delete() {
    $this->image()->delete();
    parent::delete();
  }
}
