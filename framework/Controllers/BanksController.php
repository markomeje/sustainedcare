<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};


class BanksController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {}

	public function addBank() {
		if ($this->isAjaxRequest()) {
			$response = $this->banks->addBank();
			$this->jsonEncode($response);
		}
	}

	public function editBank() {
		if ($this->isAjaxRequest()) {
			$response = $this->banks->editBank();
			$this->jsonEncode($response);
		}
	}

}