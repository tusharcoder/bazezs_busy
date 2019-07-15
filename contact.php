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
	<div class="content">
		<h1 style="margin:50px 0 35px 0; font-size:20px;"><strong>CONTACT US</strong></h1>
		<div id="message">
		<form id="frmContact" action="" method="POST" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2">Subject</label>
			<div class="col-sm-10">
			<select class="form-control conatct-txt" id="subject">
				<option value="Customer Service">Customer Service</option>
				<option value="Request for review">Request for review</option>
				<option value="Certificate Issue">Certificate Issue</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2">Email Address</label>
			<div class="col-sm-10">
				<input type="text" id="email" name="subject" placeholder="Your@email.com" title="Please enter your name" class="form-control conatct-txt" aria-required="true" required>
			</div>
		</div>
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2">Attachment</label>
			<div class="col-sm-10">
				<input type="file" id="attachment" name="subject"  class="form-control conatct-txt">
			</div>
		</div>
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2">Message</label>
			<div class="col-sm-10">
			<textarea id="" name="message" class="form-control conatct-txt" placeholder="How can we help?"></textarea>	
			</div>
		</div>
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2">Captcha</label>
			<div class="col-sm-10 g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>		
		</div>
		<div class="form-group">
			<label class="font-normal lebel control-label col-sm-2"></label>
			<div class="col-sm-10 text-right"><button type="Submit" id="send-message" class="btn btn-primary btn-contact"><strong>SEND</strong></button></div>		
		</div>

			<div id="mail-status"></div>			
			
		</form>
		<div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
		</div>		
	</div><!-- content -->
</div><!-- central -->	
<?php include "footerlinks.php";?>
<script>
	$(document).ready(function (e){
		$("#frmContact").on('submit',(function(e){
			e.preventDefault();
			$("#mail-status").hide();
			$('#send-message').hide();
			$('#loader-icon').show();
			var data = new FormData();
			data.append("attachment",$('input[name=attachment]')[0].files[0]);
			data.append("subject",$('input[name="subject"]').val());
			data.append("email",$('input[name="email"]').val());
			data.append("g-recaptcha-response",$('input[name=attachment]')[0].files[0]);
			data.append("message",$('textarea[name="message"]').val());
			$.ajax({
				url: "do_contact.php",
				type: "POST",
				processData: false,
  				contentType:false,
				data: data,
				success: function(response){
				$("#mail-status").show();
				$('#loader-icon').hide();
				response = JSON.parse(response);
				if(response.type == "error") {
					$('#send-message').show();
					$("#mail-status").attr("class","error");				
				} else if(response.type == "message"){
					$('#send-message').hide();
					$("#mail-status").attr("class","success");							
				}
				$("#mail-status").html(response.text);	
				},
				error: function(){} 
			});
		}));
	});
	</script>
</body>
</html>