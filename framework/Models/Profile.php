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
			return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING USER PROFILE ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
        	return false;
        }
	}

}