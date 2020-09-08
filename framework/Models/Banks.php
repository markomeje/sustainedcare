<?php

namespace Framework\Models;
use Application\Core\{Model, Gateways};
use Application\Components\Query;
use Application\Exceptions\Logger;
use \Exception;



class Banks extends Model {

	private $table = "banks";

	public function __construct() {
		parent::__construct();
	}

	public function addBank(): array {
		if (empty($this->bankname) || !$this->bankname) {
			return ["status" => "invalid-bankname"];
		}elseif (empty($this->accountname) || !$this->accountname) {
			return ["status" => "invalid-accountname"];
		}elseif (empty($this->accountnumber) || !$this->accountnumber) {
			return ["status" => "invalid-accountnumber"];
		}elseif (empty($this->accounttype) || !$this->accounttype) {
			return ["status" => "invalid-accounttype"];
		}elseif (empty($this->applicant) || !$this->applicant) {
			return ["status" => "invalid-applicant"];
		}

		try {
			$fields = ["bankname" => $this->bankname, "accountname" => $this->accountname, "accountnumber" => $this->accountnumber, "accounttype" => $this->accounttype, "applicant" => $this->applicant];
			$result = Query::create($this->table, $fields);
			return ($result["rowCount"] > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING BANK DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function editBank(): array {
		if (empty($this->bankname) || !$this->bankname) {
			return ["status" => "invalid-bankname"];
		}elseif (empty($this->accountname) || !$this->accountname) {
			return ["status" => "invalid-accountname"];
		}elseif (empty($this->accountnumber) || !$this->accountnumber) {
			return ["status" => "invalid-accountnumber"];
		}elseif (empty($this->accounttype) || !$this->accounttype) {
			return ["status" => "invalid-accounttype"];
		}elseif (empty($this->applicant) || !$this->applicant) {
			return ["status" => "invalid-applicant"];
		}

		try {
			$fields = ["bankname" => $this->bankname, "accountname" => $this->accountname, "accountnumber" => $this->accountnumber, "accounttype" => $this->accounttype];
			$condition = ["applicant" => $this->applicant];
			$result = Query::update($this->table, $fields, $condition, 1);
			return ($result["rowCount"] > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("EDITING BANK DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAll() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "", "", "");
			return $result["fetchAll"];
        } catch (Exception $error) {
        	Logger::log("GETING ALL BANK DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}
		
	public function getDetailsById(int $id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (Exception $error) {
        	Logger::log("GETING APPLICANT BANK DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

}