<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie};
use Application\Components\Query;
use Application\Exceptions\Logger;


class Profile extends Model {


	public function __construct() {
		parent::__construct();
	}

	public function getProfile() {
		try {
			$fields = ["applicants.*"];
			$options = ", login";
			$id = Session::get("id");
			$condition = ["login.id" => $id, "applicants.login" => $id];
			$result = Query::read($fields, "applicants", $options, $condition, "", "", 1, "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING USER PROFILE ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function delete() {
		try {
			$id = Session::get("id");
			$condition = ["applicants.login" => $id, "login.id" => $id];
			$result = Query::delete("login", ", applicants", $condition, 1);
			if($result["rowCount"] > 0) return ["status" => "success"];
        } catch (\Exception $error) {
        	Logger::log("DELETING APPLICANT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getReferrals() {
		try {
			$fields = ["code", "referrer"];
			$id = Session::get("id");
			$condition = ["applicants.login" => $id];
			$result = Query::read($fields, "applicants", "", $condition, "", "", "", "");
			return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING USER PROFILE ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

}