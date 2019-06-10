<?php session_start(); ?> 
<!DOCTYPE html>
<head>
	<?php 
		include "header_links.php";
		include "database.php";
		if(!isset($_SESSION['admin_id'])){
			echo '<script> window.location.href = "login.php"; </script>';
			exit();
		}
	?>
	<style>
	.market-update-right i.fa {
		font-size: 2.5em;
		color: #fff;
		text-align: left;
	}
	#example_wrapper {
		display:block !important;
	}
	.form-inline label {
		display:inline !important;
	}
	th {
		color:black !important;
		font-size:14px !important;
	}
	td {
		color:black !important;
		font-size:14px !important;
	}
	</style>
	<link rel="stylesheet" href="css/dt1.css">
	<link rel="stylesheet" href="css/dt2.css">
</head>
<body>
<section id="container">
<?php include "header.php";?>
<?php include "sidebar.php";?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper"><br>
	<section class="panel">
            <header class="panel-heading" style="padding: 2px 15px !important;">
                Manage Email Settings
            </header>
	</section>
		<div class="table table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Order #</th>
						<th>Customer Name</th>
						<th>Selection</th>
						<th>Order Type</th>
						<th>Order Date</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$result = mysqli_query($con, "SELECT * FROM orders INNER JOIN order_service ON orders.order_service_id = order_service.order_service_id WHERE order_payment_success=1 ORDER BY order_time DESC");
					while($row = mysqli_fetch_array($result)){
				?>
					<tr>
						<td><?php echo $row['order_id']?></td>
						<td><?php echo $row['user_name']?></td>
						<td><?php echo $row['user_selection']?></td>
						<td><?php echo $row['order_service_name']?></td>
						<td style="color:black"><?php echo date('j F Y H:i:s A', $row['order_time'])?></td>
						<td style="color:black"><a href="view_order.php?id=<?php echo $row['order_id']?>"><button class="btn btn-success">View Order</button></a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
</section>
</section>
<!--main content end-->
</section>
<?php include "footerlinks.php"; ?>
<!-- morris JavaScript -->	
<!-- calendar -->
	<script type="text/javascript" src="js/dt1.js"></script>
	<script type="text/javascript" src="js/dt2.js"></script>
	<script type="text/javascript" src="js/dt3.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
	<!-- //calendar -->
</body>
</html>
