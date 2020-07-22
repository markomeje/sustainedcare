<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{Applicants};


class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$applicantsCount = $this->applicants->getCount();
		View::render("dashboard/index", "backend", ["controller" => $this->controller, "links" => $this->links, "applicantsCount" => $applicantsCount]);
	}
}