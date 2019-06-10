<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<?php 
		include "header_links.php";
		include "database.php";
		if(isset($_SESSION['admin_id'])){
			echo '<script> window.location.href = "index.php"; </script>';
			header("location:index.php");
			exit();
		}
	 ?>
	<style>
		html, body {
			background-image:url('images/bg.png');
			background-repeat:no-repeat;
			background-position:center center;
			background-size:cover;
			background-attachment:fixed;
		}
	</style>
</head>
	<?php
		$error = "";
		if(isset($_POST['admin_login'])){
			$admin_email = $_POST['admin_email'];
			$admin_password = $_POST['admin_password'];
			$result = mysqli_query($con,"SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'");
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_array($result);
				$_SESSION['admin_id']= $row['admin_id'];
				$_SESSION['admin_name']= $row['admin_name'];
				echo '<script> window.location.href = "index.php"; </script>';
				header("location:index.php"); exit();
			} else {
				$error = '<p style="padding:6px; color:red"><b>Invalid Email or Password</b></p>';
			}
		}
	?>
<body>
<div class="log-w3">
<div class="w3layouts-main" style="background:rgb(79,54,107) !important;border-radius:16px">
	<h2 style="color:#fff !important;">Admin</h2>
		<form method="post" style="opacity:1">
			<?php echo $error; ?>
			<input type="email" style="border-radius:10px" class="ggg" name="admin_email" placeholder="Enter Email" required="" autofocus>
			<input type="password" style="border-radius:10px" class="ggg" name="admin_password" placeholder="Enter Password" required="">
				<input type="submit" style="background:white !important;color:black !important;border-radius:10px" value="Log In" name="admin_login">
		</form>
</div>
</div>

</body>
</html>
