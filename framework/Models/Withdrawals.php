<?php

namespace Framework\Models;
use Application\Core\{Model};
use Application\Components\Query;
use Application\Exceptions\Logger;
use Application\Library\Database;
use Framework\Models\Pagination;
use \Exception;


class Withdrawals extends Model {

	private $table = "withdrawals";

	public function __construct() {
		parent::__construct();
	}

	public function requestCash(): array {
		if(empty($this->applicant) || !$this->applicant) { 
			return ["status" => "error"];
		}elseif(empty($this->amount) || !$this->amount) { 
			return ["status" => "invalid-amount"];
		}elseif(empty($this->priority) || !$this->priority) { 
			return ["status" => "invalid-priority"];
		}elseif(!empty($this->getUnpaidWithdrawal($this->applicant))) {
			return ["status" => "invalid-request"];
		}

		try {
			$database = Database::connect();
			$database->beginTransaction();
			$fields = ["applicant" => $this->applicant, "amount" => $this->amount, "priority" => $this->priority, "status" => "unpaid"];
			$result = Query::create($this->table, $fields);
			$database->commit();
			return ($result["rowCount"] > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	$database->rollback();
        	Logger::log("ADDING WITHDRAWAL CASH REQUEST ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getAllWithdrawals() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "date DESC", "", "");
			return $result["fetchAll"];
        } catch (Exception $error) {
        	Logger::log("GETTING ALL WITHDRAWALS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getWithdrawalsRequestAmount(int $applicant): object {
		try {
			$condition = ["applicant" => $applicant];
			$result = Query::read(["amount"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"][0];
        } catch (Exception $error) {
        	Logger::log("GETTING WITHDRAWALS REQUEST AMOUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getAllWithdrawalsWithPagination($pageNumber = "") {
		try {
			$pagination = Pagination::paginate($this->table, "", "", $pageNumber);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$fields = ["{$this->table}.*", "applicants.firstname", "applicants.surname", "applicants.phone"];
			$condition = ["{$this->table}.applicant" => "applicants.login"];
			$result = Query::read($fields, $this->table, ", applicants", $condition, "", "date DESC", $limit, $offset);
			return ["withdrawals" => $result["fetchAll"], "pagination" => $pagination];
		} catch (\Exception $error) {
			Logger::log("GETTING ALL WITHDRAWALS WITH PAGINATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public function approveCash(int $applicant): array {
		try {
            $fields = ["status" => "paid"];
            $condition = ["applicant" => $applicant];
			$result = Query::update($this->table, $fields, $condition, 1);
			if($result["rowCount"] > 0) {
				$request = $this->getWithdrawalsRequestAmount($applicant);
				$result = $this->earnings->updateEarningAsWithdrawn($applicant, $request->amount);
				return ($result > 0) ? ["status" => "success"] : ["status" => "error"];
			}else {
				return ["status" => "error"];
			}
        } catch (Exception $error) {
        	Logger::log("APPROVE CASH ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getUnpaidWithdrawal(int $applicant): array {
		try {
			$fields = ["applicant", "status"];
			$condition = ["applicant" => $applicant, "status" => "unpaid"];
			$result = Query::read($fields, $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"];
        } catch (Exception $error) {
        	Logger::log("GETTING APPLICANT CASH REQUEST ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getTotalWithdrawalsPaid(): int {
		try {
			$total = [];
			$fields = ["amount", "status"];
			$condition = ["status" => "paid"];
			$result = Query::read($fields, $this->table, "", $condition, "", "", "", "");
			foreach ($result["fetchAll"] as $key => $value) {
				$total[] = $value->amount;
			}
			return array_sum($total);
        } catch (Exception $error) {
        	Logger::log("GETTING APPLICANT CASH REQUEST ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

}