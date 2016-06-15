<?php
/**
 * Created by PhpStorm.
 * User: zainul
 * Date: 05/06/16
 * Time: 2:12 AM
 */
require_once(  __DIR__ . '/mailer.php');

if($_POST){
    // Read the form values
    $success = false;
    $senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
    $senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
    $message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    //prepare subject
    $subject = "[FitoutHubme.com] Quote Requested";

    //prepare message
    $htmlMessage ="
    <html>
    <head>
    </head>
    <body>
        <h1>Quote Requested @ Fitouthub.com:</h1>
        <div>From: " . $senderName . " <" . $senderEmail . "></div>
        <div>Phone: " . $phone ." </div>
    </body>
    </html>";

    try {
        Mailer::send(
            array(
                'name' => $senderName,
                'email' => $senderEmail
            ),
            $subject,
            $htmlMessage
        );

        echo json_encode(array(
            'status' => "success",
            'code' => '200'
        ));

    } catch (Exception $e){
        echo json_encode(array(
            'status' => "Error",
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        ));
    }

}