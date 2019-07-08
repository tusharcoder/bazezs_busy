<?php session_start();
error_reporting(E_ALL);

?>
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

			$l_email_authentication = strtolower($email_authentication);
			if ($l_email_authentication == "no") {
				# code...
				$email_authentication = false;
			}

			if ($l_email_authentication == "yes") {
				# code...
				$email_authentication = true;
			}
			
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
				echo("Some error occurred while updating the prices");
			}
	}	
	header("location:service.php");
	exit();
}

	// add new promotional codes
	if (isset($_POST['update_promotional_codes'])) {
		# updated the promotional codes
		$promotional_code = strtolower($_POST["promotional_code"]);
		$value = $_POST['value'];
		$type = $_POST['type'];
		# new fields
		$limit_usage =  function () use ($_POST){
			if (isset($_POST['limit_usage'])) {
				# code...
				return 1;
			}else{
				return 0;
			}
		};
		$limit_usage = $limit_usage();

		$limit_usage_number_of_times = 0;
		if ($limit_usage) {
			# code...
			try {
				$limit_usage_number_of_times = $_POST["limit_usage_number_of_times"];	
			} catch (Exception $e) {
			}
			
		}

		$limit_by_time = function () use ($_POST){
			if (isset($_POST['limit_by_time'])) {
				# code...
				return 1;
			}else{
				return 0;
			}
		};
		$limit_by_time = $limit_by_time();

		$start_date = $_POST["start_date"];
		$start_time = $_POST["start_time"];
		

		if ($limit_by_time) {
			# code...
			try {
				$end_date = $_POST["end_date"];
			$end_time = $_POST["end_time"];		
			} catch (Exception $e) {
				$end_date = null;
			$end_time = null;
			}
		}else{
				$end_date = null;
			$end_time = null;
		}
		
		$q="insert into promotional_code (promotional_code, value, type, limit_usage, limit_usage_number_of_times, start_date, start_time, limit_by_time, end_date, end_time) values ('$promotional_code', $value, '$type',$limit_usage, $limit_usage_number_of_times,'$start_date','$start_time',$limit_by_time, '$end_date','$end_time')";

		// echo $q;
		// exit;
		if(mysqli_query($con, $q)){
			header("location:view_promotional_codes.php");
		}else{
			var_dump($q);
			throw new exception(mysqli_error($con));
		};


	}


	// edit the promotional codes
	if (isset($_POST['update_promotional_codes_edit'])) {
		# updated the promotional codes
		$promotional_code = strtolower($_POST["promotional_code"]);
		$value = $_POST['value'];
		$type = $_POST['type'];
		# new fields
		$limit_usage =  function () use ($_POST){
			if (isset($_POST['limit_usage'])) {
				# code...
				return 1;
			}else{
				return 0;
			}
		};
		$limit_usage = $limit_usage();

		$limit_usage_number_of_times = 0;
		if ($limit_usage) {
			# code...
			try {
				$limit_usage_number_of_times = $_POST["limit_usage_number_of_times"];	
			} catch (Exception $e) {
					var_dump($e);
			}
			
		}

		$limit_by_time = function () use ($_POST){
			if (isset($_POST['limit_by_time'])) {
				# code...
				return 1;
			}else{
				return 0;
			}
		};
		$limit_by_time = $limit_by_time();

		$start_date = $_POST["start_date"];
		$start_time = $_POST["start_time"];
		

		if ($limit_by_time) {
			# code...
			try {
				$end_date = $_POST["end_date"];
			$end_time = $_POST["end_time"];		
			} catch (Exception $e) {
				$end_date = null;
			$end_time = null;
			}
		}else{
				$end_date = null;
			$end_time = null;
		}
		if(isset($_POST["id"])&& $_POST['id']!=""){
		$q = "UPDATE promotional_code SET promotional_code='$promotional_code', value='$value', type='$type', limit_usage = $limit_usage, limit_usage_number_of_times = $limit_usage_number_of_times, start_date = '$start_date', start_time = '$start_time', limit_by_time = $limit_by_time, end_date = '$end_date', end_time = '$end_time' WHERE id=".$_POST["id"].";"; # need to create the table in the database.
	}
		if(mysqli_query($con, $q)){
			header("location:view_promotional_codes.php");
		}else{
			// var_dump($q);
			throw new exception(mysqli_error($con));
		};


	}

	// delete the promotional codes
	if (isset($_POST['delete_code'])) {
		# updated the promotional codes
	if(isset($_POST["id"])&& $_POST['id']!=""){
		$q = "DELETE from promotional_code WHERE id=".$_POST["id"].";"; # need to create the table in the database.
	}
		if(mysqli_query($con, $q)){
			header("location:view_promotional_codes.php");
		}else{
			var_dump($q);
			throw new exception(mysqli_error($con));
		};


	}

	// delete the promotional codes
	if (isset($_POST['manage_human_orc_icon'])) {
		# updated the promotional codes
		
		// $orc_icon = $_FILES["orc_icon"];
		if (isset($_FILES["human_icon"])) {
			// $human_icon = $_FILES["human_icon"];
			$human_icon_file = $_FILES["human_icon"];
			$name = $human_icon_file['name'];
			list($name, $type) = explode(".",$name);
			$full_name = $name.((string)time()).".".$type;
			$human_dest = "../uploads/".$full_name;
			move_uploaded_file($_FILES["human_icon"]["tmp_name"], $human_dest);
			//insert into database the human icon
			// $q = "insert into human_orc_icon (path,name) values ('".$human_dest."', 'human')";
			// mysql_query($con,$q);
			$q = "select * from icons where id=1";
			
			$result = mysqli_query($con, $q);
			
			if (mysqli_num_rows($result)){
			
				$u_q = "UPDATE icons
SET human = '".$full_name."' WHERE id=1;";
				mysqli_query($con, $u_q);
			
			}else{
			
				$i_q = "INSERT into icons (id,human) values (1,'".$full_name."')";
				mysqli_query($con, $i_q);
			
			}
		}

		if (isset($_FILES["orc_icon"])) {
			// $orc_icon = $_FILES["orc_icon"];

			
			$orc_icon_file = $_FILES["orc_icon"];
			$name = $orc_icon_file['name'];
			list($name, $type) = explode(".",$name);
			
			$full_name = $name.((string)time()).".".$type;
			$orc_dest = "../uploads/".$full_name;
			
			move_uploaded_file($_FILES["orc_icon"]["tmp_name"], $orc_dest);
			//insert into database the orc icon
			// $q = "insert into human_orc_icon (path,name) values ('".$orc_dest."', 'orc')";
			// mysql_query($con,$q);
			$q = "select * from icons where id=1";
			$result = mysqli_query($con, $q);
			
			if (mysqli_num_rows($result)){
			
				$u_q = "UPDATE icons
SET orc = '".$full_name."' WHERE id=1;";
			
				mysqli_query($con, $u_q);
			}else{

				$i_q = "INSERT into icons (id, orc) values (1,'".$full_name."')";
				mysqli_query($con, $i_q);
			
		}
		}
			$_SESSION["success_message"] = "icons updated successfully";
			header("location:manage_human_orc_icon.php");

	}

	if (isset($_POST["manage_personality_icons"])) {
		# manage the personality icons
		$d = $_FILES;
		$personalities = array(
			"B1"=>"Sages",
			"B2"=>"Warrior",
			"B3"=>"War Hero",
			"B4"=>"Mystic",
			"B5"=>"Paladin",
			"B6"=>"Rogue",
			"B7"=>"Miner",
			"B8"=>"Heretic",
			"B9"=>"Artisan",
			"B10"=>"Priest",
			"B11"=>"Assassin",
			"B12"=>"Death Knight",
		);
		foreach ($personalities as $k => $v) {
		$new_name = "";
			# code...
		$ic_dir = "../icons/personality/";
		if(isset($d[$k]) && filesize($d[$k]["tmp_name"]))
		{
			$f = $d[$k];
			$name = $f['name'];
			list($name, $type) = explode(".",$name);
			
			$new_name = $k.".".$type;
			// var_dump($new_name);
			$dest = $ic_dir.$new_name;
			//remove the file if already exist
			if(file_exists($dest)){
				unlink($dest);
			}
			move_uploaded_file($f["tmp_name"], $dest);
			$q = "Update user_personality set user_personality_image='".$new_name."' where user_personality_name="."'".$v."'";
			mysqli_query($con, $q);
			}	
		}

			$_SESSION["success_message"] = "icons updated successfully";
			header("location:manage_personality_icons.php");


	}

	if (isset($_POST["manage_attribute_icons"])) {
		# manage the attribute icons

		$d = $_FILES;
		$strengths = array(
			"C4" =>"Agreeable",
			"C8" =>"Ambitious",
			"C9" =>"Brutal",
			"C5" =>"Charisma",
			"C1" =>"Creative",
			"C12" =>"Elegant",
			"C7" =>"Leadership",
			"C11" =>"Loyal",
			"C3" =>"Openness",
			"C6"=>"Sneaky",
			"C2"=>"Strong",
			"C10"=>"Trusting",
		);

		foreach ($strengths as $k => $v) {
			# code...
			// echo $_FILES;
		$ic_dir = "../icons/attributes/";
		if(isset($d[$k]) && filesize($d[$k]["tmp_name"]))
		{
			$f = $d[$k];
			$name = $f['name'];
			list($name, $type) = explode(".",$name);
			
			$new_name = $k.".".$type;
			$dest = $ic_dir.$new_name;

			//remove the file if already exist
			if(file_exists($dest)){
				unlink($dest);
			}			
			move_uploaded_file($f["tmp_name"], $dest);
			$q = "Update user_attribute set icon='".$new_name."' where user_attribute_name="."'".$v."'";
			mysqli_query($con, $q);
			}	
			
		}
		
			$_SESSION["success_message"] = "icons updated successfully";
			header("location:manage_attribute_icons.php");


	}

	if (isset($_POST["upload_csv_results_file"])) {
		# code...
		$_SESSION["success_message"] = "Results bulk uploaded finished successfully";
		header("location:admin_result.php");		
	}

	
?>




