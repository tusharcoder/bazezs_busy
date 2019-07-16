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
		
		$result = mysqli_query($con,"SELECT * FROM email_setting");
		$row = mysqli_fetch_array($result);
		
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
                Manage Email Settings
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST">
                    <div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Email Subject:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="email_subject" value="<?php echo $row['email_subject']?>" class="form-control"  required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>From Email Setting:</b></label>
                        <div class="col-sm-6">
                            <input type="email" name="email_address" value="<?php echo $row['email_address']?>" class="form-control"  required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>From Name:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="email_from_name" value="<?php echo $row['email_from_name']?>" class="form-control" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>SMTP Host:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="email_smtp_host" value="<?php echo $row['email_smtp_host']?>" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Types of Encryption:</b></label>
                        <div class="col-sm-2">
                            <label class="radio-inline">
							  <input type="radio" name="email_encryption" value="None" <?php if ($row['email_encryption']=='None') echo 'checked'?>> None
							</label>
						</div>
						<div class="col-sm-2">
							<label class="radio-inline">
							  <input type="radio" name="email_encryption" value="SSL" <?php if ($row['email_encryption']=='SSL') echo 'checked'?>> SSL
							</label>
                        </div>
						<div class="col-sm-2">
							<label class="radio-inline">
							  <input type="radio" name="email_encryption" value="TSL" <?php if ($row['email_encryption']=='TSL') echo 'checked'?>> TSL
							</label>
                        </div>
                    </div>
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>SMTP Port:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="email_port" value="<?php echo $row['email_port']?>" class="form-control" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>SMTP Authentication:</b></label>
                        <div class="col-sm-2">
                            <label class="radio-inline">
							  <input type="radio" name="email_authentication" value="No" <?php if ($row['email_authentication']==0) echo 'checked'?>> No
							</label>
						</div>
						<div class="col-sm-2">
                            <label class="radio-inline">
							  <input type="radio" name="email_authentication" value="Yes" <?php if ($row['email_authentication']==1) echo 'checked'?>> Yes
							</label>
						</div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>SMTP Username:</b></label>
                        <div class="col-sm-6">
                            <input type="text" name="email_username" value="<?php echo $row['email_username']?>" class="form-control" required>
                        </div>
                    </div> 
					<div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>SMTP Password:</b></label>
                        <div class="col-sm-6">
                            <input type="password" name="email_password" value="<?php echo $row['email_password']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Admin Email (at which want to receives the mail):</b></label>
                        <div class="col-sm-6">
                            <input type="email" name="admin_email" value="<?php echo $row['admin_email']?>" class="form-control" required>
                        </div>
                    </div> 
					 <div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-6 offset-sm-2">
							<button type="submit" name="update_email" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
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
