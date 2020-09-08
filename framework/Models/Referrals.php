<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Components\Query;
use Application\Exceptions\Logger;
use \Exception;


class Referrals extends Model {

	private $table = "referrals";

	public function __construct() {
		parent::__construct();
	}

	public function addReferral(array $fields): array {
		try {
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (Exception $error) {
        	Logger::log("ADDING REFERRER DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function isApplicantReferred($id) {
		try {
			$condition = ["applicant" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING APPLICANT AS REFERRED ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getById(int $id) {
		try {
			$condition = ["referrer" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING REFERRAL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAllByReferrer(int $referrer): array {
		try {
			$fields = ["{$this->table}.applicant", "{$this->table}.date", "applicants.firstname", "applicants.surname", "applicants.phone"];
			$condition = ["referrer" => $referrer, "applicants.login" => "{$this->table}.applicant"];
			$result = Query::read($fields, $this->table, ", applicants", $condition, "", "date DESC", "", "");
			return $result["fetchAll"];
        } catch (Exception $error) {
        	Logger::log("GETTING REFERRER DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

}