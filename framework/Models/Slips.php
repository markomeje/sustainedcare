<?php

namespace Framework\Models;
use Application\Core\{Model, Gateways};
use Application\Library\{Session, Generate, Database};
use Application\Components\Query;
use Application\Exceptions\Logger;
use Framework\Models\{Payments, Referrals, Earnings};
use \Exception;



class Slips extends Model {

	private $table = "slips";

	public function __construct() {
		parent::__construct();
	}

	public function addSlip(): array {
		if (empty($this->bankname) || !$this->bankname) {
			return ["status" => "invalid-bankname"];
		}elseif (empty($this->accountname) || !$this->accountname) {
			return ["status" => "invalid-accountname"];
		}elseif (empty($this->accountnumber) || !$this->accountnumber) {
			return ["status" => "invalid-accountnumber"];
		}elseif (empty($this->paymentdate) || !$this->paymentdate) {
			return ["status" => "invalid-paymentdate"];
		}elseif (empty($this->branch) || !$this->branch) {
			return ["status" => "invalid-branch"];
		}elseif (empty($this->amount) || !$this->amount) {
			return ["status" => "invalid-amount"];
		}

		try {
			$fields = ["bankname" => $this->bankname, "accountname" => $this->accountname, "accountnumber" => $this->accountnumber, "paymentdate" => $this->paymentdate, "applicant" => $this->applicant, "status" => "pending", "amount" => $this->amount, "branch" => $this->branch, "code" => Generate::numbers()];
			$result = Query::create($this->table, $fields);
			return ($result["rowCount"] > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING PAYMENT SLIP ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAll() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "", "", "");
			return $result["fetchAll"];
        } catch (Exception $error) {
        	Logger::log("GETING ALL SLIPS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getAllWithPagination($pageNumber = "") {
		try {
			$pagination = Pagination::paginate($this->table, "", "", $pageNumber);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$result = Query::read(["*"], $this->table, "", "", "", "date DESC", $limit, $offset);
			return ["slips" => $result["fetchAll"], "pagination" => $pagination];
		} catch (Exception $error) {
			Logger::log("GETTING ALL SLIPS WITH PAGINATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public function verifySlip(int $id): array {
		try {
			$database = Database::connect();
			$database->beginTransaction();
			$slip = $this->getById($id);
			if (!empty($slip) && $slip->status === "verified") return ["status" => "verified"];
			$this->updateSlipStatus("verified", $id);
			$applicant = $this->referrals->isApplicantReferred($id);
			if (!empty($applicant)) $this->earnings->addEarning($applicant);
			$fields = ["type" => "offline", "reference" => Generate::hash(), "status" => "paid", "amount" => $slip->amount];
	    	if (empty($this->payments->getById($id))) {
	    		$merged = array_merge($fields, ["applicant" => $id]);
	    		$this->payments->addPayments($merged);
	            $database->commit();
			    return ["status" => "success"];
	    	}else {
	    		$this->payments->update($fields, $id);
	    		$database->commit();
			    return ["status" => "success"];
	    	}
		} catch (Exception $error) {
			$database->rollback();
			Logger::log("VERYING APPLICANT PAYMENT SLIP ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
		}
			
	}

	public function updateSlipStatus(string $status, int $id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::update($this->table, ["status" => $status], $condition, 1);
			return $result["rowCount"];
        } catch (Exception $error) {
        	Logger::log("UPDATING SLIP STATUS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getById(int $id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"][0];
        } catch (Exception $error) {
        	Logger::log("GETING PAYEMNT SLIP ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getUnVerifiedSlip() {
		try {
			$condition = ["status" => "pending"];
			$result = Query::read(["status"], $this->table, "", $condition, "", "", "", "");
			return $result["rowCount"];
        } catch (Exception $error) {
        	Logger::log("GETING PENDING SLIP ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function searchSlips($pageNumber = "", $query) {
		try{
			$query = $this->escape($query);
	        $pagination = Pagination::paginate($this->table, "", "", $pageNumber);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$search = ["code" => $query, "bankname" => $query, "accountname" => $query, "accountnumber" => $query];
			$result = Query::search(["*"], $this->table, "", $search, "", "", "date DESC", $limit, $offset);
			return ["search" => $result["fetchAll"], "pagination" => $pagination];
		} catch (\Exception $error) {
			Logger::log("GETTING SLIPS SEARCH RESULT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

}