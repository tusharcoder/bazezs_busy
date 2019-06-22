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

// var_dump($_POST);
$effective_price =0;
$discount = 0;
$q = 'SELECT * FROM services WHERE id='.$order_service_id.';';
$result = mysqli_query($con, $q);
if (mysqli_num_rows($result) > 0) {
	// echo 1;
	$service =  mysqli_fetch_assoc($result);
	$order_service_price = $service['service_price'];
	global $effective_price;
	global $discount;
	// var_dump($_POST);
	if (isset($_POST['promotional_code'])&&$_POST['promotional_code']!=''){
		// echo 1;
		$pro_q = "SELECT * FROM promotional_code WHERE promotional_code='".$_POST['promotional_code']."';";
		$pro_r =mysqli_query($con, $pro_q);
		// var_dump("csacas");
		if(mysqli_num_rows($pro_r)>0){
			// echo 1;
			$code_r = mysqli_fetch_assoc($pro_r);
			// var_dump($code_r);
			$code_type = $code_r['type'];
			$code_value = $code_r['value'];
			// echo $code_type;
			if ($code_type == "percentage"){
				$discount = (float)($code_value/100)*$order_service_price;
				// var_dump($discount);
			}elseif ($code_type == "fixed_value") {
				// echo 1;
				if ($code_value > $order_service_price){
					throw new Exception('discount price is greator than the price of order'); #this error has to be handles
					exit();
				}
				// echo 1;
				$discount = $code_value;
			}

		}

	}else{
		$discount = 0;
	}
	$effective_price = $order_service_price - $discount;
	// var_dump($discount);
}

\Stripe\Stripe::setApiKey('sk_test_ij9PEMH2LeTPq4tAnarHWp1q00JRhzg5dV');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];


	$charge = \Stripe\Charge::create([
		'amount' => (int) (100*$effective_price),
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
				order_payment_success=1,
				discount=".$discount.",
				order_amount = ".$effective_price."
			WHERE order_id = '$order_id'
		";
		// var_dump($query);
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