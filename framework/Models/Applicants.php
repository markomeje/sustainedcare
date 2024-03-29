<?php

namespace Framework\Models;
use Application\Core\{Model, Help};
use Application\Library\{Validate, Generate, Session, Database};
use Application\Components\{Query, Email};
use Application\Exceptions\Logger;
use Framework\Models\Pagination;


class Applicants extends Model {

	private $table = "applicants";

	public function __construct() {
		parent::__construct();
	}

	public function apply() {
		if (empty($this->surname) || !Validate::range($this->surname, 3, 55)) {
			return ["status" => "invalid-surname"];
		} elseif (empty($this->firstname) || !Validate::range($this->firstname, 3, 55)) {
			return ["status" => "invalid-firstname"];
		} elseif (empty($this->middlename) || !Validate::range($this->middlename, 3, 55)) {
			return ["status" => "invalid-middlename"];
		} elseif (empty($this->phone) || !Validate::length($this->phone, 11)) {
			return ['status' => "invalid-phone"];
		} elseif (empty($this->email) || !Validate::email($this->email)) {
			return ["status" => "invalid-email"];
		} elseif ($this->emailExists("login", $this->email) === true) {
			return ['status' => "email-exist"];
		} elseif(!empty($this->referrer) && empty($this->getByCode($this->referrer))){
			return ['status' => "invalid-code"];
		} elseif (empty($this->password) || !Validate::range($this->password, 6, 15)) {
			return ['status' => "invalid-password"];
		} elseif ($this->confirmpassword !== $this->password) {
			return ['status' => "invalid-confirmpassword"];
		} elseif(empty($this->birthdate) || !$this->birthdate){
			return ["status" => "invalid-birthdate"];
		} elseif(Help::getAge($this->birthdate) < 18 ||  Help::getAge($this->birthdate) > 55) {
			return ["status" => "invalid-age"];
		} elseif(empty($this->address) || !Validate::range($this->address, 5, 55)) {
			return ["status" => "invalid-address"];
		} elseif(empty($this->amount) || !$this->amount) {
			return ["status" => "invalid-amount"];
		} elseif(empty($this->state) || !$this->state) {
			return ["status" => "invalid-state"];
		} elseif(empty($this->gender) || !$this->gender) {
			return ["status" => "invalid-gender"];
		} elseif(empty($this->relationship) || !$this->relationship) {
			return ["status" => "invalid-relationship"];
		} elseif (empty($this->why) || !Validate::range($this->why, 25, 255)) {
			return ["status" => "invalid-why"];
		} elseif (empty($this->how) || !Validate::range($this->how, 25, 255)) {
			return ["status" => "invalid-how"];
		} elseif(empty($this->agree) || $this->agree !== "on") {
			return ["status" => "invalid-agree"];
		}

        try {
        	$databse = Database::connect();
        	$databse->beginTransaction();
        	$token = Generate::hash();
        	$data = ["role" => "applicant", "status" => null, "token" => $token];
        	$result = $this->login->addLoginDetails($data);
        	$code = Generate::string(15);
        	$id = $result["lastInsertId"];
    		$fields = ["surname" => ucfirst($this->surname), "firstname" => ucfirst($this->firstname), "middlename" => ucfirst($this->middlename), "phone" => $this->phone, "birthdate" => $this->birthdate, "address" => ucfirst($this->address), "amount" => $this->amount, "state" => $this->state, "gender" => $this->gender, "relationship" => $this->relationship, "code" => $code, "how" => ucfirst($this->how), "why" => ucfirst($this->why), "status" => null, "login" => $id];
			Query::create($this->table, $fields);
			if(!empty($this->referrer)) {
				$referrer = $this->getByCode($this->referrer);
				$fields = ["applicant" => $id, "code" => $referrer->code, "referrer" => $referrer->login];
				$this->referrals->addReferral($fields);
			}
			if(stripos(PROTOCOL, "https") !== false) Email::mailer(EMAIL_VERIFICATION, $this->email, ["token" => $token, "id" => $id]);
			$databse->commit();
			return ["status" => "success", "redirect" => DOMAIN."/apply/success"];
        } catch (\Exception $error) {
        	$databse->rollback();
        	Logger::log("ADDING APPLICANT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getCount() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "", "", "");
			return count($result["fetchAll"]);
        } catch (\Exception $error) {
        	Logger::log("GETING ALL APPLICANTS COUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getAllWithPagination($pageNumber = "") {
		try {
			$pagination = Pagination::paginate($this->table, "", "", $pageNumber);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$result = Query::read(["*"], $this->table, "", "", "", "date DESC", $limit, $offset);
			return ["applicants" => $result["fetchAll"], "pagination" => $pagination];
		} catch (\Exception $error) {
			Logger::log("GETTING ALL APPLICANTS WITH PAGINATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public function edit($id = "") {
		if (empty($this->surname) || !Validate::range($this->surname, 3, 55)) {
			return ["status" => "invalid-surname"];
		}elseif (empty($this->firstname) || !Validate::range($this->firstname, 3, 55)) {
			return ["status" => "invalid-firstname"];
		}elseif (empty($this->middlename) || !Validate::range($this->middlename, 3, 55)) {
			return ["status" => "invalid-middlename"];
		} elseif (empty($this->phone) || !Validate::length($this->phone, 11)) {
			return ['status' => "invalid-phone"];
		}elseif(empty($this->birthdate) || !$this->birthdate){
			return ["status" => "invalid-birthdate"];
		}elseif(Help::getAge($this->birthdate) < 18 ||  Help::getAge($this->birthdate) > 55) {
			return ["status" => "invalid-age"];
		}elseif(empty($this->address) || !Validate::range($this->address, 5, 55)) {
			return ["status" => "invalid-address"];
		} elseif(empty($this->amount) || !$this->amount) {
			return ["status" => "invalid-amount"];
		} elseif(empty($this->state) || !$this->state) {
			return ["status" => "invalid-state"];
		} elseif(empty($this->gender) || !$this->gender) {
			return ["status" => "invalid-gender"];
		}elseif(empty($this->relationship) || !$this->relationship) {
			return ["status" => "invalid-relationship"];
		}elseif (empty($this->why) || !Validate::range($this->why, 25, 255)) {
			return ["status" => "invalid-why"];
		}elseif (empty($this->how) || !Validate::range($this->how, 25, 255)) {
			return ["status" => "invalid-how"];
		}

        try {
    		$fields = ["surname" => ucfirst($this->surname), "firstname" => ucfirst($this->firstname), "middlename" => ucfirst($this->middlename), "phone" => $this->phone, "birthdate" => $this->birthdate, "address" => ucfirst($this->address), "amount" => $this->amount, "state" => $this->state, "gender" => $this->gender, "relationship" => $this->relationship, "how" => ucfirst($this->how), "why" => ucfirst($this->why)];
    		$condition = ["id" => $id];
			$result = Query::update($this->table, $fields, $condition, 1);
			return ($result["rowCount"] > 0) ? ["status" => "success"] : ["status" => "none"];
        } catch (\Exception $error) {
        	Logger::log("EDITING APPLICANT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getByCode($code = "") {
		try {
			$fields = ["code", "id", "login"];
			$condition = ["code" => $code];
			$result = Query::read($fields, $this->table, "", $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING APPLICANT BY REFERRAL CODE ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function delete($id = "") {
		try {
			$condition = ["login" => $id];
			Query::delete($this->table, "", $condition, 1);
			$this->login->delete($id);
			return ["status" => "success"];
        } catch (\Exception $error) {
        	Logger::log("DELETING APPLICANT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function search($page = "", $query) {
		try{
			$query = $this->escape($query);
	        $pagination = Pagination::paginate($this->table, "", "", $page);
			$offset = $pagination->getOffset();
			$limit = $pagination->itemsPerPage;
			$search = ["firstname" => $query, "surname" => $query, "date" => $query, "phone" => $query];
			$condition = ["status" => "active"];
			$result = Query::search(["*"], $this->table, "", $search, $condition, "", "date DESC", $limit, $offset);
			return ["search" => $result["fetchAll"], "pagination" => $pagination];
		} catch (\Exception $error) {
			Logger::log("GETTING APPLICANTS SEARCH RESULT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public function getByLogin($login) {
		try {
			$condition = ["login" => $login];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING APPLICANT BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getFemaleApplicantsCount(): int {
		try {
			$condition = ["gender" => "Female"];
			$result = Query::read(["gender"], $this->table, "", $condition, "", "", "", "");
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("GETTING FEMALE APPLICANTS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function getMaleApplicantsCount(): int {
		try {
			$condition = ["gender" => "Male"];
			$result = Query::read(["gender"], $this->table, "", $condition, "", "", "", "");
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("GETTING FEMALE APPLICANTS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function calculateFemaleApplicantsPercentage() {
		return Help::calculatePercent($this->getFemaleApplicantsCount(), $this->getCount());
	}

}