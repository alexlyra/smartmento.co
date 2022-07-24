<?php

namespace App\Services\UserService;

use Illuminate\Support\Facades\Facade;

class UserManagerFacade extends Facade {
    protected static function getFacadeAccessor () {
        return 'UserManager';
    }
}

?>