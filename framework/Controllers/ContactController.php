<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};

class ContactController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$countries = Help::getAllCountries();
		View::render("contact/index", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World.", "countries" => $countries]);
	}

	public function emailContact() {
		if ($this->isAjaxRequest()) {
			$response = $this->contact->emailContact();
			$this->jsonEncode($response);
		}
	}

}