<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie, Validate};
use Application\Components\Query;
use Application\Exceptions\Logger;
use Framework\Models\Passwords;


class Login extends Model {

	private $table = "login";

	public function __construct() {
		parent::__construct();
	}

	public function getLoginDetails($email) {
		try{
			$condition = ["email" => $email];
	        $result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
	        return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING LOGIN DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
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
        }elseif(empty($logger->status) || $logger->status !== "active") {
        	return ["status" => "inactive"];
        }elseif ($this->passwords->verify($this->password, $logger->password)) {
	        $this->loginWithSession($logger);
			$this->setRememberMeCookie($logger);
			$fields = ["failed" => null, "attempts" => null, "session" => session_id(), "timestamp" => time(), "counter" => $logger->counter + (int)1];
			$this->updateLoginState($fields, $logger->id);
			if (Cookie::exists(ACCESS_DENIED_KEY)) Cookie::destroy(ACCESS_DENIED_KEY);
			$redirect = ($logger->role === "admin") ? DOMAIN."/dashboard" : DOMAIN."/profile";
			return ["status" => "success", "redirect" => $redirect];
		}else {
			$fields = ["failed" => time(), "attempts" => $logger->attempts + 1];
	    	$this->updateLoginState($fields, $logger->id);
		    return ["status" => "invalid-login", "attempts" => (int)$logger->attempts];
		}
	}

	public function loginWithSession($logger) {
		$data = ["id" => $logger->id, "isLoggedIn" => true, "email" => $logger->email, "role" => $logger->role];
		Session::log($data);
		Cookie::set(session_name(), session_id(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
	}

	public function addLoginDetails($data) {
		try {
			$password = password_hash($this->password, PASSWORD_DEFAULT);
			$fields = ["email" => $this->email, "password" => $password, "role" => $data["role"], "status" => $data["status"], "token" => $data["token"]];
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (\Exception $error) {
        	Logger::log("ADDING LOGIN DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	private function isBlocked($logger) {
		if (empty($logger)) {
			return false;
		}else {
            $timeElapsed = time() - $logger->failed;
	    	$timeLeft = ($timeElapsed < (60 * 10)); /** if 10 munites **/
	    	return ($logger->attempts >= 5 && $timeLeft) ? true : false;
		}
	}

	public function setRememberMeCookie($logger) {
        if(isset($this->rememberMe)) {
			if ($this->rememberMe === "on") {
				Cookie::set(REMEMBER_ME_COOKIE_NAME, $logger->id, time() + REMEMBER_ME_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
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
			$fields = ["session" => null];
			$this->updateLoginState($fields, Session::get("id"));
			Session::destroy();
			Cookie::destroy(REMEMBER_ME_COOKIE_NAME);
			return ["status" => "success", "redirect" => DOMAIN."/login"];
		} catch (\Exception $error) {
			Logger::log("LOGGING OUT ERROR", $error->getMessage(), __FILE__, __LINE__);
			return ["status" => "error"];
		}
	}

	public function isVerifiedEmail($email) {
		try {
	        $condition = ["email" => $email, "status" => "active"];
	        $result = Query::read(["email", "status"], $this->table, "", $condition, "", "", 1, "");
	        return ($result["rowCount"] > 0) ? true : false;
	    } catch (\Exception $error) {
			Logger::log("CHECKING VERIFIED EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
			return ["status" => "error"];
		}
    }

    public function delete($id) {
		try {
			$condition = ["id" => $id];
			$result = Query::delete($this->table, "", $condition, 1);
			if($result["rowCount"] > 0) return ["status" => "success"];
        } catch (\Exception $error) {
        	Logger::log("DELETING LOGIN DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getLoggedInSession() {
		try{
			$condition = ["id" => Session::get("id")];
	        $result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
	        return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETTING LOGGED IN SESSION DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function isVerifyTokenValid($token, $id) {
		try {
	        $condition = ["token" => $token, "id" => $id];
	        $result = Query::read(["token", "id"], $this->table, "", $condition, "", "", 1, "");
	        return ($result["rowCount"] > 0) ? true : false;
	    } catch (\Exception $error) {
			Logger::log("CHECKING VALID TOKEN EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
    }

    public function verifyEmail($token, $id) {
		try {
			if (empty($token) && empty($id)) {
				return null;
			}elseif ($this->isVerifyTokenValid($token, $id)) {
				$fields = ["status" => "active"];
		        $condition = ["token" => $token, "id" => $id];
		        $result = Query::update($this->table, $fields, $condition, 1);
		        return ($result["rowCount"] > 0) ? true : false;
			}else {
				return false;
			}
	    } catch (\Exception $error) {
			Logger::log("VERIFYING EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
			return false;
		}
    }

}
