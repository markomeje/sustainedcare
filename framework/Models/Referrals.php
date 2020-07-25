<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\{Session, Cookie, Validate};
use Application\Components\Query;
use Application\Exceptions\Logger;


class Referrals extends Model {

	private $table = "referrals";

	public function __construct() {
		parent::__construct();
	}

	public function add() {
		try {
			$fields = [];
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (\Exception $error) {
        	Logger::log("ADDING REFERRER DETAILS ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
        	return ["status" => "error"];
        }
	}

}