<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Authenticate};
use Framework\Models\{Applicants, Donations, Withdrawals};
use Application\Library\Session;


class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
		Authenticate::logger("admin");
	}

	public function index() {
		$allWithdrawals = $this->withdrawals->getAllWithdrawals();
		$allDonators = $this->donations->getAllDonators();
		$applicantsCount = $this->applicants->getCount();
		View::render("dashboard/index", "backend", ["links" => $this->links, "controller" => $this->controller, "applicantsCount" => $applicantsCount, "role" => Session::get("role"), "allDonators" => $allDonators, "allWithdrawals" => $allWithdrawals, "totalPayments" => $this->payments->getTotalPayments(), "slips" => count($this->slips->getAll()), "totalPaidWithdrawals" => $this->withdrawals->getTotalWithdrawalsPaid(), "femaleApplicantsPercentage" => $this->applicants->calculateFemaleApplicantsPercentage(), "unVerifiedSlip" => $this->slips->getUnVerifiedSlip(), "offlinePaymentsCount" => $this->payments->getOfflinePaymentsCount(), "onlinePaymentsCount" => $this->payments->getOnlinePaymentsCount()]);
	}
}