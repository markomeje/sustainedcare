<?php

namespace Framework\Models;
use Application\Core\{Model, Gateways};
use Application\Library\{Session, Generate};
use Application\Components\Query;
use Application\Exceptions\Logger;
use Framework\Models\{Referrals, Earnings};



class Payments extends Model {

	private $table = "payments";

	public function __construct() {
		parent::__construct();
	}

	public function paystackPayment(): array {
		if (empty($this->applicant) || !$this->applicant) {
			return ["status" => "invalid-applicant"];
		}elseif (empty($this->type) || !$this->type) {
			return ["status" => "invalid-type"];
		}elseif (empty($this->amount) || !$this->amount) {
			return ["status" => "invalid-amount"];
		}

	    try{
	    	$reference = Generate::hash();
	    	$gateway = new Gateways;
	    	$transaction = $gateway->paystack()->transaction->initialize(["amount" => $this->amount * 100, "email" => Session::get("email"), "reference" => $reference]);
	    	$id = Session::get("id");
	    	$fields = ["reference" => $transaction->data->reference, "type" => $this->type, "status" => "initialized", "amount" => $this->amount];
	    	if (empty($this->getById($id))) {
	    		$merged = array_merge($fields, ["applicant" => $id]);
	            $this->addPayments($merged);
	            return ["status" => "success", "redirect" => $transaction->data->authorization_url];
	    	}else {
	    		$this->update($fields, $id);
	    		return ["status" => "success", "redirect" => $transaction->data->authorization_url];
	    	}
	    } catch(\Exception $error){
	        Logger::log("PAYSTACK PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
	    }
	}

	public function verifyPaystack($reference) {
		try {
		    if(!$reference) return;
		    $gateway = new Gateways;
		    $transaction = $gateway->paystack()->transaction->verify(["reference" => $reference]);
		    if ("success" === $transaction->data->status) {
		    	$fields = ["status" => "paid"];
		    	$id = Session::get("id");
		    	$condition = ["reference" => $reference, "applicant" => $id];
		    	$applicant = $this->referrals->isApplicantReferred($id);
			    if (!empty($applicant)) $this->earnings->addEarning($applicant);
		        return ($this->update($fields, $id) > 0) ? header("Location:" .DOMAIN."/profile") : false;
		    }else {return false;}
		} catch (\Exception $error) {
			Logger::log("PAYSTACK PAYMENT VERIFICATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public function addPayments(array $fields) {
		try {
			$result = Query::create($this->table, $fields);
			return $result["rowCount"] > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (\Exception $error) {
        	Logger::log("ADDING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function update(array $fields, int $id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::update($this->table, $fields, $condition, 1);
			return $result["rowCount"] > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (\Exception $error) {
        	Logger::log("UPDATING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAllPaymentsWithPagination($pageNumber = ""): array {
		try {
			$pagination = Pagination::paginate($this->table, "", "", $pageNumber);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$fields = ["{$this->table}.*", "applicants.firstname", "applicants.surname"];
			$condition = ["{$this->table}.applicant" => "applicants.login"];
			$result = Query::read($fields, $this->table, ", applicants", $condition, "", "date DESC", $limit, $offset);
			return ["payments" => $result["fetchAll"], "pagination" => $pagination];
		} catch (\Exception $error) {
			Logger::log("GETTING ALL PAYMENTS WITH PAGINATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
		}
	}

	public function getById(int $id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING PAYERS PAYEMNT DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAllPaymentsCount() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "", "", "");
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("GETING ALL PAYEMNTS COUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getOfflinePaymentsCount(): int {
		try {
			$condition = ["type" => "offline"];
			$result = Query::read(["type"], $this->table, "", $condition, "", "", "", "");
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("GETING OFFLINE PAYEMNT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getOnlinePaymentsCount(): int {
		try {
			$condition = ["type" => "paystack"];
			$result = Query::read(["type"], $this->table, "", $condition, "", "", "", "");
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("GETING ONLINE PAYEMNT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getTotalPayments() {
		try {
			$total = [];
			$result = Query::read(["amount"], $this->table, "", "", "", "", "", "");
			foreach ($result["fetchAll"] as $key => $value) {
				$total[] = $value->amount;
			}
			return array_sum($total);
        } catch (\Exception $error) {
        	Logger::log("GETING TOTAL PAYEMNTS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

}