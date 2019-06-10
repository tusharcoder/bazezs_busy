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
					<button class="btn btn-primary" data-toggle="modal" data-target="#add_form" style="background:#007bff!important;border:#007bff!important;float:right">Add Result</button>
					
						<div class="modal" id="add_form">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Add Result</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								<form action="operations.php" method="POST">
									<div class="form-group">
										<label for="email">Result Name:</label>
										<input type="text" name="result_name" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="email">Select Type:</label>
										<select class="form-control" name="result_type">
											<option selected disabled>- Select Type -</option>
											<option value="Human">Human</option>
											<option value="Orc">Orc</option>
										</select>
									</div>
									<div class="form-group">
										<label for="email">Total Points:</label>
										<input type="number" name="result_point" class="form-control" required>
									</div>
							  </div>

							  <!-- Modal footer -->
								  <div class="modal-footer">
									<button type="submit" class="btn btn-primary" style="background:#4CAF50 !important; border:#4CAF50 !important" name="add_result">Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								  </div>
								
								</form>
							</div>
						  </div>
						</div>
					
					<br><br>
					<div class="panel-heading">
					 <b>List of Results</b>
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
								<th style="color:black">Result Name</th>
								<th style="color:black">Total Points</th>
								<th style="color:black">Edit</th>
							  </tr>
							</thead>
							<tbody>
								<?php
									$result = mysqli_query($con,"SELECT * FROM results
									");
									while($row=mysqli_fetch_array($result)){
										$result_id = $row['result_id'];
										$result_name = $row['result_name'];
										$result_point = $row['result_point'];
										$result_type = $row['result_type'];
								?>
							  <tr class="">
								<td style="color:black"><?php echo $row['result_name']; ?></td>
								<td style="color:black;"><?php echo $row['result_point']; ?></td>
								
								<td><a data-toggle="modal" data-target="#edit<?=$row['result_id'];?>"><button class="btn btn-md btn-primary" style="background:#007bff!important;border:#007bff!important"><i class="fa fa-edit"></i> Edit</button></a></td>
									
								<div class="modal" id="edit<?=$row['result_id'];?>">
								  <div class="modal-dialog">
									<div class="modal-content">

									  <!-- Modal Header -->
									  <div class="modal-header">
										<h4 class="modal-title">Edit Results</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									  </div>

									  <!-- Modal body -->
									  <div class="modal-body">
										<form action="operations.php" method="POST">
										<input type="hidden" name="result_id" value="<?php echo $row['result_id']?>">
										  <div class="form-group">
											<label for="email">Result Name:</label>
											<input type="text" name="result_name" class="form-control" value="<?php echo $result_name?>" id="email" required>
										  </div>
										  <div class="form-group">
											<label for="email">Select Type:</label>
											<select class="form-control" name="result_type">
												<option selected disabled>- Select Type -</option>
												<option value="Human" <?php if($result_type=='Human') echo 'selected'?>>Human</option>
												<option value="Orc" <?php if($result_type=='Orc') echo 'selected'?>>Orc</option>
											</select>
										  </div>
										  <div class="form-group">
											<label for="email">Total Points:</label>
											<input type="number" name="result_point" class="form-control" value="<?php echo $result_point?>" id="email" required>
										  </div>
									  </div>

									  <!-- Modal footer -->
										  <div class="modal-footer">
											<button type="submit" class="btn btn-primary" style="background:#4CAF50 !important; border:#4CAF50 !important" name="update_result">Submit</button>
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
