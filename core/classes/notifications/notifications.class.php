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

    $mail->SMTPAuth = $settings['smtp']['auth']; // turn on SMTP authentication

    // This comes from the settings file.
    $mail->Host = $settings['smtp']['host'];
    $mail->Username = $settings['smtp']['username'];
    $mail->Password = $settings['smtp']['password'];
    $mail->Port = $settings['smtp']['port'];

    $mail->From = $data['from'];
    $mail->FromName = $data['from_name'];

    $mail->AddAddress($data['to']);

    $mail->WordWrap = 80;
    $mail->IsHTML($data['is_html']); // set email format to HTML otherwise if text use false.

    $mail->Subject = $data['subject'];

    $mail->Body = $data['message'];

    if(!$mail->Send()) {
      serum_set_message('There was an error sending the email. '. $mail->errorInfo);
    }
  }
}
