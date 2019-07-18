<?php
/*
* get the payment keys
* depend upon the payment
* is live or not.
*/
require_once("database.php");

$q = "Select * from stripe_key";
$res = mysqli_query($con,$q);
$data = mysqli_fetch_array($res);

if($data["is_live"] == 1){
	$p_k =  [
"spk" => $data["stripe_live_publisher_key"],
"ssk" => $data["stripe_live_secret_key"],
	];
}else{
	$p_k =  [
"spk" => $data["stripe_test_publisher_key"],
"ssk" => $data["stripe_test_secret_key"],
	];
}
?>