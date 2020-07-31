<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Application\Library\{Session, Cookie};

class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("login/index", "frontend", ["title" => "Login Page"]);
	}

	public function login() {
		if ($this->isAjaxRequest()) {
			$response = $this->login->login();
			$this->jsonEncode($response);
		}
	}

	public function logout() {
		if ($this->isAjaxRequest()) {
			$response = $this->login->logout();
			$this->jsonEncode($response);
		}
	}

}