<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    protected $table = 'users';

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)->whereType(self::ADMIN);
    }
}
