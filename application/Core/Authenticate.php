<?php

namespace Application\Core;
use Application\Library\{Session};
use Application\Core\View;


class Authenticate {

    public function __construct() {}

    public static function logged() {
        if (Session::get("isLoggedIn") !== true) {
            exit(View::render("pages/500", "errors", ["title" => "Access Denied"]));
        }
    }

    public static function logger($role) {
        if (Session::get("role") !== $role && Session::get("isLoggedIn") !== true) {
            exit(View::render("pages/500", "errors", ["title" => "Access Denied"]));
        }
    }
    
}
