<?php

namespace Application\Exceptions;
use Application\Core\Help;


class Logger{


    private function __construct(){}


    public static function log($subject = "", $message = "", $fileName = "", $lineNumber = ""){
        $error = "*******************************************************************\n";
        $logfile = ROOT . DS . "errors.txt";
        $error .= "| ".mb_strtoupper($subject)." | "." Logged On ".Help::formatDatetime()." | "."\n\n";
        $error .= is_array($message) ? implode("\n", $message) : $message." | "."\n\n";

        $error .= "At File ".$fileName." | "."On Line ".$lineNumber." | "."\n";
        $error .= "*******************************************************************\n\n\n";
        error_log($error, 3, $logfile);
    }

}