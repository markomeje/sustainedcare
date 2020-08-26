<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help, Authenticate};
use Application\Models\{Profile, Payments, Referrals, Applicants, Earnings, Banks};
use Application\Library\{Session};


class ProfileController extends Controller {

	public function __construct() {
		parent::__construct();
		Authenticate::logger("applicant");
	}

	public function index() {
		$id = Session::get("id");
		$referrals = $this->referrals->getAllByReferrer($id);
		$earnings = $this->earnings->getTotalReferrerEarnings($id);
		$withdrawals = $this->earnings->getTotalReferrerWithdrawals($id);
		$balance = ($earnings - $withdrawals);
		View::render("profile/index", "backend", ["title" => "Profile Page", "verify" => $this->payments->verifyPaystack($this->get("reference")), "payments" => $this->payments->getById($id), "applicant" => $this->applicants->getByLogin($id), "referrals" => $referrals, "earnings" => $earnings, "withdrawals" => $withdrawals, "balance" => $balance, "cashrequest" => $this->withdrawals->getUnpaidWithdrawal($id), "nigerianBanks" => Help::nigerianBanks(), "slip" => $this->slips->getById($id), "bank_details" => $this->banks->getDetailsById($id)]);
	}
}