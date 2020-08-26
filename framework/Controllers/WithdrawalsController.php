<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Authenticate};


class WithdrawalsController extends Controller {

	public function __construct() {
		parent::__construct();
		Authenticate::logger("admin");
	}

	public function index($pageNumber = "") {
		$withdrawals = $this->withdrawals->getAllWithdrawalsWithPagination($pageNumber);
		View::render("withdrawals/index", "backend", ["links" => $this->links, "controller" => $this->controller, "countWithdrawals" => count($this->withdrawals->getAllWithdrawals()), "withdrawals" => $withdrawals["withdrawals"], "pagination" => $withdrawals["pagination"]]);
	}

	public function requestCash() {
		if ($this->isAjaxRequest()) {
			$response = $this->withdrawals->requestCash();
			$this->jsonEncode($response);
		}
	}

	public function approveCash($applicant) {
		if ($this->isAjaxRequest()) {
			$response = $this->withdrawals->approveCash($applicant);
			$this->jsonEncode($response);
		}
	}

}