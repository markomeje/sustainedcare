<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class AboutController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("about/index", "frontend", ["title" => "About Us Page"]);
	}

}