<?php 
include_once("database.php");
include_once("constant.php");

function send_mail($subject, $body, $receiver_email, $attachment = null){

global $con;
// get the email settings from the database
$q = "Select * from email_setting";
$res = mysqli_query($con, $q);
$res = mysqli_fetch_array($res);

//prepare variables
$HOST= $res["email_smtp_host"];
$USERNAME= $res["email_username"];
$FROM= $res["email_address"];
$FROMNAME= $res["email_from_name"];
$PASSWORD= $res["email_password"];
$SMTPSECURE= strtolower($res["email_encryption"]);
$PORT= $res["email_port"];
if($res["email_authentication"]){
$SMTPAUTH = true;	
}
require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = $HOST;
$mail->Username = $USERNAME;
$mail->Password = $PASSWORD;
$mail->SMTPSecure = $SMTPSECURE;
$mail->Port = $PORT;
$mail->SMTPAuth = $SMTPAUTH;

//sending the mail
$mail->setFrom($USERNAME,$FROMNAME);
$mail->addAddress($receiver_email);

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body=$body;
if($attachment!=null){
	$mail->addAttachment($attachment);
}
if($mail->send()){
	return true;
}
else{
	return false;
}
}
?>