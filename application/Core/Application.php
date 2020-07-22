<?php

namespace Application\Core;

class Application {


    public function __construct() {
        $this->unregisterGlobals();
    }

    public function redirect($location) {
        if (!headers_sent()) {
            header("Location: ".DOMAIN.$location);
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

    public function IpAddress(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = null;
        }
        return $ip;
    }

    public function userAgent(){
        $agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : null;
        $expression = '/\/[a-zA-Z0-9.]+/';
        return preg_replace($expression, '', $agent);
    }

    public function __get($name) {
        return $this->model($name);
    }

    public function model($model){
        $modelName = "Framework\Models\\".ucwords($model);
        return $this->{$model} = new $modelName;
    }


    private function unregisterGlobals() {
        if(ini_get('register_globals')) {
            $globals = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach($globals as $global) {
                foreach($GLOBALS[$global] as $key => $value) {
                    if($GLOBALS[$key] === $value) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }


}
