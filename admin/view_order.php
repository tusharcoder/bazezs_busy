<?php session_start();?>
<?php
	include "database.php";
	if(!isset($_SESSION['admin_id'])){
		header("location:login.php");
		echo '<script> window.location.href = "login.php"; </script>';
		exit();
	} 
	
	$order_id = 0;
	if(isset($_GET['id'])){
		$order_id = strval($_GET['id']);
	} else {
		header("location:index.php");
		exit();
	}
	
	$order_res = mysqli_query($con, "SELECT * FROM orders INNER JOIN user_personality ON orders.user_personality_id = user_personality.user_personality_id WHERE order_id='$order_id' AND order_payment_success=1");
	$order_row = mysqli_fetch_array($order_res);
	
	$time = time();
?>
<!DOCTYPE html>
<head>
	<?php 
		include "header_links.php";
	?>
	<style>
		.order-table td {
			padding:6px;
		}
	</style>
</head>
<body>
<section id="container">
	<?php 
		include "sidebar.php";
		include "header.php";
	?>
<!--sidebar end-->
<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<div class="table-agile-info">
				<div class="panel">
					
					<div class="panel-heading">
					 <b>ORDER <?php echo $order_id ?></b>
					</div><br>
				<table class="table">
					<tr>
						<th>Order ID</th>
						<td><?php echo $order_id ?></td>
						<th>Order Date</th>
						<td><?php echo date('d F Y',$order_row['order_time']) ?></td>
						<th>Order Time</th>
						<td><?php echo date('h:i A',$order_row['order_time']) ?></td>
						<th>Order Amount</th>
						<td><?php echo $order_row['order_amount']; ?></td>
						<th>Order Transaction Status</th>
						<td><?php echo $order_row['order_payment_success']==="1"?"Success":"Failed"; ?></td>
					</tr>
					<tr>
						<th>Customer Name</th>
						<td><?php echo $order_row['user_name'] ?></td>
						<th>Email</th>
						<td><?php echo $order_row['user_email'] ?></td>
						<th>IP Address</th>
						<td><?php echo $order_row['user_ip'] ?></td>
					</tr>
				</table>
				<h3>Personality</h3>
				<table class="order-table">
					<tr>
						<td><img src="../icons/personality/<?php echo $order_row['user_personality_image'] ?>" style="width:60px;border-radius:50%;"></td>
						<td><b><?php echo $order_row['user_personality_name'] ?></b></td>
					</tr>
				</table>
				<br>
				<h3>Attributes</h3>
				<table class="order-table">
					<?php
						$user_order_strength_res = mysqli_query($con, "SELECT * FROM user_order_strength INNER JOIN user_strength ON user_order_strength.user_strength_id =user_strength.user_strength_id WHERE order_id = '$order_id'");
						while ($user_order_strength_row = mysqli_fetch_array($user_order_strength_res)) {
					?>
					<tr>
						<td><img src="../icons/attributes/<?php echo $user_order_strength_row['user_strength_image'] ?>" style="width:60px;border-radius:50%;"></td>
						<td><b><?php echo $user_order_strength_row['user_strength_name'] ?></b></td>
					</tr>
					<?php } ?>
				</table>
				<h3>Order Results</h3>
				<table class="order-table">
					<?php
						$q = mysqli_query($con, "SELECT * FROM order_results WHERE order_id = '$order_id'");
						while ($row = mysqli_fetch_array($q)) {
					?>
					<tr>
										<td><img src="../icons/index-page/<?php echo $row['result_image'] ?>" class="img-circle" style="width:75px"></td>
										
										<td style="width:80%;"><b><?php echo $row['result_name']; ?></b></td>
									</tr>
					<?php } ?>
				</table>
				<?php if ($order_row['order_service_id']==2) { ?>
					<br><br>
					<div class="row">
					<?php
						$signature_res = mysqli_query($con, "SELECT * FROM custom_signature WHERE order_id = '$order_id'");
						$count=0;
						while ($signature_row = mysqli_fetch_array($signature_res)) {
							$count++;
					?>
						<div class="col-sm-4">
							<h3 class="text-center">Signature <?php echo $count ?></h3><br>
							<img src="<?php echo $signature_row['custom_signature_dataurl'] ?>" style="width:100%;">
						</div>
					<?php } ?>
					</div>
				<?php } ?>
				<?php if ($order_row['order_service_id']==3) { ?>
					<br><br>
					<h3 class="text-center">File Uploaded</h3><br>
					<div class="row">
					<?php
						$upload_file_res = mysqli_query($con, "SELECT * FROM upload_file WHERE order_id = '$order_id'");
						while ($upload_file_row = mysqli_fetch_array($upload_file_res)) {
					?>
						<div class="col-sm-4 offset-sm-4">
							
							<img src="../files/<?php echo $upload_file_row['upload_file_name'] ?>" style="width:100%;">
						</div>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	</section>

<!--main content end-->
</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
