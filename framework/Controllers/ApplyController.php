<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help, Applicants};


class ApplyController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($code = "") {
		View::render("apply/index", "frontend", ["title" => "Apply for Grant", "controller" => $this->controller, "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders(), "code" => $code, "grantAmounts" => Help::getGrantAmounts()]);
	}

	public function success() {
		View::render("apply/success", "frontend", ["title" => "Application successfull", "controller" => $this->controller]);
	}

}