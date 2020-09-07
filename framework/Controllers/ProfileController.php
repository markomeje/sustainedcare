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
		$pdfs = ["pdf1.pdf" => "GSM recharge card printing manual for making passive income", "pdf2.pdf" => "Passive income. 30 Strategies and ideas to start an online business and acquiring financial freedom.", "pdf3.pdf" => "597 Business ideas you need to know in 2020", "pdf4.pdf" => "201 Great ideas for your small business", "pdf5.pdf" => "85 inspiring strategies to markt your business."];
		$id = Session::get("id");
		$referrals = $this->referrals->getAllByReferrer($id);
		$earnings = $this->earnings->getTotalReferrerEarnings($id);
		$withdrawals = $this->earnings->getTotalReferrerWithdrawals($id);
		$balance = ($earnings - $withdrawals);
		View::render("profile/index", "backend", ["title" => "Profile Page", "verify" => $this->payments->verifyPaystack($this->get("reference")), "payments" => $this->payments->getById($id), "applicant" => $this->applicants->getByLogin($id), "referrals" => $referrals, "earnings" => $earnings, "withdrawals" => $withdrawals, "balance" => $balance, "cashrequest" => $this->withdrawals->getUnpaidWithdrawal($id), "nigerianBanks" => Help::nigerianBanks(), "slip" => $this->slips->getById($id), "bank_details" => $this->banks->getDetailsById($id), "withdrawableAmount" => $this->earnings->getTotalWithdrawableAmount($id), "pdfs" => $pdfs]);
	}

	public function download($pdf = "") {
		$pdfFile = PUBLIC_PATH . DS . "pdfs" . DS . $pdf;
		$downloadRate = 20.5;
		if(file_exists($pdfFile) && is_file($pdfFile)){
			header('Cache-control: private');
			header('Content-Type: application/octet-stream');
			header('Content-Length: '.filesize($pdfFile));
			header('Content-Disposition: filename='.$download_file);
			flush();
			$file = fopen($pdfFile, "r");
			while(!feof($file)){
			    print fread($file, round($downloadRate * 1024));
			    flush();
			    sleep(1);
			}
			fclose($file);
		}else {
		   die('Error: The file '.$pdfFile.' does not exist!');
		}
	}
}