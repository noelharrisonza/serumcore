<?php

/**
 * @file
 */

// Require the PHPMailer class.
require_once SERUM_ROOT .'/library/phpmailer/class.phpmailer.php';

class notifications extends node {
  function make_new($notification) {
    
  }

  /**
   * Send an email.
   */
  function mail($data = array()) {
    // Call up PHPMailer
    /*$mail = new PHPMailer();
    
    // Send using SMTP.
    $mail->IsSMTP();

    $mail->SMTPDebug  = 1;

    $mail->SMTPAuth = true; // turn on SMTP authentication

    // This will come from a database soon soon :).
    $mail->Host = "smtp.gmail.com"; // specify main and backup server
    $mail->Username = "noel.harrison2@gmail.com"; // SMTP username
    $mail->Password = "metrorail"; // SMTP password
    $mail->Port = 465;

    $mail->From = "noel.harrison2@gmail.com";
    $mail->FromName = "Serum Core";

    $mail->AddAddress($data['to']);

    $mail->WordWrap = 80;
    $mail->IsHTML(true); // set email format to HTML otherwise if text use false.

    $mail->Subject = $data['subject'];

    $mail->Body = $data['message'];

    if(!$mail->Send()) {
      echo "Message could not be sent. <p>";
      echo "Mailer Error: " . $mail->ErrorInfo;
      exit;
    }*/
  }
}