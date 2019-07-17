<?php
/*
set up the post data from the form
*/
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once("get_payment_keys.php");

$name = trim($_POST["user_name"]); 
$email = trim($_POST["user_email"]); 
$address = trim($_POST["user-address"]); 
$city = trim($_POST["user-city"]); 
$postal = trim($_POST["user-postal"]); 
$country = trim($_POST["user-country"]);
$price = trim($_POST['price']);
$discount = trim($_POST['discount']);
$host = trim($_POST['host']);
$order_id = trim($_POST['order_id']);

$q = "Select * from stripe_key";
$res = mysqli_query($con,$q);
$data = mysqli_fetch_array($res);

#updating the email and the name of the user
mysqli_query($con, "Update orders set user_email='".$email."', user_name='".$name."' where order_id='".$order_id."'");

if($data["is_live"] == 0){
	$key = "sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE";
}else{
							$key=$p_k["spk"];
}
// aud, cad, eur, gbp, hkd, jpy, nzd, sgd, usd
// only aud works
$alipay_amt = 100*((float)$price-(float)$discount);
							$alipay_cur = "aud";
							// $key=$p_k["spk"];
							//script for the ali pay
							require_once('./stripe/stripe-php/init.php');
							\Stripe\Stripe::setApiKey($key);
							$alipay = \Stripe\Source::create([
							  "type" => "alipay",
							  "currency" => $alipay_cur,
							  "amount"=>$alipay_amt,
							  "owner" => [
							    "address"=>[
							      "line1" => $address,
							      "city" => $city,
							      "postal_code" => $postal,
							      "country" => strtolower($country)],
    							"name"=> $name,
    							"email" => $email
							  ],
							  "redirect"=>[
							  	"return_url"=>$host."validate_payment.php?amount=".$alipay_amt."&currency=".$alipay_cur."&order_id=".$order_id
							  ]
							]);
							header("Location: ".$alipay["redirect"]["url"]);
							exit();
?>