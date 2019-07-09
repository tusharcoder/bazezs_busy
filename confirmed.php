<?php session_start();
include "send_mail.php";
?>
<?php
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
?>
<?php
	include "database.php";
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
	$order_res = mysqli_query($con, "SELECT * FROM orders INNER JOIN user_personality ON orders.user_personality_id = user_personality.user_personality_id WHERE order_id='$order_id'");
	$order_row = mysqli_fetch_array($order_res);
	$order_time = $order_row['order_time'];
	$user_selection = $order_row['user_selection'];
	$user_email = $order_row['user_email'];
	$user_name = $order_row['user_name'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   <?php include "headerlinks.php";?>
   <style>
   .random_res_table td {
	   padding:6px;
   }
	.pt--120 {
		padding-top: 30px !important;
	}
	.circle {
	  display: inline-flex;         /* use this so theat items are on same line */
									
	  justify-content: center;      /* by using above, you can vertical and horizontal align without the need for a stupid line-height hack*/
	  align-items: center;
	  text-align: center;
	  
	  margin-right: 10px;
	  width: 55px;
	  height: 55px;
	  font-size: 18px;
	  border-radius: 50%;
	  color: #fef;
	  background: white;
	  color:black;
	  border:2px solid black;
	  cursor:pointer;
}
   </style>
</head>

<body>
	
		<?php include "navbar.php";?>

        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->

        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
	<div class="">
        <section class="htc__store__area pt--120 bg__white">
			<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="well" style="margin-top:-30px;">
							<p style="color:black;font-size:20px;font-family:calibri"><h2>ORDER CONFIRMATION</h2></p> Thanks for your order! <br><br>
							<b>ORDER SUMMARY</b> 
							<span style="float:right">
								<?php echo date('F j Y', $order_time)?>
							</span>
							<hr/>
							
							
							<span style="float:right;margin-top:15px"><b>Order ID:</b> <?php echo $order_id?></span><br>
							<div style="clear:both"></div>
							
							<?php
								$total_points = 0;
								$total_points += $order_row['user_personality_points'];
								$user_order_strength_res = mysqli_query($con, "SELECT * FROM user_order_strength INNER JOIN user_strength ON user_order_strength.user_strength_id =user_strength.user_strength_id WHERE order_id = '$order_id'");
								while ($user_order_strength_row = mysqli_fetch_array($user_order_strength_res)) {
									$total_points += $user_order_strength_row['user_strength_points'];
								}
								
								$result_type = $order_row['user_selection'];
								$random_result = mysqli_query($con, "SELECT * FROM results WHERE result_type='$result_type' AND result_point=$total_points ORDER BY RAND() LIMIT 3");
							?>
							
							<table class="random_res_table">
							<?php
								$random_arr_name = array();
								$random_arr_image = array();
								while ($random_row = mysqli_fetch_array($random_result)) {
									$random_arr_name[] = $random_row['result_name'];
									$random_arr_image[] = $random_row['result_image'];
									mysqli_query($con,"INSERT INTO order_results (order_id, result_name, result_image, result_id) values('$order_id','".$random_row['result_name']."','".$random_row['result_name']."',".$random_row['result_id'].")");
							?>
									<tr>
										<td><img src="icons/index-page/<?php echo $random_row['result_image'] ?>" class="img-circle" style="width:75px"></td>
										
										<td style="width:80%;"><b><?php echo $random_row['result_name']; ?></b></td>
									</tr>
							<?php
								}
							?>
							</table>
							
							
							<!--<table class="table">
								<tr>
									<td>
										<img src="icons/index-page/human.png" class="img-circle">&nbsp;&nbsp; <b>Lord Arthur</b>
									</td>
									<td></td>
									<td></td>
									<td><span style="float:right;margin-top:15px;"><b><small>Order ID:</small></b> IN78488</span><br><br></td>
								</tr>
							</table>
							<img src="icons/index-page/human.png">&nbsp;&nbsp; <b>Lord Arthur</b>
							<span style="float:right;margin-top:15px;"><b><small>Order ID:</small></b> IN78488</span><br><br>-->
							
							<center><div id="request_review" class="circle" style="background:orange;font-size:20px;border:none"><i class="fa fa-commenting" style="color:white !important"></i> </div> <span style="color:green">Request Expert Review </span>
							</center>
							<br><br>
							
							<center><p><b>An email has been sent to you as well</b></p></center><br>
							
							<center><a href="index.php"><button class="btn btn-success">Home</button></a></center>
						</div>
				  </div>
			</div>
        </section>
	</div>
	
	<?php
		$message ='
			<html>
			<body bgcolor="#f7f7f7" style="width: 100% !important;margin: 0 !important;height: 100%;color: #676767;">
			<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="600px" style="margin:auto;margin-bottom:40px">
			  <tr>
				<td align="left" valign="top" width="100%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
				  <center>
				  <img src="http://s3.amazonaws.com/swu-filepicker/SBb2fQPrQ5ezxmqUTgCr_transparent.png" class="force-width-gmail">
					<table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
					  <tr>
						<td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
						  <center>
							<table cellpadding="0" cellspacing="0" width="600" class="w320">
							  <tr>
								<td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
								  <a href=""><img width="137" height="47" src="http://s3.amazonaws.com/swu-filepicker/0zxBZVuORSxdc9ZCqotL_logo_03.gif" style="padding-left:30px;"></a>
								</td>
								<td class="pull-right mobile-header-padding-right" style="color: #4d4d4d;">
								  <a href=""><img width="44" height="47" src="http://s3.amazonaws.com/swu-filepicker/k8D8A7SLRuetZspHxsJk_social_08.gif"  /></a>
								  <a href=""><img width="38" height="47" src="http://s3.amazonaws.com/swu-filepicker/LMPMj7JSRoCWypAvzaN3_social_09.gif" /></a>
								  <a href=""><img width="40" height="47" src="http://s3.amazonaws.com/swu-filepicker/hR33ye5FQXuDDarXCGIW_social_10.gif" /></a>
								</td>
							  </tr>
							</table>
						  </center>
						</td>
					  </tr>
					</table>
				  </center>
				</td>
			  </tr>
			  <tr>
				<td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
				  <center>
					<table cellspacing="0" cellpadding="0" width="600" class="w320">
					  <tr>
						<td style="font-size: 25px;font-weight: 700;line-height: normal;padding: 35px 0 0;color: #4d4d4d;font-family: Helvetica, Arial, sans-serif;color: #777777;text-align: center;line-height: 21px;">
						  Thank you for your order!
						</td>
					  </tr>
					  <tr>
						<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center; line-height: 21px;">
						  We will let you know as soon as your items have shipped. To change or view your order, please view your account by clicking the button below.
						</td>
					  </tr>
					</table>
				  </center>
				</td>
			  </tr>
			  <tr>
				<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;"><br> 
					<p style="color:black;font-size:20px;font-family:calibri"><h2>ORDER CONFIRMATION</h2></p> Thanks for your order! <br><br>
					<hr/>
					<span style="float:right">
						'.date("F j Y", $order_time).'
					</span>
					<b>ORDER SUMMARY</b>
				</td>
			  </tr>
			  <tr>
				<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: right; line-height: 21px;"><b>Order ID:</b> '.$order_id.'</td>
			  </tr>
			  <tr>
				<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;vertical-align:middle"><img src="'.$host.'/icons/index-page/'.$random_arr_image[0].'" style="border-radius:50%">&nbsp;&nbsp;&nbsp;&nbsp;<b> '.$random_arr_name[0].' </b><br></td>
			  </tr>
			  <tr>
				<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;vertical-align:middle"><img src="'.$host.'/icons/index-page/'.$random_arr_image[1].'" style="border-radius:50%">&nbsp;&nbsp;&nbsp;&nbsp;<b> '.$random_arr_name[1].' </b><br></td>
			  </tr>
			  <tr>
				<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;vertical-align:middle"><img src="'.$host.'/icons/index-page/'.$random_arr_image[2].'" style="border-radius:50%">&nbsp;&nbsp;&nbsp;&nbsp;<b> '.$random_arr_name[2].' </b><br><br></br></td>
			  </tr>
			  <tr>
				<td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
				  <center>
					<table cellspacing="0" cellpadding="0" width="600" class="w320">
					  <tr>
						<td style="font-size: 14px;line-height: normal;padding: 35px 0 0;color: #4d4d4d;font-family: Helvetica, Arial, sans-serif;color: #777777;text-align: center;line-height: 21px;">
						  <b>Awesome Inc</b> <br>1234 Awesome St <br />
							Wonderland <br /><br />
						</td>
					  </tr>
					</table>
				  </center>
				</td>
			  </tr>
			</table>

			</body>
			</html>
					';
		
		$subject = "Order Confirmation! Thanks for you order ".$user_name;
		$body = $message;
		$to = $user_email;
		send_mail($subject, $body, $to, null);
	?>
	<?php include "footerlinks.php";?>
	<script type="text/javascript">
		var order_id = '<?php echo $order_id; ?>';
		$("#request_review").on("click",function(){
				$.ajax(
  'request_review_from_expert.php?order_id='+order_id,
  {
      success: function(data) {
        if (data == "success") {
        	alert("Review from expert requested successfully");
        }
      },
      error: function() {
        alert('There was some error requesting the review!');
      }
   }
);
		});
	</script>
</body>
</html>