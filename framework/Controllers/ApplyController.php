<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help, Applicants};


class ApplyController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($referrer = "") {
		View::render("apply/index", "frontend", ["title" => "Apply for Grant", "controller" => $this->controller, "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders(), "grantAmounts" => $this->applicants->grantAmounts]);
	}

}