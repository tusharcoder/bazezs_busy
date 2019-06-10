<?php session_start();?>
<?php
	include "database.php";
	
	// add user selection
	
	if(isset($_POST['add_user_selection'])){
		//print_r($_POST); exit();
		$order_id = 'IN'.time();
		$order_time = time();
		$user_selection = $_POST['user_selection'];
		mysqli_query($con, "INSERT INTO orders SET order_id='$order_id', order_time=$order_time ,user_selection='$user_selection'");
		$_SESSION['order_id'] = $order_id;
		header("location:service.php");
		exit();
	}
	
	// add Order Service
	
	if(isset($_POST['add_order_service_id'])){
		//print_r($_POST); exit();
		$order_id = $_POST['order_id'];
		$order_service_id = $_POST['order_service_id'];
		mysqli_query($con, "UPDATE orders SET order_service_id=$order_service_id WHERE order_id='$order_id'");
		header("location:personality.php");
		exit();
	}
	
	// add User Personality
	
	if(isset($_POST['add_user_personality'])){
		//print_r($_POST); exit();
		$order_id = $_POST['order_id'];
		$user_personality_id = $_POST['user_personality_id'];
		mysqli_query($con, "UPDATE orders SET user_personality_id=$user_personality_id WHERE order_id='$order_id'");
		header("location:attribute.php");
		exit();
	}
	
	// add User Strength
	
	if(isset($_POST['add_user_strength'])){
		//print_r($_POST); exit();
		$order_id = $_POST['order_id'];
		$order_service_id = $_POST['order_service_id'];
		mysqli_query($con, "DELETE FROM user_order_strength WHERE order_id='$order_id'");
		
		for($i=0;$i<sizeof($_POST['user_strength_id']);$i++){
			$user_strength_id = $_POST['user_strength_id'][$i];
			mysqli_query($con, "INSERT INTO user_order_strength SET order_id='$order_id', user_strength_id=$user_strength_id");	
		}
		
		if ($order_service_id==1){
			header("location:instant_load.php");
			exit();
		} else if($order_service_id==2){
			header("location:signature1.php");
			exit();
		}  else if($order_service_id==3){
			header("location:fileupload.php");
			exit();
		} 
	}
	
	// Add custom Signature 1
	
	if(isset($_POST['add_signature1'])){
		//print_r($_POST); exit();
		$order_id = $_POST['order_id'];
		$dataurl = $_POST['dataurl'];
		
		$filename = time().'_'.rand(1111,9999).'.jpg';
		//$target = 'files/'.$filename;
		//move_uploaded_file($_FILES['custom_signature_file']['tmp_name'], $target);
		
		$stmt = mysqli_prepare($con, "INSERT INTO custom_signature SET order_id='$order_id', custom_signature_file='$filename', custom_signature_dataurl=?");
		mysqli_stmt_bind_param($stmt, 's', $dataurl);
		mysqli_stmt_execute($stmt);
		
		header("location:signature2.php");
		exit();
	}
	
	// Add custom Signature 2
	
	if(isset($_POST['add_signature2'])){
		$order_id = $_POST['order_id'];
		$dataurl = $_POST['dataurl'];
		
		$filename = time().'_'.rand(1111,9999).'.jpg';
		//$target = 'files/'.$filename;
		//move_uploaded_file($_FILES['custom_signature_file']['tmp_name'], $target);
		
		$stmt = mysqli_prepare($con, "INSERT INTO custom_signature SET order_id='$order_id', custom_signature_file='$filename', custom_signature_dataurl=?");
		mysqli_stmt_bind_param($stmt, 's', $dataurl);
		mysqli_stmt_execute($stmt);
		
		header("location:signature3.php");
		exit();
	}
	
	// Add custom Signature 3
	
	if(isset($_POST['add_signature3'])){
		$order_id = $_POST['order_id'];
		$dataurl = $_POST['dataurl'];
		
		$filename = time().'_'.rand(1111,9999).'.jpg';
		//$target = 'files/'.$filename;
		//move_uploaded_file($_FILES['custom_signature_file']['tmp_name'], $target);
		
		$stmt = mysqli_prepare($con, "INSERT INTO custom_signature SET order_id='$order_id', custom_signature_file='$filename', custom_signature_dataurl=?");
		mysqli_stmt_bind_param($stmt, 's', $dataurl);
		mysqli_stmt_execute($stmt);
		
		header("location:custom_load.php");
		exit();
	}
	
	// Add File Upload
	
	if(isset($_POST['add_upload_file'])){
		//print_r($_POST); exit();
		$order_id = $_POST['order_id'];
		
		$filename = time().'_'.rand(1111,9999).'.jpg';
		$target = 'files/'.$filename;
		move_uploaded_file($_FILES['upload_file_name']['tmp_name'], $target);
		
		mysqli_query($con, "INSERT INTO upload_file SET order_id='$order_id', upload_file_name='$filename'");
		
		header("location:file_load.php");
		exit();
	}
	
	
?>