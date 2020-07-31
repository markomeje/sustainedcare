<?php

namespace Application\Components;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Application\Exceptions\Logger;

class Email {

    /**
     * Email method for sending emails
     */

	public static function mailer($type, $email, $data = []) {
		$mail = new PHPMailer;
		try {
            $mail->isMail();
            $mail->SetFrom(EMAIL_FROM, EMAIL_FROM_NAME);
            $mail->AddReplyTo(EMAIL_REPLY_TO);
            $mail->isHTML(true);
            switch($type) {
                case (EMAIL_VERIFICATION):
                    $mail->Body = self::emailVerifyBody($email, $data);
                    $mail->Subject = EMAIL_VERIFICATION_SUBJECT;
                    $mail->AddAddress($email);
                    break;
                case (PASSWORD_RESET):
                    $mail->Body = self::passwordResetBody($email, $data);
                    $mail->Subject = PASSWORD_RESET_SUBJECT;
                    $mail->AddAddress($email);
                    break;
            }
            if($mail->send()) {
                throw new \Exception("Mail sent", 1);
            }else {
                throw new \Exception("Error Processing Request", 1);
            }
        }catch(\Exception $error) {
            die($error->getMessage());
            Logger::log("SENDING EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
        
	}

	private static function emailVerifyBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Click On the Following Link To Verify Your Email: ";
        $body .= EMAIL_VERIFICATION_URL . "/" . urlencode($data["token"]) . "/" . urlencode($data["id"]);
        $body .= " If you didn't Perform This Action With your email, Please Ignore.";
        $body .= " Regards From " . EMAIL_FROM_NAME;
        return $body;
	}

	private static function passwordResetBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Use The Following Token To Reset Your Password: ";
        $body .= PASSWORD_RESET_URL . "/" . urlencode($data["token"]) . "/" . urlencode($data["id"]);
        $body .= " If you didn't Perform This Action With your email, Please contact the admin directly.";
        $body .= " Regards From " . EMAIL_FROM_NAME;
        return $body;
    }

}