<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};

class DonateController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("donate/index", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World. Donate Page"]);
	}

	public function crypto() {
		$countries = Help::getAllCountries();
		$crypto = Help::getCryptoCurrencies();
		$dollarAmounts = Help::getDollarAmounts();
		View::render("donate/crypto", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World. Cryptocurrency Donation", "countries" => $countries, "crypto" => $crypto, "dollarAmounts" => $dollarAmounts, "type" => "crypto"]);
	}

	public function paypal($status = "") {
		View::render("donate/paypal", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World. Paypal Donation", "type" => "paypal", "status" => $status]);
	}

	public function paystack() {
		$countries = Help::getAllCountries();
		$nairaAmounts = Help::getNairaAmounts();
		View::render("donate/paystack", "frontend", ["title" => "We are ensuring that NO CHILD is deprived of their EDUCATIONAL RIGHTS and also creating various initiatives in order to promote a Poverty-Free World. Paystack Donation", "countries" => $countries, "nairaAmounts" => $nairaAmounts, "nairaSymbol" => "NGN", "type" => "paystack"]);
	}

}