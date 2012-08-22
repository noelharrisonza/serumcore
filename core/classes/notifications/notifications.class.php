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
    global $settings;
    
    // Call up PHPMailer
    $mail = new PHPMailer();
    
    // Send using SMTP.
    $mail->IsSMTP();

    $mail->SMTPDebug  = 1;

    $mail->SMTPAuth = true; // turn on SMTP authentication

    // This comes from the settings file.
    $mail->Host = $settings['smtp']['host'];
    $mail->Username = $settings['smtp']['username'];
    $mail->Password = $settings['smtp']['password'];
    $mail->Port = $settings['smtp']['port'];

    $mail->From = "jonathanw@amoebasys.biz";
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
    }
  }
}
