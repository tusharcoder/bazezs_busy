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
        $services = array("instant"=>0.00, "custom"=>0.00,"upload"=>0.00);
        foreach (["instant","custom","upload"] as $value) {
            $result = mysqli_query($con,"SELECT * FROM services where service_name = '$value'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount){
            $service = mysqli_fetch_array($result);
            $services[$value]=$service["service_price"];
        }
            else{
                $insert = mysqli_query($con,"INSERT INTO services (service_name, service_price) VALUES('$value','0.00')");
                if(!$con->query($insert)){
                    throw new Exception("DB Error: instant service record not available nor able to create");
                }
            }
        }

		
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
                        <label class="col-sm-3 control-label"><b>Instant Service:</b></label>
                        <div class="col-sm-6">
                            <input type="number" name="instant" value="<?php echo($services['instant']); ?>" class="form-control" step="any" min="0" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Custom Service:</b></label>
                        <div class="col-sm-6">
                            <input type="number" name="custom" value="<?php echo($services['custom']); ?>" class="form-control"  step="any" min="0" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Upload Service:</b></label>
                        <div class="col-sm-6">
                            <input type="number" name="upload" value="<?php echo($services['upload']); ?>" class="form-control" step="any" min="0" required>
                        </div>
                    </div> 
					 <div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-6 offset-sm-2">
							<button type="submit" name="update_services" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
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
