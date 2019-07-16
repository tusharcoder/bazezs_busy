<?php
/*
*This is the script to validate the payment done by the ali pay
*
*Publishable key:
pk_test_RNA5nOQFGUbJ72i9HOgCmgTw004S1ar5Pn

Secret key:
sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE
*/
// ini_set('display_errors',1);
// error_reporting(E_ALL);
$key = "sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE";
$data = $_GET;
foreach ($data as $data_key => $value) {
	# code...
	$data[trim($data_key)]=trim($value);
}
require_once('./stripe/stripe-php/init.php');
require_once('./database.php');

\Stripe\Stripe::setApiKey($key);

try{
$charge = \Stripe\Charge::create([
  'amount' => $data["amount"],
  'currency' => $data["currency"],
  'source' => $data["source"],
]);
$uq = "UPDATE orders set order_payment_success=1 where order_id='".$data["order_id"]."'";
mysqli_query($con,$uq);
}catch(Exception $e){
	$uq = "UPDATE orders set order_payment_success=0 where order_id='".$data["order_id"]."'";
	mysqli_query($con,$uq);
	// exit();
	header("location:payment.php?fail=1");
	exit();
}
$q = "Select * from orders where order_id ='".$data["order_id"]."'";
// echo $q;
$res = mysqli_query($con,$q);
// echo mysqli_error($con);
$order = mysqli_fetch_array($res);
if ($order["order_service_id"]==1) {
	# code...
	header("location:confirmed.php");
}

if ($order["order_service_id"]==2) {
	# code...
	header("location:custom_results.php");
}
if ($order["order_service_id"]==3) {
	# code...
	header("location:upload_results.php");
}
?>