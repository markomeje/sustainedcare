<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("home/index", "frontend", ["title" => "Home Page"]);
	}

}