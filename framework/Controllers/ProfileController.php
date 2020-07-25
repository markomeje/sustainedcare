<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Application\Models\Applicants;
use Application\Library\{Session};


class ProfileController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($referrer = "") {
		$id = Session::get("id");
		$profile = $this->applicants->getProfile();
		View::render("profile/index", "backend", ["title" => "Profile Page", "controller" => $this->controller, "links" => $this->links, "profile" => $profile, "id" => $id]);
	}

}