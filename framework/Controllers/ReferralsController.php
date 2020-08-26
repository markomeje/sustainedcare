<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};


class ReferralsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {}

	public function add() {
		if ($this->isAjaxRequest()) {
			$response = $this->referrals->add();
			$this->jsonEncode($response);
		}
	}

}