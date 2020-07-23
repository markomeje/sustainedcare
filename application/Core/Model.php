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


}
