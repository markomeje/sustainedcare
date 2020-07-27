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

	public function search($page = "") {
		$query = $this->get('query');
		if (empty($query) || $query === "") {
			exit(View::render("pages/404", "errors", ["title" => "Page Not Found"]));
		}else {
			$applicants = $this->applicants->search($page, $query);
			View::render("applicants/search", "backend", ["controller" => $this->controller, "links" => $this->links, "applicants" => $applicants["search"], "pagination" => $applicants["pagination"], "nigerianStates" => Help::getNigerianStates(), "relationshipStatus" => Help::getRelationshipStatus(), "genders" => Help::getGenders()]);
		}
	}

	public function delete($id = "") {
		if ($this->isAjaxRequest()) {
			$response = $this->applicants->delete($id);
			$this->jsonEncode($response);
		}
	}

}