<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent\Dialect\Json;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Gravatar;

class User extends Authenticatable {
    use Json, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'display_name', 'username', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'object',
        'is_active' => 'boolean',
    ];

    protected $jsonColumns = ['meta'];

    const MASTER = 0;
    const ADMIN = 1;
    const EDITOR = 2;
    const USER = 3;

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;

    const STT_INACTIVE = 0;
    const STT_ACTIVE = 1;

    public static $roleNames = [
        self::MASTER => 'Web Master',
        self::ADMIN => 'Administrator',
        self::EDITOR => 'Content Editor',
        self::USER => 'User'
    ];

    public static $rulesForCreating = [
        'display_name' => 'required|max:255',
        'email' => 'email|required|max:255|unique:users,email',
        'username' => 'required|alpha_dash|max:255',
        'password' => 'required|confirmed'
    ];

    public static $rulesForUpdating = [
        'display_name' => 'required|max:255',
        'password' => 'confirmed'
    ];

    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
            "display_name":null,
			"profile_image":null,
			"birthday":null,
			"phone":null,
			"address":null,
			"gender":null
		}');
    }

    /**
     * Relationships
     */
    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function profiles() {
        return $this->hasMany('App\Profile');
    }

    /**
     * Accessors
     */
    public function getRoleNameAttribute() {
        return self::$roleNames[$this->type];
    }

    public function getAvatarImageAttribute() {
        if (!empty($this->profile_image)) return asset($this->profile_image);
        if (!empty($this->email)) return Gravatar::get($this->email);
        return null;
    }

    /**
     * Mutators
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Scopes
     */
    public function scopeFilterNotMaster($query) {
        return $query->where('type', '<>', self::MASTER);
    }

    /**
     * Helpers
     */
    public static function getRolesByAuthUser() {
        $roles = self::$roleNames;
        unset($roles[self::MASTER]);

        if (auth()->check() && auth()->user()->type == self::ADMIN) {
            unset($roles[self::ADMIN]);
        }

        return $roles;
    }

    public static function extendRulesForUpdating($rules = []) {
        return array_merge(self::$rulesForUpdating, $rules);
    }

}
