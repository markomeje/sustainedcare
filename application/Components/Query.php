<?php

namespace Application\Components;
use Application\Library\Database;

class Query {

	public static function create($table, $fields){
		$database = Database::connect();
		$columns = $placeholders = "";
		$columns = implode(", ", array_keys($fields));
		$placeholders  = ":" .implode(", :", array_keys($fields));

		$query = "INSERT INTO {$table} ({$columns}) VALUES({$placeholders})";
		$database->prepare($query);

		foreach ($fields as $key => $value) {
			$value = (is_string($value)) ? trim($value) : $value;
			$database->bindValue(":{$key}", $value);
		}
		$database->execute();
		return ["lastInsertId" => $database->lastInsertId(), "rowCount" => $database->rowCount()];
	}

	public static function read($fields, $table, $options, $condition, $group, $order, $limit, $offset){
		$database = Database::connect();
		$fields = implode(", ", $fields);

		$counter = 1;
		$query = "SELECT {$fields} FROM {$table}";
		$options = ($options) ? $options : "" ;
		if ($condition) {
			$query .= "{$options} WHERE ";
			foreach ($condition as $key => $value){
				if(strpos($key, ".") === false) {
					$query .= "{$key} = :{$key}";
				}else {
					$query .= "{$key} = {$value}";
				}
				if($counter < count($condition)) {
					$query .= " AND ";
				}
				$counter++;
			}
		}

		$query .= ($group) ? " GROUP BY " .$group : "";
		$query .= ($order) ? " ORDER BY " .$order : "";
		$query .= ($limit) ? " LIMIT " .$limit : "";
		$query .= ($offset) ? " OFFSET " .$offset : "";
		//die($query);
		$database->prepare($query);

		if ($condition) {
			foreach ($condition as $key => $value) {
				if (strpos($key, ".") === false) {
				   $database->bindValue(":{$key}", $value);
				}
			}
		}

		$database->execute();
		return ["fetchAll" => $database->fetchAll(), "rowCount" => $database->rowCount()];

	}

	public static function update($table, $fields, $condition, $limit){
		$database = Database::connect();
		$columns = " ";
		$counter = 1;

		foreach ($fields as $key => $value){
			$columns .= "{$key} = :{$key}";
			if ($counter < count($fields)){
				$columns .= ", ";
			}
			$counter++;
		}

		$query = "UPDATE {$table} SET {$columns} WHERE ";
		$counter = 1;
		foreach ($condition as $key => $value){
			$query  .= "{$key} = :{$key}";
			if ($counter < count($condition)){
				$query .= " AND ";
			}
			$counter++;
		}

		$query .= isset($limit) ? "" : " LIMIT " .$limit;
        $database->prepare($query);
        foreach ($fields as $key => $value){
			$database->bindValue(":{$key}", $value);
			foreach ($condition as $key => $value){
				$database->bindValue(":{$key}", $value);
			}
		}

		$database->execute();
		return ["rowCount" => $database->rowCount()];

	}

	public static function delete($table, $options, $condition, $limit){
		$database = Database::connect();
		$counter = 1;
		$query = "DELETE FROM {$table}";
		$options = ($options) ? $options : "";

		if ($condition) {
			$query .= "{$options} WHERE ";
			foreach ($condition as $key => $value) {
				if (strpos($value, "IN") === false) {
					if(strpos($key, ".") === false) {
						$query .= "{$key} = :{$key}";
					}else {
						$query .= "{$key} = {$value}";
					}
					if($counter < count($condition)) {
						$query .= " AND ";
					}
					$counter++;
				}else {
					$query .= "{$key} {$value}";
				}
			}
		}

		$query .= ($limit) ? " LIMIT " .$limit : "";
		//die($query);
        $database->prepare($query);
		if ($condition) {
			foreach ($condition as $key => $value) {
				if (strpos($key, ".") === false) {
					if (strpos($value, "IN") === false) {
						$database->bindValue(":{$key}", $value);
					}
				}
			}
		}

		$database->execute();
		return ["rowCount" => $database->rowCount()];
	}

	public static function search($fields, $table, $options, $search, $condition, $group, $order, $limit, $offset) {
		$database = Database::connect();
		$fields = implode(", ", $fields);
		$query = "SELECT {$fields} FROM {$table}";
		$options = ($options) ? $options : "" ;

		if ($search) {
			$counter = 1;
			$query .= "{$options} WHERE ";
			foreach ($search as $key => $value){
				if (strpos($key, ".") === false) {
					$query .= "{$key} LIKE :{$key}";
				}else {
					$query .= "{$key} LIKE {$value}";
				}
				if($counter < count($search)) {
					$query .= " OR ";
				}
				$counter++;
			}
		}

		if ($condition) {
			$counter = 1;
			$query .= " AND ";
			foreach ($condition as $key => $value) {
				if(strpos($key, ".") === false) {
					$query .= "{$key} = :{$key}";
				}else {
					$query .= "{$key} = {$value}";
				}
				if($counter < count($condition)) {
					$query .= " AND ";
				}
				$counter++;
			}
		}

        $query .= ($group) ? " GROUP BY " .$group : "";
		$query .= ($order) ? " ORDER BY " .$order : "";
		$query .= ($limit) ? " LIMIT " .$limit : "";
		$query .= ($offset) ? " OFFSET " .$offset : "";
		//die($query);
		$database->prepare($query);


		if ($condition) {
			foreach ($condition as $key => $value) {
				if (strpos($key, ".") === false) {
				   $database->bindValue(":{$key}", $value);
				}
			}
		}

		if ($search) {
			foreach ($search as $key => $value) {
				if (strpos($key, ".") === false) {
				   $database->bindValue(":{$key}", "%".$value."%");
				}
			}
		}

		$database->execute();
		return ["fetchAll" => $database->fetchAll(), "rowCount" => $database->rowCount()];
	}

}
