<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class GalleryController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("gallery/index", "frontend", ["title" => "Our Gallery"]);
	}

}