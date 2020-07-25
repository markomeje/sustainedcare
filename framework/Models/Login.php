<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie, Validate};
use Application\Components\Query;
use Application\Exceptions\Logger;


class Login extends Model {

	private $table = "login";

	public function __construct() {
		parent::__construct();
	}

	public function getLoginDetails($email) {
		$condition = ["email" => $email];
        $result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
        return $result["fetchAll"];
	}

	public function login() {
		if (!Session::exists("csrf") || Session::get("csrf") !== $this->csrf) {
            Cookie::set(ACCESS_DENIED_KEY, $this->IpAddress(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
            return ["status" => "blocked"];
        }elseif (empty($this->email) || !Validate::email($this->email)) {
			return ['status' => "invalid-email"];
		}elseif (empty($this->password)) {
			return ['status' => "empty-password"];
		}
        
        $logger = $this->getLoginDetails($this->email);
        if (empty($logger) || $logger === false) {
        	return ["status" => "not-found"];
        }elseif ($this->isBlocked($logger) === true) {
        	return ["status" => "blocked"];
        }elseif(empty($logger[0]->status) || $logger[0]->status !== "active") {
        	return ["status" => "inactive"];
        }elseif (password_verify($this->password, $logger[0]->password)) {
	        $this->loginWithSession($logger);
			$this->setRememberMeCookie($logger);
			$fields = ["failed" => null, "attempts" => null, "token" => session_id(), "timestamp" => time(), "counter" => $logger[0]->counter + (int)1];
			$this->updateLoginState($fields, $logger[0]->id);
			if (Cookie::exists(ACCESS_DENIED_KEY)) Cookie::destroy(ACCESS_DENIED_KEY);
			$redirect = ($logger[0]->role === "admin") ? DOMAIN."/dashboard" : DOMAIN."/profile";
			return ["status" => "success", "redirect" => $redirect];
		}else {
			$fields = ["failed" => time(), "attempts" => $logger[0]->attempts + 1];
	    	$this->updateLoginState($fields, $logger[0]->id);
		    return ["status" => "invalid-login", "attempts" => (int)$logger[0]->attempts];
		}
	}

	public function loginWithSession($logger) {
		$data = ["id" => $logger[0]->id, "isLoggedIn" => true, "email" => $logger[0]->email, "role" => $logger[0]->role];
		Session::log($data);
		Cookie::set(session_name(), session_id(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
	}

	public function addLoginDetails($data = []) {
		try {
			$password = password_hash($this->password, PASSWORD_DEFAULT);
			$fields = ["email" => $this->email, "password" => $password, "role" => $data["role"], "status" => $data["status"]];
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (\Exception $error) {
        	Logger::log("ADDING LOGIN DETAILS ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
        	return ["status" => "error"];
        }
	}

	private function isBlocked($logger) {
		if (empty($logger)) {
			return false;
		}else {
            $timeElapsed = time() - $logger[0]->failed;
	    	$timeLeft = ($timeElapsed < (60 * 10)); /** if 10 munites **/
	    	return ($logger[0]->attempts >= 5 && $timeLeft) ? true : false;
		}
	}

	public function setRememberMeCookie($logger) {
        if(isset($this->rememberMe)) {
			if ($this->rememberMe === "on") {
				Cookie::set(REMEMBER_ME_COOKIE_NAME, $logger[0]->id, time() + REMEMBER_ME_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
			}
		}
	}

	private function updateLoginState($fields, $id) {
		$condition = ["id" => $id];
    	$result = Query::update($this->table, $fields, $condition, 1);
    	return ($result["rowCount"] > 0) ? true : false;
	}

	public function logout() {
		try {
			$fields = ["token" => null];
			$this->updateLoginState($fields, Session::get("id"));
			Session::destroy();
			Cookie::destroy(REMEMBER_ME_COOKIE_NAME);
			return ["status" => "logout", "redirect" => DOMAIN."/login"];
		} catch (\Exception $error) {
			Logger::log("LOGGING OUT ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
			return ["status" => "error"];
		}
	}

	public static function isVerifiedEmail($email) {
		try {
	        $condition = ["email" => $email, "status" => "active"];
	        $result = Query::read(["email", "status"], $this->table, "", $condition, "", "", 1, "");
	        return ($result["rowCount"] > 0) ? true : false;
	    } catch (\Exception $error) {
			Logger::log("CHECKING VERIFIED EMAIL ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
			return ["status" => "error"];
		}
    }

}
