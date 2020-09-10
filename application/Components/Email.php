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
                case (EMAIL_CONTACT):
                    $mail->Body = self::contactEmailBody($email, $data);
                    $mail->Subject = EMAIL_CONTACT_SUBJECT;
                    $mail->AddAddress($email);
                    break;
            }
            $mail->send();
        }catch(\Exception $error) {
            Logger::log("SENDING EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }   
	}

	private static function emailVerifyBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Copy the Following Link To Your Browser To Verify Your Email: <br>";
        $body .= EMAIL_VERIFICATION_URL . "/" . urlencode($data["token"]) . "/" . urlencode($data["id"])."<br>";
        $body .= " If you didn't Perform This Action With your email, Please ignore.";
        return $body;
	}

	private static function passwordResetBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Use The Following Token To Reset Your Password: ";
        $body .= PASSWORD_RESET_URL . "/" . urlencode($data["token"]) . "/" . urlencode($data["id"]);
        $body .= " If you didn't Perform This Action With your email, Please ignore.";
        return $body;
    }

    private static function contactEmailBody($email, $data) {
        $body  = "";
        $body .= ucfirst($data["firstname"]) . " " . ucfirst($data["lastname"]) . " contacted you with the following email " . $data["email"] . " and phone number " . $data["phone"] . ".\n\n";
        $body .= " And message " . ucfirst($data["message"]);
        return $body;
    }

}