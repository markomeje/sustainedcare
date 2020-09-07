<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Authenticate};

class DonationsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {}

	public function donate() {
		if ($this->isAjaxRequest()) {
			$response = $this->donations->donate();
			$this->jsonEncode($response);
		}
	}

	public function stripe() {
		$response = $this->donations->stripe();
		$this->jsonEncode($response);
	}

}