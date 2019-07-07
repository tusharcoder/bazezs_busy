<?php
include_once("send_mail.php");
$data = $_GET;
$order_id = $data["order_id"];
$receiver_email =  "clemtonparkresidence@gmail.com";

$body = "Review from expert is request for the order number #".$order_id;
$subject = "Alert! Review against the order is requested";

send_mail($subject, $body, $receiver_email, $attachment = null);

echo "success";
?>