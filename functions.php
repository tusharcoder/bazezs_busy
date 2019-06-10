<?php
	function getUserIpAddr(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
?>

<?php
	//$ip = $_SERVER['REMOTE_ADDR']?:
	//($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
?>