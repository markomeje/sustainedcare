<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};

class DonateController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("donate/index", "frontend", ["title" => "Donate Page"]);
	}

	public function crypto() {
		$countries = Help::getAllCountries();
		$crypto = Help::getCryptoCurrencies();
		$dollarAmounts = Help::getDollarAmounts();
		View::render("donate/crypto", "frontend", ["title" => "Cryptocurrency Donation", "countries" => $countries, "crypto" => $crypto, "dollarAmounts" => $dollarAmounts, "type" => "crypto"]);
	}

	public function paypal($status = "") {
		View::render("donate/paypal", "frontend", ["title" => "Paypal Donation", "type" => "paypal", "status" => $status]);
	}

	public function paystack() {
		$countries = Help::getAllCountries();
		$nairaAmounts = Help::getNairaAmounts();
		View::render("donate/paystack", "frontend", ["title" => "Paystack Donation", "countries" => $countries, "nairaAmounts" => $nairaAmounts, "nairaSymbol" => "NGN", "type" => "paystack"]);
	}

	public function stripe($status = "") {
		$countries = Help::getAllCountries();
		$dollarAmounts = Help::getDollarAmounts();
		View::render("donate/stripe", "frontend", ["title" => "Stripe Donation", "type" => "stripe", "dollarAmounts" => $dollarAmounts, "countries" => $countries, "status" => $status]);
	}

}