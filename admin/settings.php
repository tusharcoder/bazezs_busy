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
		$result = mysqli_query($con,"SELECT * FROM admin WHERE admin_id=$admin_id");
		$row = mysqli_fetch_array($result);
		$admin_name = $row['admin_name'];
		$admin_email = $row['admin_email'];
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
                Settings
            </header><br>
            <div class="panel-body">
				<?php if (isset($_GET['s'])){
					echo '<p style="text-align:center; color:green"><b>Change Successfully!</b></p>';
				}?><br>
                <form class="form-horizontal bucket-form" action="operations.php" method="POST">
					<input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                    <div class="form-group row">
                        <label class="col-sm-2 offset-sm-1 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $admin_name?>" name="admin_name">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 offset-sm-1 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" value="<?php echo $admin_email?>" name="admin_email">
                        </div>
                    </div>
					 <div class="form-group row">
						<div class="col-sm-8 offset-sm-3">
							<button type="submit" class="btn btn-success" name="update_admin">Update</button>
						</div>
                    </div>
                </form>
            </div>
        </section>
            </div>
			<div class="col-lg-12">
                 <section class="panel">
            <header class="panel-heading">
                Change Password
            </header>
            <div class="panel-body">
				<?php if (isset($_GET['e'])){
					echo '<p style="text-align:center; color:red"><b>Incorrect Old Password!</b></p>';
				}?>
				<?php if (isset($_GET['m'])){
					echo "<p style='text-align:center; color:red'><b>Passwords didn't Match!</b></p>";
				}?>
				<?php if (isset($_GET['p'])){
					echo "<p style='text-align:center; color:green'><b>Password Change Successfully</b></p>";
				}?><br><br>
                <form class="form-horizontal bucket-form" action="operations.php" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 offset-sm-1 control-label">Old Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="admin_old_password" placeholder="Enter old password" required>
                        </div>
                    </div>
					
					<div class="form-group row">
                        <label class="col-sm-2 offset-sm-1 control-label">New Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="admin_password" placeholder="Enter new password" required>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 offset-sm-1 control-label">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" placeholder="Enter confirm password" name="admin_confirm_password" required>
                        </div>
                    </div>
					 <div class="form-group row">
						<div class="col-sm-8 offset-sm-3">
							<button type="submit" class="btn btn-success" name="update_admin_password">Update</button>
						</div>
                    </div>
                </form>
            </div>
        </section>
            </div>
        </div>
</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
