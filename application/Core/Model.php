<?php

namespace Application\Core;
use Application\Core\Application;
use Application\Components\Query;
use Application\Exceptions\{Logger};

class Model extends Application {

	
	public function __construct() {
        $data = $this->merge($_POST, $_FILES);
        foreach ($data as $keys => $values) {
            if (strpos($keys, "-") !== false) {
                $parts = explode("-", $keys);
                if (count($parts) === 2) {
                    $keys = $parts[0].ucfirst($parts[1]);
                }
            }
            $this->$keys = $values;
        }
    }

    private function merge(array $post, array $files){
        foreach($post as $key => $value) {
            if(isset($post[$key])) {
                $post[$key] = trim($value);
            } 
        }
        return array_merge($files, $post);
    }

    public static function emailExists($table, $email) {
        $condition = ["email" => $email];
        $result = Query::read(["email"], $table, "", $condition, "", "", 1, "");
        return ($result["rowCount"] > 0) ? true : false;
    }

    public function getAllNumbers($table) {
        $result = Query::read(["number"], $table, "", [], "", "", "", "");
        return $result["fetchAll"];
    }

    public function getNumber($table) {
        try {
            $serial = Help::generateNumbers();
            $numbers = $this->getAllNumbers($table);
            if (empty($numbers) && isset($serial[0])) return $serial[0];
            foreach ($numbers as $key => $value) {
                $data[] = $value->number;
            }
            $unique = array_values(array_diff($serial, $data));
            return $unique[0];
        } catch (\Exception $error) {
            Logger::log("GENERATING NUMBER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }


}
