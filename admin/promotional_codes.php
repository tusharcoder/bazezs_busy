<?php session_start();?>
<!DOCTYPE html>
<head>
	<?php 
    error_reporting(E_ALL);
		include "header_links.php";
		include "database.php";
		if(!isset($_SESSION['admin_id'])){
			header("location:login.php");
			echo '<script> window.location.href = "login.php"; </script>';
			exit();
		} 
		$admin_id = intval($_SESSION['admin_id']);
        

		
	?>
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
                Manage Service Prices
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST">
                    <div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Enter the Promotional code:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="promotional_code" value="" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Type</b></label>
                        <div class="col-sm-6">
                            <select name="type" required class="form-control">
                                <option value="">Select type</option>
                                <option value="percentage">Percentage</option>
                                <option value="fixed_value">Fixed Amount</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Value:</b></label>
                        <div class="col-sm-6">
                            <input type="number" name="value" value="" class="form-control" step="any" min="0" required>
                        </div>
                    </div> 
					 <div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-6 offset-sm-2">
							<button type="submit" name="update_promotional_codes" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
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
