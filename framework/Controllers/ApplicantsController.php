<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help};
use Framework\Models\{Applicants};


class ApplicantsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = "") {
		$applicants = $this->applicants->getAllWithPagination($pageNumber);
		$applicantsCount = $this->applicants->getCount();
		View::render("applicants/index", "backend", ["controller" => $this->controller, "links" => $this->links, "applicants" => $applicants["applicants"], "pagination" => $applicants["pagination"], "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders(), "applicantsCount" => $applicantsCount]);
	}

	public function apply() {
		if ($this->isAjaxRequest()) {
			$response = $this->applicants->apply();
			$this->jsonEncode($response);
		}
	}

	public function edit($id = "") {
		if ($this->isAjaxRequest()) {
			$response = $this->applicants->edit($id);
			$this->jsonEncode($response);
		}
	}

}