<?php

namespace Application\Components;


class Encryption {
 

    //private static $key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');

    /**
     * Encrypts (but does not authenticate) a message
     * 
     * @param string $message - plaintext message
     * @param string $key - encryption key (raw binary expected)
     * @param boolean $encode - set to TRUE to return a base64-encoded 
     * @return string (raw binary)
     */
    public static function partial_encrypt($message, $key, $encode = false){
        $cipher_method = 'aes-256-ctr';
        $nonceSize = openssl_cipher_iv_length($cipher_method);
        $nonce = openssl_random_pseudo_bytes($nonceSize);

        $ciphertext = openssl_encrypt(
            $message,
            $cipher_method,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        // Now let's pack the IV and the ciphertext together
        // Naively, we can just concatenate
        if ($encode) {
            return base64_encode($nonce.$ciphertext);
        }
        return $nonce.$ciphertext;
    }

    public static function partial_decrypt($message, $key, $encoded = false){
        $cipher_method = 'aes-256-ctr';
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new Exception('Encryption failure');
            }
        }

        $nonceSize = openssl_cipher_iv_length($cipher_method);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

        $plaintext = openssl_decrypt(
            $ciphertext,
            $cipher_method,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return $plaintext;
    }

    /**
     * Encrypts then MACs a message
     * 
     * @param string $message - plaintext message
     * @param string $key - encryption key (raw binary expected)
     * @param boolean $encode - set to TRUE to return a base64-encoded string
     * @return string (raw binary)
     */
    public static function encrypt($message, $key, $encode = false){
        $hash_algorithm = 'sha256';
        list($encKey, $authKey) = self::splitKeys($key);
        // Pass to UnsafeCrypto::encrypt
        $ciphertext = self::partial_encrypt($message, $encKey);
        // Calculate a MAC of the IV and ciphertext
        $mac = hash_hmac($hash_algorithm, $ciphertext, $authKey, true);

        if ($encode) {
            return base64_encode($mac.$ciphertext);
        }
        // Prepend MAC to the ciphertext and return to caller
        return $mac.$ciphertext;
    }

    public static function decrypt($message, $key, $encoded = false){
        $hash_algorithm = 'sha256';
        list($encKey, $authKey) = self::splitKeys($key);
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new \Exception('Encryption failure');
            }
        }

        // Hash Size -- in case HASH_ALGO is changed
        $hs = mb_strlen(hash($hash_algorithm, '', true), '8bit');
        $mac = mb_substr($message, 0, $hs, '8bit');

        $ciphertext = mb_substr($message, $hs, null, '8bit');

        $calculated = hash_hmac(
            $hash_algorithm,
            $ciphertext,
            $authKey,
            true
        );

        if (!self::hashEquals($mac, $calculated)) {
            throw new \Exception('Encryption failure');
        }

        // Pass to UnsafeCrypto::decrypt
        $plaintext = self::partial_decrypt($ciphertext, $encKey);
        return $plaintext;
    }


    public static function splitKeys($master){
        $hash_algorithm = 'sha256';
        return [
            hash_hmac($hash_algorithm, 'ENCRYPTION', $master, true),
            hash_hmac($hash_algorithm, 'AUTHENTICATION', $master, true)
        ];
    }

    /**
     * Compare two strings without leaking timing information
     * 
     * @param string $a
     * @param string $b
     * @ref https://paragonie.com/b/WS1DLx6BnpsdaVQW
     * @return boolean
     */
    public static function hashEquals($a, $b){
        $hash_algorithm = "sha256";
        if (function_exists("hash_equals")) {
            return hash_equals($a, $b);
        }
        $nonce = openssl_random_pseudo_bytes(32);
        return hash_hmac($hash_algorithm, $a, $nonce) === hash_hmac($hash_algorithm, $b, $nonce);
    }


    // $encrypted = encrypt($message, $key);
    // $decrypted = decrypt($encrypted, $key);

    // var_dump($encrypted, $decrypted);
    // die();



    // $string = 'Ready your ammunition; we attack at dawn.';
    // echo "string";
    // $key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
    // echo $key;
    // die();

    // partialEncryption($string, $key, $encode = false);

}