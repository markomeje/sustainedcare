<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};


class PasswordsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($code = "") {
		View::render("apply/index", "frontend", []);
	}

	public function update() {
		if ($this->isAjaxRequest()) {
			$response = $this->passwords->update();
			$this->jsonEncode($response);
		}
	}

}