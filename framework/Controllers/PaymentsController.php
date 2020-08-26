<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Authenticate};
use Framework\Models\Payments;

class PaymentsController extends Controller {

	public function __construct() {
		parent::__construct();
		Authenticate::logger("admin");
	}

	public function index($pageNumber = "") {
		$payments = $this->payments->getAllPaymentsWithPagination($pageNumber);
		View::render("payments/index", "backend", ["title" => "Payments Page", "links" => $this->links, "controller" => $this->controller, "payments" => $payments["payments"], "pagination" => $payments["pagination"], "count" => $this->payments->getAllPaymentsCount()]);
	}

	public function paystackPayment() {
		if ($this->isAjaxRequest()) {
			$response = $this->payments->paystackPayment();
			$this->jsonEncode($response);
		}
	}

	public function webhook() {
		$reference = $this->get("reference");
		$this->payments->verify($reference);
	}

}