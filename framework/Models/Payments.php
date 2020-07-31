<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Generate};
use Application\Components\Query;
use Application\Exceptions\Logger;


class Payments extends Model {

	private $table = "payments";

	public function __construct() {
		parent::__construct();
	}

	public function paystack() {
	    try{
	    	$reference = Generate::hash();
	    	$paystack = new \Yabacon\Paystack(PAYSTACK_LIVE_SECRET_KEY);
	        $transaction = $paystack->transaction->initialize(['amount' => 100000, /*in kobo*/ 'email' => Session::get("email"), 'reference' => $reference]);
	        $type = "paystack";
	        $this->save($transaction->data->reference, Session::get("id"), $type, null);
	        return ["status" => "success", "redirect" => $transaction->data->authorization_url];
	    } catch(\Yabacon\Paystack\Exception\ApiException $error){
	        Logger::log("PAYSTACK PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
	    }
	}

	public function add($reference, $id, $type, $status) {
		try {
			$fields = ["payer" => $id, "reference" => $reference, "type" => $type, "status" => $status];
			$result = Query::create($this->table, $fields);
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("ADDING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function update($reference, $id, $type, $status) {
		try {
			$fields = ["reference" => $reference, "type" => $type, "status" => $status];
			$condition = ["payer" => $id];
			$result = Query::update($this->table, $fields, $condition, 1);
			return $result["rowCount"];
        } catch (\Exception $error) {
        	Logger::log("UPDATING PAYMENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

	public function save($reference, $id, $type, $status) {
		if (empty($this->getById($id))) {
			$this->add($reference, $id, $type, $status);
		}else {
			$this->update($reference, $id, $type, $status);
		}
	}


	public function getById($id) {
		try {
			$condition = ["payer" => $id];
			$result = Query::read(["*"], $this->table, "", $condition, "", "", 1, "");
			return $result["fetchAll"][0];
        } catch (\Exception $error) {
        	Logger::log("GETING PAYERS PAYEMNT DETAILS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
	}

}