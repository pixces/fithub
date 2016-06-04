<?php

require_once( __DIR__  . '/PHPMailer/PHPMailerAutoload.php' );

Class Mailer{

    private static $instance = null;

    private static function getInstance(){

        if (is_null(self::$instance)){
            $iniFile = __DIR__ . "/config.ini";
            $ini_parsed = parse_ini_file($iniFile, true);
            $mailConfig = $ini_parsed['mail'];

            $mail = new PHPMailer;
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = $mailConfig['host'];
            $mail->Username = $mailConfig['user'];
            $mail->Password = $mailConfig['pass'];
            $mail->SMTPSecure = $mailConfig['ssl'];
            $mail->Port = $mailConfig['port'];

            $mail->addAddress($mailConfig['recepient_address'], $mailConfig['recepient_name']);

            self::$instance = $mail;
        }

        return self::$instance;

    }

    public static function send(array $sender, $subject, $message)
    {

        $mail = self::getInstance();

        $mail->setFrom($sender['email'], $sender['name']);
        $mail->addCC('pixces@gmail.com');
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            throw new Exception('Mailer Error: ' . $mail->ErrorInfo);
        } else {
            return true;
        }

    }
}