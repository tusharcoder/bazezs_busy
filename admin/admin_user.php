<?php session_start();?>
<?php
	include "database.php";
	if(!isset($_SESSION['admin_id'])){
		header("location:login.php");
		echo '<script> window.location.href = "login.php"; </script>';
		exit();
	} 
	
	$time = time();
?>
<!DOCTYPE html>
<head>
	<?php 
		include "header_links.php";
	?>
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
					<button class="btn btn-primary" data-toggle="modal" data-target="#add_form" style="background:#007bff!important;border:#007bff!important;float:right">Create User</button>
					
						<div class="modal" id="add_form">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Create User</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								<form action="operations.php" method="POST">
								  <div class="form-group">
									<label for="text">Full Name:</label>
									<input type="text" name="user_first_name" class="form-control" id="email" required>
								  </div>
								  <div class="form-group">
									<label for="text">User Name:</label>
									<input type="text" name="user_name" class="form-control" id="email" required>
								  </div>
								  <div class="form-group">
									<label for="email">Email Address:</label>
									<input type="email" name="user_email" class="form-control" id="email" required>
								  </div>
								  <div class="form-group">
									<label for="email">User Password:</label>
									<input type="password" name="user_password" class="form-control" id="email" required>
								  </div>
							  </div>

							  <!-- Modal footer -->
								  <div class="modal-footer">
									<button type="submit" class="btn btn-primary" style="background:#4CAF50 !important; border:#4CAF50 !important" name="add_user">Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								  </div>
								
								</form>
							</div>
						  </div>
						</div>
					
					<br><br>
					<div class="panel-heading">
					 <b>List of Users</b>
					</div><br>
					<div>
					</div>
					<div class="table-responsive">
					  <?php if (isset($_GET['e'])){
							echo '<p style="text-align:center; color:red"><b>Email Already Exists!</b></p>';
					  }?>
					  <table class="table" style="font-size:20px;" ui-jq="footable" ui-options='{
							"paging": {
							  "enabled": true
							},
							"filtering": {
							  "enabled": true
							},
							"sorting": {
							  "enabled": true
							}}'>
							<thead>
							  <tr>
								<th style="color:black">Full Name</th>
								<th style="color:black">User Name</th>
								<th style="color:black">Email address</th>
								<th style="color:black">Password</th>
								<th style="color:black">Last session</th>
								<th style="color:black">Edit</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$result = mysqli_query($con,"SELECT * FROM user
									");
									while($row=mysqli_fetch_array($result)){
										$user_id = $row['user_id'];
										$user_first_name = $row['user_first_name'];
										$user_name = $row['user_name'];
										$user_email = $row['user_email'];
										$user_password = $row['user_password'];
										$user_timestamp = $row['user_timestamp'];
								?>
							  <tr class="">
								<td style="color:black"><?php echo $row['user_first_name']; ?></td>
								<td style="color:black"><?php echo $row['user_name']; ?></td>
								<td style="color:black"><?php echo $row['user_email']; ?></td>
								<td style="color:black"><?php echo $row['user_password']; ?></td>
								<td style="color:black"><?php echo date('j F Y H:i:s A', $user_timestamp)?></td>
								
								<td><a data-toggle="modal" data-target="#edit<?=$row['user_id'];?>"><button class="btn btn-md btn-primary" style="background:#007bff!important;border:#007bff!important"><i class="fa fa-edit"></i> Edit</button></a></td>
									
								<div class="modal" id="edit<?=$row['user_id'];?>">
								  <div class="modal-dialog">
									<div class="modal-content">

									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Edit User</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>

									  <!-- Modal body -->
									  <div class="modal-body">
										<form action="operations.php" method="POST">
										<input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
										  <div class="form-group">
											<label for="email">Full Name:</label>
											<input type="text" name="user_first_name" class="form-control" value="<?php echo $user_first_name?>" id="email" required>
										  </div>
										  <div class="form-group">
											<label for="email">User Name:</label>
											<input type="text" name="user_name" class="form-control" value="<?php echo $user_name?>" id="email" required>
										  </div>
										  <div class="form-group">
											<label for="email">Email Address:</label>
											<input type="email" name="user_email" class="form-control" value="<?php echo $user_email?>" id="email" required>
										  </div>
										  <div class="form-group">
											<label for="email">User Password:</label>
											<input type="text" name="user_password" class="form-control" value="<?php echo $user_password?>" id="email" required>
										  </div>
									  </div>

									  <!-- Modal footer -->
										  <div class="modal-footer">
											<button type="submit" class="btn btn-primary" style="background:#4CAF50 !important; border:#4CAF50 !important" name="update_user">Submit</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										  </div>
										
										</form>
									</div>
								  </div>
								</div>
								
							  </tr>
							  <?php
								}
							  ?>
							</tbody>
					  </table>
				</div>
			</div>
		</section>
	</section>

<!--main content end-->
</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
