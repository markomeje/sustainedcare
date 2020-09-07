<?php

namespace Framework\Models;
use Application\Components\Email;
use Application\Core\Model;
use Application\Library\Validate;
use Application\Exceptions\Logger;
use \Exception;


class Contact extends Model {

	public function emailContact() {
		if (empty($this->firstname) || !Validate::range($this->firstname, 3, 55)) {
			return ["status" => "invalid-firstname"];
		}elseif (empty($this->lastname) || !Validate::range($this->lastname, 3, 55)) {
			return ["status" => "invalid-lastname"];
		} elseif (empty($this->phone) || !$this->phone) {
			return ['status' => "invalid-phone"];
		} elseif (empty($this->email) || !Validate::email($this->email)) {
			return ["status" => "invalid-email"];
		} elseif (empty($this->message) || !Validate::range($this->message, 3, 255)) {
			return ["status" => "invalid-message"];
		}

		try {
			if(stripos(PROTOCOL, "https") !== false) {
				Email::mailer(EMAIL_CONTACT, "contact@sustainedcare.org", ["firstname" => $this->firstname, "lastname" => $this->lastname, "email" => $this->email, "phone" => $this->phone, "message" => $this->message]);
				return ["status" => "success"];
			}
		} catch (Exception $error) {
			Logger::log("SENDING CONTACT EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
		}
			
	}

}