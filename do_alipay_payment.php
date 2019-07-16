<?php
/*
set up the post data from the form
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$alipay_amt = 100*((float)$price-(float)$discount);
							$alipay_cur = "usd";
							$key="sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE";
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
							      "country" => $country],
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