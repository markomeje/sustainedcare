<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Application\Library\{Cookie};

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($code = "") {
		if ($code !== "") Cookie::set("applicant_referral_code", $code, time() + REFERRAL_LINK_CODE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
		View::render("home/index", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World."]);
	}

}