<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help, Applicants};


class ApplyController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($code = "") {
		View::render("apply/index", "frontend", ["title" => "Get registered today with Sustained Care Foundation and Access our Free On-going GRANTS for Existing and New Businesses up to a tune of NGN200,000 Only.", "controller" => $this->controller, "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders(), "code" => $code, "grantAmounts" => Help::getGrantAmounts()]);
	}

	public function success() {
		View::render("apply/success", "frontend", ["title" => "Application successfull", "controller" => $this->controller]);
	}

}