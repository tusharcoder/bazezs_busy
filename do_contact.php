<?php

// error_reporting(E_ALL);
// ini_set('display_errors', "On");
if($_POST)
{
require('constant.php');
require('database.php');
    
 
    $subject		= filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    // $user_phone     = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $content   = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
 
	if(empty($user_email)) {
		$empty[] = "<b>Email</b>";
	}

	if(empty($content)) {
		$empty[] = "<b>Message</b>";
	}
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}
	
	// reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY, new \ReCaptcha\RequestMethod\SocketPost());

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
				die($output);				
		  }	
	}

	$admin_email = "Select admin_email from email_setting where email_setting_id = 1";
	$admin_email = mysqli_query($con,$admin_email);	
	$admin_email = mysqli_fetch_array($admin_email)["admin_email"];	
	$toEmail = $admin_email;
	
	$mailHeaders = "From: User<" . $user_email . ">\r\n";

	$mailBody = "User Email: " . $user_email . "\n";

	$mailBody .= "Message: " . $content . "\n";


	require_once 'PHPMailer/PHPMailerAutoload.php';

 
	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
	$mail->SMTPAuth = true;
	$mail->Username = 'tamyworld@gmail.com';   //username
	$mail->Password = 'cfnmktahvdvketuf';   //password
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;                    //SMTP port


	$mail->setFrom('tamyworld@gmail.com', 'Admin');
	$mail->addAddress($toEmail);

	// attachment
	if (isset($_FILES['attachment'])) {
		try{
			move_uploaded_file($_FILES['attachment']["tmp_name"],"/tmp/".$_FILES['attachment']["name"]);
			$mail->addAttachment("/tmp/".$_FILES['attachment']["name"]);
			}catch(Exception $e){
		}
	}

	 
	$mail->isHTML(true);
	 
	$mail->Subject = $subject;
	$mail->Body    = $mailBody;

	if ($mail->send()) {
	    $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_email .', thank you for contacting us. We will get back to you shortly.'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.'tamyworld@gmail.com'));
	    die($output);
	}
}
?>