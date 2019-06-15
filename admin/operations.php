<?php session_start();?>
<?php
	include "database.php";
	// update setting
		
		if(isset($_POST['update_admin'])){
		$admin_id = $_POST['admin_id'];
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		mysqli_query($con,"UPDATE admin set admin_name='$admin_name', admin_email='$admin_email' WHERE admin_id=$admin_id");
		header("location:settings.php?s=1");
		exit();
		}
		// change password
		
		if (isset($_POST['update_admin_password'])){
			//echo print_r($_POST); exit();
			$admin_id = $_SESSION['admin_id'];
			$admin_old_password = $_POST['admin_old_password'];
			$admin_password = $_POST['admin_password'];
			$admin_confirm_password = $_POST['admin_confirm_password'];
			$result = mysqli_query($con, "SELECT * FROM admin WHERE admin_id=$admin_id AND admin_password='$admin_old_password'");
			if (mysqli_num_rows($result)==0){
				header("location:settings.php?e=1");
				exit();
			}else if ($admin_password!=$admin_confirm_password){
				header("location:settings.php?m=1");
				exit();
			} else {
				mysqli_query($con,"UPDATE admin set admin_password='$admin_password' WHERE admin_id=$admin_id");
				header("location:settings.php?p=1");
				exit();
			}
		}
		
	// Update Keys
	
		if(isset($_POST['update_keys'])){
			//print_r($_POST); exit();
			$stripe_test_publisher_key = $_POST['stripe_test_publisher_key'];
			$stripe_test_secret_key = $_POST['stripe_test_secret_key'];
			$stripe_live_publisher_key = $_POST['stripe_live_publisher_key'];
			$stripe_live_secret_key = $_POST['stripe_live_secret_key'];
			$change_price = $_POST['change_price'];
			
			$stmt = mysqli_prepare($con, "UPDATE stripe_key SET stripe_test_publisher_key =?, stripe_test_secret_key=?, stripe_live_publisher_key=?, stripe_live_secret_key=?, change_price='$change_price'");
			mysqli_stmt_bind_param($stmt,'ssss',$stripe_test_publisher_key,$stripe_test_secret_key,$stripe_live_publisher_key,$stripe_live_secret_key);
			mysqli_stmt_execute($stmt);
			header("location:admin_stripe.php");
			exit();
		}

	
	// Update Email Setting
	
		if(isset($_POST['update_email'])){
			//print_r($_POST); exit();
			$email_subject = $_POST['email_subject'];
			$email_address = $_POST['email_address'];
			$email_from_name = $_POST['email_from_name'];
			$email_smtp_host = $_POST['email_smtp_host'];
			$email_encryption = $_POST['email_encryption'];
			$email_port = $_POST['email_port'];
			$email_authentication = $_POST['email_authentication'];
			$email_username = $_POST['email_username'];
			$email_password = $_POST['email_password'];
			
			$stmt = mysqli_prepare($con, "UPDATE email_setting SET email_subject=?,  email_address=?, email_from_name=?, email_smtp_host=?, email_port=?,  email_username=?, email_password=?, email_encryption='$email_encryption', email_authentication='$email_authentication'");
			mysqli_stmt_bind_param($stmt,'sssssss',$email_subject,$email_address,$email_from_name,$email_smtp_host,$email_port,$email_username,$email_password);
			mysqli_stmt_execute($stmt);
			header("location:admin_email.php");
			exit();
		}
		
		
	// Add user
	
	if(isset($_POST['add_user'])){
		$user_first_name = $_POST['user_first_name'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_timestamp = time();
		
		$match = mysqli_query($con, "SELECT * FROM user WHERE user_email='$user_email'");
		if(mysqli_num_rows($match)>0){
			header("location:admin_user.php?e=1"); exit();
		}
		
		mysqli_query($con, "INSERT INTO user SET user_first_name='$user_first_name', user_name='$user_name', user_email='$user_email', user_password='$user_password', user_timestamp=$user_timestamp");
		header("location:admin_user.php");
		exit();
	}

	// Update User	
	
	
	if(isset($_POST['update_user'])){
		$user_id = $_POST['user_id'];
		$user_first_name = $_POST['user_first_name'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_timestamp = time();
		
		mysqli_query($con, "UPDATE user SET user_first_name='$user_first_name', user_name='$user_name', user_email='$user_email', user_password='$user_password', user_timestamp=$user_timestamp WHERE user_id=$user_id");
		header("location:admin_user.php");
		exit();
	}
	
	// Add Result
	
	
	if(isset($_POST['add_result'])){
		$result_name = $_POST['result_name'];
		$result_point = $_POST['result_point'];
		$result_type = $_POST['result_type'];
		$result_image = '';
		
		if($result_type=='Human'){
			$result_image = 'human.png';
		} else {
			$result_image = 'orc.png';
		}
		
		mysqli_query($con, "INSERT INTO results SET result_name='$result_name', result_point=$result_point, result_type='$result_type', result_image='$result_image'");
		header("location:admin_result.php");
		exit();
	}
	
	// Edit Result
	
	if(isset($_POST['update_result'])){
		$result_id = $_POST['result_id'];
		$result_name = $_POST['result_name'];
		$result_point = $_POST['result_point'];
		$result_type = $_POST['result_type'];
		$result_image = '';
		
		if($result_type=='Human'){
			$result_image = 'human.png';
		} else {
			$result_image = 'orc.png';
		}
		
		
		mysqli_query($con, "UPDATE results SET result_name='$result_name', result_point=$result_point, result_type='$result_type', result_image='$result_image' WHERE result_id=$result_id");
		header("location:admin_result.php");
		exit();
	}

	//Edit the service prices
	if(isset($_POST['update_services'])){
		$services = array('upload'=> $_POST['upload'],
		'custom'=> $_POST['custom'],
		'instant'=> $_POST['instant']);
		foreach($services as $key => $value){
			if(mysqli_query($con, "UPDATE services SET service_price='$value' WHERE service_name='$key'")){
				continue;
			}
			else{
				echo(mysqli_error($con));
			}
	}	
	header("location:service.php");
	exit();
}
	
?>




