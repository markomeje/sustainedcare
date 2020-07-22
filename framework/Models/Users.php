<?php

namespace Framework\Models;
use Application\Core\Model;
use Application\Library\Session;
use Application\Components\Query;


class Users extends Model {

	private static $table = "users";

	public function __construct() {
		parent::__construct();
	}

	public static function registerUser($fields) {
		$result = Query::create(self::$table, $fields);
		return $result;
	}

	public static function getUsers($fields, $condition) {
		$result = Query::read($fields, self::$table, "", $condition, "", "", "", "");
		return $result["fetch_all"];
	}

	public static function getUser($condition) {
		$result = Query::read(["*"], self::$table, "", $condition, "", "", 1, "");
		return $result["fetch_all"];
	}

	public static function getAllUsers() {
		$fields = ["id", "email", "user_role", "account_status", "picture", "date_created"];
		return Query::read($fields, self::$table, "", "", "", "date_created DESC", "", "");
	}

	public static function updateUser($fields, $condition) {
		$result = Query::update(self::$table, $fields, $condition, 1);
		return ($result["row_count"] > 0) ? true : false;
	}

	public static function userEmailExists() {
		$condition = ["email" => $this->email];
		$result = Query::read(["email"], self::$table, "", $condition, "", "", 1, "");
		return ($result["row_count"] > 0) ? true : false;
	}

	public static function getUserPicture($id) {
		$condition = ["id" => $id];
		$result = Query::read(["picture"], self::$table, "", $condition, "", "", 1, "");
		return $result["fetch_all"];
	}

	public static function getUserRoles() {
		$result = Query::read(["user_role"], self::$table, "", $condition, "", "", "", "");
		return $result["fetch_all"];
	}

}
