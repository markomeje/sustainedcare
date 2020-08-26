<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Components\Query;
use Application\Exceptions\Logger;
use \Exception;


class Earnings extends Model {

	private $table = "earnings";

	public function __construct() {
		parent::__construct();
	}

	public function addEarning(object $applicant): array {
		try {
			$earning = $this->percentageBonus * $this->applicationFee;
			$fields = ["referrer" => $applicant->referrer, "earning" => $earning, "withdrawn" => "no"];
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (Exception $error) {
        	Logger::log("ADDING REFERRER EARNING ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getTotalReferrerEarnings(int $referrer): int {
		try {
			$total = [];
			$condition = ["referrer" => $referrer];
			$result = Query::read(["earning"], $this->table, "", $condition, "", "", "", "");
			foreach ($result["fetchAll"] as $key => $value) {
				$total[] = $value->earning;
			}
			return array_sum($total);
        } catch (Exception $error) {
        	Logger::log("GETTING REFERRER TOTAL EARNINGS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getTotalReferrerWithdrawals(int $referrer): int {
		try {
			$withdrawals = [];
			$condition = ["referrer" => $referrer, "withdrawn" => "yes"];
			$result = Query::read(["earning"], $this->table, "", $condition, "", "", "", "");
			foreach ($result["fetchAll"] as $key => $value) {
				$withdrawals[] = $value->earning;
			}
			return array_sum($withdrawals);
        } catch (Exception $error) {
        	Logger::log("GETTING REFERRER TOTAL WITHDRAWALS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getTotalWithdrawableAmount(int $referrer): int {
		try {
			$withdrawals = [];
			$fields = ["withdrawn", "earning"];
			$condition = ["referrer" => $referrer, "withdrawn" => "no"];
			$result = Query::read($fields, $this->table, "", $condition, "", "", "", "");
			foreach ($result["fetchAll"] as $key => $value) {
				$withdrawals[] = $value->earning;
			}
			return array_sum($withdrawals);
        } catch (Exception $error) {
        	Logger::log("GETTING REFERRER TOTAL WITHDRAWALS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function updateEarningAsWithdrawn(int $applicant, $totalAmount): int {
		try {
			$earningFee = ($this->applicationFee * $this->percentageBonus);
			$eachAmount = round($totalAmount / $earningFee);
			$limit = (int)$eachAmount;
			$fields = ["withdrawn" => "yes"];
            $condition = ["referrer" => $applicant];
			$result = Query::update($this->table, $fields, $condition, $limit);
			return $result["rowCount"];
        } catch (Exception $error) {
        	Logger::log("UPDATING EARNING AS WITHDRAWN ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}


}