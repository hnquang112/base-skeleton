<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 07/21/2016
 * Time: 10:18 PM
 */

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\Model;

class File extends Model {
    use SoftDeletes, Json;

    protected $dates = ['deleted_at'];
    protected $fillable = ['path', 'description'];
    protected $jsonColumns = ['meta'];

    /**
     * Validations
     */
    public static $rulesForCreating = [
        'path' => 'required|max:255',
        'description' => 'max:255'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
             "description":null
        }');
    }

}