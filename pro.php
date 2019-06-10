<?php session_start();?>
<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
include "database.php";
include "stripe/stripe-php/init.php";
//print_r($_POST); exit();

$order_id = $_POST['order_id'];
$order_service_id = $_POST['order_service_id'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_ip = $_POST['user_ip'];

\Stripe\Stripe::setApiKey('sk_test_ij9PEMH2LeTPq4tAnarHWp1q00JRhzg5dV');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];


	$charge = \Stripe\Charge::create([
		'amount' => 100*100,
		'currency' => 'usd',
		'description' => 'Example charge',
		'source' => $token,
	]);
		
	if ($charge) {
		
		$query = "
			UPDATE orders SET 
				user_name = ?,
				user_email = ?,
				user_ip = ?,
				order_payment_success=1
			WHERE order_id = '$order_id'
		";
		$stmt = mysqli_prepare($con, $query);
		mysqli_stmt_bind_param($stmt, 'sss',$user_name,$user_email,$user_ip);
		mysqli_stmt_execute($stmt);
	
		if ($order_service_id==1){
			header("location:confirmed.php");
			exit();
		} else if($order_service_id==2){
			header("location:custom_results.php");
			exit();
		}  else if($order_service_id==3){
			header("location:upload_results.php");
			exit();
		} 
		
		header("location:index.php");
		exit();
		
	} else {
		header("location:payment.php&fail=1");
		exit();
	}

?>