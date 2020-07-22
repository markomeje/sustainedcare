<?php

namespace Application\Core;
use Application\Core\Application;
use Gregwar\Captcha\CaptchaBuilder;
use Application\Library\{Session, Cookie};


class Controller extends Application {

    public $links = ["dashboard", "referrer", "accounts", "applicants", "bills", "payments", "investigations", "expenses", "users"];
    public $controller;


    public function __construct() {
        parent::__construct();
        $this->controller = View::active($this->get("url"));
    }

    public function isAjaxRequest(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
            return strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        }
    }

    public function getCaptcha(){
        $captcha = new CaptchaBuilder;
        $captcha->build();
        Session::set('captcha', $captcha->getPhrase());
        return $captcha;
    }

    public function isPostRequest() {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    public function jsonEncode($response){
      	header("Access-Control-Allow-Origin: *");
      	header("Content-Type: applicaton/json; charset=UTF-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: -1");
      	http_response_code(200);
      	echo json_encode($response);
    }

    public function get($key){
        return isset($_GET[$key]) ? $_GET[$key]: [];
    }

    public function post($key){
        return isset($_POST[$key]) ? $_POST[$key]: [];
    }

    public function jsonDecode($response){
      	header("Access-Control-Allow-Origin: *");
      	header("Content-Type: applicaton/json; charset=UTF-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: -1");
      	http_response_code(200);
      	echo json_decode($response);
    }

    public function escape($input) {
        $input = trim(strip_tags($input));
        return htmlentities(stripslashes($input), ENT_QUOTES);
    }

}
