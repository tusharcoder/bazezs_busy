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
		$task_id = 0;
		if(isset($_GET['id'])){
			$task_id = intval($_GET['id']);
		}
		$task_result = mysqli_query($con, "SELECT * FROM task WHERE task_id=$task_id");
		$task_row = mysqli_fetch_array($task_result);
	?>
	<style>
		::placeholder {
			color:black !grey;
		}
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
                <b>Edit task</b>
            </header>
            <div class="panel-body">
				<br>
                <form class="form-horizontal bucket-form" action="operations.php" method="POST">
					<h3 class="text-center" style="color:rgb(27, 147, 225)!important;">Task Overview</h3><hr/>
					<div class="form-group row">
                        <label class="col-sm-2 control-label">Task Title:</label>
                        <div class="col-sm-9">
							<input type="hidden" name="task_id" value="<?php echo $task_id?>">
                            <input type="text" class="form-control" value="<?php echo $task_row['task_title']?>" name="task_title" placeholder="Enter task Title" required>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 control-label">Assigned To:</label>
                        <div class="col-sm-9">
                            <select name="people_id" class='form-control' required>
								<option readonly value="" selected hidden>-- Select One --</option>
							<?php 
								$pe_result = mysqli_query($con, "SELECT * FROM lu_people");
								while($pe_row = mysqli_fetch_array($pe_result)){
							?>
								<option value="<?php echo $pe_row['people_id']?>" <?php if($pe_row['people_id']==$task_row['people_id']) echo 'selected'?>><?php echo htmlspecialchars($pe_row['people_name']) ?></option>
							<?php
								}
							?>
							</select>
                        </div>
                    </div><hr/>
					<div class="form-group row">
                        <label class="col-sm-2 control-label">Status:</label>
						<div class="col-sm-5">
							<div class="funkyradio">
								<div class="funkyradio-primary">
									<input type="radio" name="task_status" value="Green" id="task_status1" <?php if($task_row['task_status']=='Green') echo 'checked'?>>
									<label for="task_status1">Green</label>
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="funkyradio">
								<div class="funkyradio-primary">
									<input type="radio" name="task_status" value="Amber" id="task_status2" <?php if($task_row['task_status']=='Amber') echo 'checked'?>>
									<label for="task_status2">Amber</label>
								</div>
							</div>
						</div>
						<div class="col-sm-5 offset-sm-2">
							<div class="funkyradio">
								<div class="funkyradio-primary">
									<input type="radio" name="task_status" value="Red" id="task_status3" <?php if($task_row['task_status']=='Red') echo 'checked'?>>
									<label for="task_status3">Red</label>
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="funkyradio">
								<div class="funkyradio-primary">
									<input type="radio" name="task_status" value="On-Hold" id="task_status4" <?php if($task_row['task_status']=='On-Hold') echo 'checked'?>>
									<label for="task_status4">On-Hold</label>
								</div>
							</div>
						</div>
                    </div><hr/>
					<div class="form-group row">
                        <label class="col-sm-2 control-label">Task Due:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" value="<?php echo $task_row['task_date']?>" name="task_date">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 control-label">Additional Detail:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="task_detail" placeholder="Enter Additional Detail" ><?php echo $task_row['task_detail']?></textarea>
                        </div>
                    </div>
					<br><br><br>
					<div style="position:fixed;bottom:15px;right:30px;z-index:1">
						<div class="form-group row">
							<div class="">
								<button type="submit" class="btn btn-success btn-lg" name="update_task"><i class="fa fa-check"></i> Update</button>
							</div>
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
</script>
</html>
