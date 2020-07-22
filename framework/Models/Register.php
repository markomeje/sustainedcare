<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie, Validate};
use Application\Components\Query;


class Register extends Model {

	private $table = "login";

	public function __construct() {
		parent::__construct();
	}

	public function register() {
		if (empty($this->email) || !Validate::email($this->email)) {
			return $response[] = ["status" => "invalid-email"];
		}elseif ($this->emailExists($this->table, $this->email)) {
			return $response[] = ["status" => "email-exists"];
		}elseif (empty($this->password) || !Validate::range($this->password, 7, 15)) {
			return $response[] = ["status" => "invalid-password"];
		}elseif ($this->password !== $this->retypePassword) {
			return $response[] = ["status" => "unmatched-password"];
		}
        
        $password = password_hash($this->password, PASSWORD_DEFAULT);
		$fields = ["email" => $this->email, "password" => $password];
		$condition = ["email" => $this->email];
        $result = Query::create($this->table, $fields);
        if ($result["rowCount"] > 0) {
        	return $response[] = ["status" => "success"];
        }else {
        	return $response[] = ["status" => "error"];
        }
	}

}