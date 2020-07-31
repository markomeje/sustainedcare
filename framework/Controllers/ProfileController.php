<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Application\Models\{Profile, Payments};
use Application\Library\{Session};
use Application\Exceptions\{Logger};


class ProfileController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$id = Session::get("id");
		$profile = $this->profile->getProfile();
		View::render("profile/index", "backend", ["title" => "Profile Page", "controller" => $this->controller, "links" => $this->links, "profile" => $profile, "id" => $id]);
	}
}