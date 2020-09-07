<?php

namespace Framework\Models;
use Application\Core\{Model, Help, Gateways};
use Application\Library\{Session, Generate, Validate, Database, Cookie};
use Application\Components\Query;
use Application\Exceptions\Logger;


class Donations extends Model {

	private $table = "donations";
	private $ipnUrl = "https://sustainedcare.org/donations/ipn";

	public function __construct() {
		parent::__construct();
	}

	public function donate() {
		if(empty($this->amount) || !$this->amount) {
			return ["status" => "invalid-amount"];
		} elseif(empty($this->firstname) || !Validate::range($this->firstname, 3, 255)) {
			return ["status" => "invalid-firstname"];
		} elseif(empty($this->lastname) || !Validate::range($this->lastname, 3, 255)) {
			return ["status" => "invalid-lastname"];
		} elseif(empty($this->email) || !Validate::email($this->email)) {
			return ["status" => "invalid-email"];
		} elseif(empty($this->phone) || !$this->phone) {
			return ["status" => "invalid-phone"];
		} elseif(empty($this->country) || !in_array($this->country, Help::getAllCountries())){
			return ["status" => "invalid-country"];
		} elseif(empty($this->currency) || !$this->currency) {
			return ["status" => "invalid-currency"];
		} elseif(empty($this->comment) || !Validate::range($this->comment, 3, 255)) {
			return ["status" => "invalid-comment"];
		}

		try{
			$database = Database::connect();
		    $database->beginTransaction();
			$posted = ["amount" => $this->amount, "firstname" => $this->firstname, "lastname" => $this->lastname, "email" => $this->email, "phone" => $this->phone, "currency" => $this->currency, "type" => $this->type, "country" => $this->country, "status" => "initialized", "comment" => $this->comment];
			if ($this->type === "crypto") {
				$gateway = new Gateways();
			    $coinpayment = $gateway->coinpayment();
		    	$response = $coinpayment->CreateComplexTransaction($posted["amount"], "USD", $posted["currency"], $posted["email"], "", ucwords($posted["firstname"]." ".$posted["lastname"]), "Donation To SustainedCare Foundation", date("Y"), Generate::string(25), "Donation", $this->ipnUrl);
	    		$transaction = $response["result"];
	    	    $url = $transaction["status_url"];
	    	    $custom = ["reference" => $transaction["txn_id"]];
    		    $fields = array_merge($posted, $custom);
		    	$result = $this->addDetails($fields);
		    	$database->commit(); 
		    	return ($result > 0) ? ["status" => "success", "redirect" => $url] : ["status" => "error"];
			}elseif ($this->type === "paystack") {
		    	$gateway = new Gateways();
		    	$paystack = $gateway->paystack()->transaction->initialize(["amount" => $posted["amount"] * 100, "email" => $posted["email"], "reference" => Generate::hash()]);
	    		$url = $paystack->data->authorization_url;
	    		$reference = $paystack->data->reference;
	    		$custom = ["reference" => $reference];
	    		$fields = array_merge($posted, $custom);
		        $result = $this->addDetails($fields);
		    	$database->commit();
			    return ($result > 0) ? ["status" => "success", "redirect" => $url] : ["status" => "error"];
			}	
	    } catch(\Exception $error){
	    	$database->rollback();
	        Logger::log("DONATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
	    }
	}

	public function addDetails($fields) {
		try {
			$result = Query::create($this->table, $fields);
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("ADDING DONATION ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function updateByReference($fields, $reference) {
		try {
			$condition = ["reference" => $reference];
			$result = Query::update($this->table, $fields, $condition, 1);
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("UPDATING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function updateByEmail($fields, $email) {
		try {
			$condition = ["email" => $email];
			$result = Query::update($this->table, $fields, $condition, 1);
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("UPDATING DONATOR BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function saveByEmail($fields, $email) {
		empty($this->getByEmail($email)) ? $this->addDetails($fields) : $this->updateByEmail($fields, $email);
	}

	public function getByEmail($email) {
		try {
			$condition = ["email" => $email];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"];
        } catch (\Exception $error) {
        	Logger::log("GETING DONATOR BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getByReference($reference) {
		try {
			$condition = ["reference" => $reference];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING PAYERS PAYEMNT DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getAllDonators() {
		try {
			$result = Query::read(["*"], $this->table, "", "", "", "", "", "");
			return $result["fetchAll"];
        } catch (\Exception $error) {
        	Logger::log("GETING ALL DONATORS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public function getDonatorsWithPagination() {
		try {
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"];
        } catch (\Exception $error) {
        	Logger::log("GETING ALL DONATORS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

}