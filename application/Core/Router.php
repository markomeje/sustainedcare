<?php

namespace Application\Core;
use Application\Core\View;


class Router {


	public function __construct() {}

    /**
     method that routes the url
     * @param  [array] $url [contains an array of current url in the browser]
     * @return [object]      [an instance ocontroller being called]
     */
	public function route($url) {
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
