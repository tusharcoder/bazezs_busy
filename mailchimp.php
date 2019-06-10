<?php
require 'PHPMailer/PHPMailerAutoload.php';
include "database.php";
$mail = new PHPMailer;
$mail_res = mysqli_query($con, "SELECT * FROM email_setting");
$mail_row = mysqli_fetch_array($mail_res);

//$mail->SMTPDebug = 0;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $mail_row['email_smtp_host'];  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; 
if ($mail_row['email_authentication']=='No') {
	$mail->SMTPAuth = false
}                             // Enable SMTP authentication
$mail->Username = $mail_row['email_username'];                 // SMTP username
$mail->Password = $mail_row['email_password'];                           // SMTP password
$mail->SMTPSecure = $mail_row['email_encryption'];                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $mail_row['email_port'];                                    // TCP port to connect to
//$mail->SMTPDebug = 0;
$mail->setFrom($mail_row['email_address'], $mail_row['email_from_name']);
 //$mail->addAddress('ellen@example.com');               // Name is optional
 //$mail->addReplyTo('info@example.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');
//$mail->addAttachment('images/php-send-email.png');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $mail_row['email_subject'];

//$mail->addAddress('abubakr123.ch@gmail.com', 'Muhammad Abubakr');     // Add a recipient
//$mail->Body    = 'Testing Mail Here';

//$mail->AltBody = 'Done';
/*
if(!$mail->send()) {
   // echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   // echo 'Message has been sent';
} */
?>