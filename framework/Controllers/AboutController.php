<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class AboutController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("about/index", "frontend", ["title" => "We are basically in the Mission to encourage early childhood education and also to assist in the gradual eradication of poverty in the World as a vision, but commencing from Africa in Nigeria with our various empowerment schemes and initiatives."]);
	}

}