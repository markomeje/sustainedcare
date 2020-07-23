<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};


class TermsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($referrer = "") {
		View::render("terms/index", "frontend", ["title" => "Our Terms and Conditions", "controller" => $this->controller]);
	}

}