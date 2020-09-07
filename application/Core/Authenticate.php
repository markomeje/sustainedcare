<?php

namespace Application\Core;
use Application\Library\{Session};
use Application\Core\{Router};


class Authenticate {

    public function __construct() {}

    public static function logged() {
        if (Session::get("isLoggedIn") !== true) {
            Router::redirect("/login");
        }
    }

    public static function logger($role) {
        if (Session::get("role") !== $role && Session::get("isLoggedIn") !== true) {
            Router::redirect("/login");
        }
    }
    
}
