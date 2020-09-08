<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie, Validate};
use Application\Components\Query;
use Application\Exceptions\Logger;
use Framework\Models\Login;


class Passwords extends Model {

	private $table = "password";

	public function __construct() {
		parent::__construct();
	}

	public function update() {
		$loggedIn = $this->login->getLoggedInSession();
		if(empty($this->reason) || !$this->reason) {
			return ['status' => "invalid-reason"];
		}elseif(!$this->verify($this->currentpassword, $loggedIn->password)) {
			return ['status' => "incorrect-password"];
		}elseif (empty($this->newpassword) || !Validate::range($this->newpassword, 6, 15)) {
            return ['status' => "invalid-password"];
		} elseif ($this->newpassword !== $this->confirmpassword) {
			return ['status' => "invalid-confirm-password"];
		}

		try{
			$password = $this->hash($this->newpassword);
			$fields = ["password" => $password];
			$condition = ["id" => $loggedIn->id];
	        $result = Query::update("login", $fields, $condition, 1);
	        if($result["rowCount"] > 0) { 
	        	$this->login->logout(); 
	        	return ["status" => "success", "redirect" => DOMAIN."/login"];
	        }
        } catch (\Exception $error) {
        	Logger::log("UPDATING PASSWORD ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function hash($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public function reset($email) {
		try{
			$condition = ["email" => $email];
	        $result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
	        return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING LOGIN DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function process($email) {
		try{
			$condition = ["email" => $email];
	        $result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
	        return empty($result["fetchAll"]) ? $result["fetchAll"] : $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING LOGIN DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function verify($password, $hashed) {
		return password_verify($password, $hashed);
	}

}