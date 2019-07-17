<?php session_start();?>
<!DOCTYPE html>
<head>
	<?php 
		include "header_links.php";
		include "database.php";
		if(!isset($_SESSION['admin_id'])){
			header("location:login.php");
			echo '<script> window.location.href = "login.php"; </script>';
			exit();
		} 
		$admin_id = intval($_SESSION['admin_id']);
		
		$result = mysqli_query($con,"SELECT * FROM stripe_key");
		$row = mysqli_fetch_array($result);
		$stripe_test_publisher_key = $row['stripe_test_publisher_key'];
		$stripe_test_secret_key = $row['stripe_test_secret_key'];
		$stripe_live_publisher_key = $row['stripe_live_publisher_key'];
		$stripe_live_secret_key = $row['stripe_live_secret_key'];
		$change_price = $row['change_price'];
	?>

    <style type="text/css">
        /*switch style */
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/*end switch style */
    </style>
</head>
<body>
<section id="container">
	<?php 
		include "sidebar.php";	
		include "header.php";	
	?>
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                 <section class="panel">
            <header class="panel-heading">
                Manage Stripe Keys
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Live Payment Gateway:</b></label>
                        <div class="col-sm-6">
                        <!-- Rounded switch -->
<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                        </div>
                    </div>
                    <div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Test Secret Key:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="stripe_test_secret_key" class="form-control" value="<?php echo $stripe_test_secret_key?>" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Test Publisher Key:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="stripe_test_publisher_key" class="form-control" value="<?php echo $stripe_test_publisher_key?>" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Live Publisher Key:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="stripe_live_publisher_key" class="form-control" value="<?php echo $stripe_live_publisher_key?>" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Live Secret Key:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="stripe_live_secret_key" class="form-control" value="<?php echo $stripe_live_secret_key?>" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Change Price:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="change_price" class="form-control" value="<?php echo $change_price?>" required>
                        </div>
                    </div>  
					 <div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-6 offset-sm-2">
							<button type="submit" name="update_keys" class="btn btn-primary">Update</button>
						</div>
                    </div>
                </form>
            </div>
        </section>
            </div>
</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
