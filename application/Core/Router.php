<?php

namespace Application\Core;
use Application\Core\View;


class Router {


	public function __construct() {}

    public static function redirect($location) {
        if (!headers_sent()) {
            header('Location: '.DOMAIN.$location);
        }else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.DOMAIN.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
            echo '</noscript>';
            exit;
        }
    }

	public static function route($url) {
        $controller = (isset($url[0]) && $url[0] !== "") ? ucwords($url[0])."Controller" : "HomeController";
        $controller = "Framework\Controllers\\".$controller;
        array_shift($url);

        $method = (isset($url[0]) && $url[0] !== "") ? $url[0] : "index";
        array_shift($url);
        $arguments = empty($url) ? [] : array_values($url);
        if (class_exists($controller)) {
            $controller = new $controller;
            if(method_exists($controller, $method)) {
                if (empty($arguments)) {
                    $controller->{$method}();
                }else {
                    call_user_func_array([$controller, $method], $arguments);
                }
            } else {
                exit(View::render("pages/404", "errors", ["title" => "Page Not Found"]));
            }
        }else {
            exit(View::render("pages/404", "errors", ["title" => "Page Not Found"]));
        } 
    }
}
