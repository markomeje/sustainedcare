<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Authenticate};
use Framework\Models\Slips;


class SlipsController extends Controller {

	public function __construct() {
		parent::__construct();
		Authenticate::logger("admin");
	}

	public function index($pageNumber = "") {
		$count = count($this->slips->getAll());
		$slips = $this->slips->getAllWithPagination($pageNumber);
		View::render("slips/index", "backend", ["links" => $this->links, "controller" => $this->controller, "slips" => $slips["slips"], "pagination" => $slips["pagination"], "count" => $count]);
	}

	public function addSlip() {
		if ($this->isAjaxRequest()) {
			$response = $this->slips->addSlip();
			$this->jsonEncode($response);
		}
	}

	public function verifySlip($id) {
		if ($this->isAjaxRequest()) {
			$response = $this->slips->verifySlip($id);
			$this->jsonEncode($response);
		}
	}

	public function search($pageNumber = "") {
		$query = $this->get('query');
		if (empty($query) || $query === "") {
			$this->redirect("/slips");
		}else {
			$slips = $this->slips->searchSlips($pageNumber, $query);
			View::render("slips/search", "backend", ["controller" => $this->controller, "links" => $this->links, "slips" => $slips["search"], "pagination" => $slips["pagination"]]);
		}
	}

}