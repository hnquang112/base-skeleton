<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/21/2016
 * Time: 10:18 PM
 */

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class File extends Model implements StaplerableInterface {
    use SoftDeletes, EloquentTrait;

    protected $dates = ['deleted_at'];
    protected $fillable = ['file'];

    const TYP_EXTERNAL = 0;
    const TYP_INTERNAL = 1;

    public function __construct() {
        parent::__construct();
        $this->hasAttachedFile('file', [
            'styles' => config('laravel-stapler.stapler.styles'),
            'url' => config('laravel-stapler.filesystem.url'),
            'path' => config('laravel-stapler.filesystem.path'),
        ]);
    }

    public function getPathAttribute() {
        return $this->file->url('medium');
    }

}
