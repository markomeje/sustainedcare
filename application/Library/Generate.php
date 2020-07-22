<?php

namespace Application\Library;

class Generate {

	public static function time($duration = "") {
		return empty($duration) ? time() + $duration : time();
	}

	public static function hash() {
		$hash = hash("sha256", mt_rand());
		return str_shuffle($hash);
	}

	public static function bytes($length = "") {
		return empty($length) ? bin2hex(random_bytes(55)) : bin2hex(random_bytes($length));
	}

	public static function string($size = "") {
		$string = str_shuffle(md5(mt_rand().time()).uniqid());
		return empty($size) ? substr($string, 0, (int)10) : substr($string, 0, (int)$size);
	}

	public static function salt($length) {
        $salt = "";
        $charset = "@/\\][{}\'\";:?.>,<!#%^&*()-_=+|";
        for ($i = 0; $i < $length; $i++) {
            $salt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }
        return $salt;
    }

    public static function numbers(){
		return rand(1000000, 9999999);
	}
	
}