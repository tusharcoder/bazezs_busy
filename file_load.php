<?php session_start();?>
<?php
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   <?php include "headerlinks.php";?>
   <style>
	.pt--120 {
		padding-top: 30px !important;
	}
	.loader {
	  border: 16px solid grey;
	  border-radius: 50%;
	  border-top: 16px solid #ccc;
	  width: 120px;
	  height: 120px;
	  -webkit-animation: spin 2s linear infinite; /* Safari */
	  animation: spin 2s linear infinite;
	}

	/* Safari */
	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
   </style>
</head>

<body>

		<?php include "navbar.php";?>

        <section class="htc__store__area pt--120 bg__white">
		<center>
		<div class="row">
		  <div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="well">
					<div class="loader"></div><br>
					<p style="color:grey;font-size:18px">Loading Please Wait...</p>
				</div>
			</div>
		</div>
		</center>
        </section>
		
    </div>
	<?php include "footerlinks.php";?>
</body>
<script>
	setTimeout(function(){
		window.location.href = 'payment.php';
	},3000);
</script>
</html>