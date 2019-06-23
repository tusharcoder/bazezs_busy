<?php session_start();?>
<?php
	include "database.php"; // already included in another file
	function get_discount($promocode, $value){
		global $con;

		$q = "select * from promotional_code where promotional_code = '".strtolower($promocode)."';";
		$result = mysqli_query($con, $q);
		if(mysqli_num_rows($result)>0){

			$result = mysqli_fetch_assoc($result);
			// echo $result;
			$type = $result["type"];
			if ($type == "percentage")
				return (float)($result["value"]/100)*$value;
			else if ($type=="fixed_value"){
			// echo $result;
			if ($value<$result["value"])
				throw new Exception("value of the order is less than the discount");
			return $result["value"];
		}
		}
	}

	// $promocode = $_POST["promocode"];
	// $value = $_POST["value"];
	// echo get_discount($promotional_code, $value);

	?>