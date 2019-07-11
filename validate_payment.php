<?php
/*
*This is the script to validate the payment done by the ali pay
*
*Publishable key:
pk_test_RNA5nOQFGUbJ72i9HOgCmgTw004S1ar5Pn

Secret key:
sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE
*/
ini_set('display_errors',1);
error_reporting(E_ALL);
$key = "sk_test_FKKYZjA38qrbVsmqImWG07uu00hBEmQunE";
$data = $_GET;
require_once('./stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey($key);


$charge = \Stripe\Charge::create([
  'amount' => $data["amount"],
  'currency' => $data["currency"],
  'source' => $data["source"],
]);

echo "<pre/>";
var_dump($charge);
exit();
ini_set('display_errors',1);
error_reporting(E_ALL);
?>