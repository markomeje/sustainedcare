<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help, Applicants};


class ApplyController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($referrer = "") {
		View::render("apply/index", "frontend", ["title" => "Apply for grant", "controller" => $this->controller, "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders()]);
	}

	public function success() {
		View::render("apply/success", "frontend", ["title" => "Application successfull", "controller" => $this->controller]);
	}

}