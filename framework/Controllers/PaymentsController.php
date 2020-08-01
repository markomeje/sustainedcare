<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\Payments;

class PaymentsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("payments/index", "backend", ["title" => "Payments Page"]);
	}

	public function paystack() {
		if ($this->isAjaxRequest()) {
			$response = $this->payments->paystack();
			$this->jsonEncode($response);
		}
	}

	// public function success() {
	// 	View::render("payments/index", "backend", ["title" => "Payments Page"]);
	// }

}