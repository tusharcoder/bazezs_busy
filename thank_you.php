<?php
require('constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	   <?php include "headerlinks.php";?>

	<title>Contact Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
	.label {margin: 2px 0;}
	.field {margin: 0 0 20px 0;}	
		.content {width: 960px;margin: 0 auto;}
		/* h1, h2 {font-family:"Georgia", Times, serif;font-weight: normal;} */
		div#central {margin: 40px 0px 100px 0px;}
		@media all and (min-width: 768px) and (max-width: 979px) {.content {width: 750px;}}
		@media all and (max-width: 767px) {
			body {margin: 0 auto;word-wrap:break-word}
			.content {width:auto;}
			div#central {	margin: 40px 20px 100px 20px;}
		}
		body {font-family: 'Helvetica',Arial,sans-serif;background:#ffffff;margin: 0 auto;-webkit-font-smoothing: antialiased;  font-size: initial;line-height: 1.7em;}	
		input, textarea {width:100%;padding: 15px;font-size:1em;border: 1px solid #A1A1A1;	}
		
		#message {  padding: 0px 40px 0px 0px; }
		#mail-status {
			padding: 12px 20px;
			width: 100%;
			display:none; 
			font-size: 1em;
			font-family: "Georgia", Times, serif;
			color: rgb(40, 40, 40);
		}
	  .error{background-color: #F7902D;  margin-bottom: 40px;}
	  .success{background-color: #48e0a4; }
		
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>	
</head>
<body>
		<?php include "navbar.php";?>

<div id="central">
	<div class="row">
		<div class="col-sm-2 col-sm-offset-4">
			<img src="./icons/service-type/instant.png" />
		</div>
		<div class="col-sm-4" style="line-height: 2rem; padding: 4rem;">
			<div>
			<p>
			Your request has been submitted successfully. 
		<br/>
We will get back to you within 24 hours. Thank you for your patience.
		</p>	
			</div>
		</div>
		
				
	</div><!-- content -->
</div><!-- central -->	
<?php include "footerlinks.php";?>
</body>
</html>