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
                Manage Human and Orc Icons
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Human Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="human_icon" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Orc Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="orc_icon" required>
                        </div>
                    </div>
					
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="manage_human_orc_icon" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['success_message'])) { ?>
                    	<div class="alert alert-success">
                    	<?php echo $_SESSION['success_message']; unset($_SESSION['success_message']);?>
                    </div>
                    <?php } ?>
                    
                </form>
            </div>
        </section>
            </div>


</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
