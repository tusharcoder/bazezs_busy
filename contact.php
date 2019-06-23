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
		h1, h2 {font-family:"Georgia", Times, serif;font-weight: normal;}
		div#central {margin: 40px 0px 100px 0px;}
		@media all and (min-width: 768px) and (max-width: 979px) {.content {width: 750px;}}
		@media all and (max-width: 767px) {
			body {margin: 0 auto;word-wrap:break-word}
			.content {width:auto;}
			div#central {	margin: 40px 20px 100px 20px;}
		}
		body {font-family: 'Helvetica',Arial,sans-serif;background:#ffffff;margin: 0 auto;-webkit-font-smoothing: antialiased;  font-size: initial;line-height: 1.7em;}	
		input, textarea {width:100%;padding: 15px;font-size:1em;border: 1px solid #A1A1A1;	}
		button {
			padding: 12px 60px;
			background: #5BC6FF;
			border: none;
			color: rgb(40, 40, 40);
			font-size:1em;
			font-family: "Georgia", Times, serif;
			cursor: pointer;	
		}
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
		.g-recaptcha {margin: 0 0 25px 0;}	  
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>	
</head>
<body>
		<?php include "navbar.php";?>

<div id="central">
	<div class="content">
		<h1>Contact Form</h1>
		<div id="message">
		<form id="frmContact" action="" method="POST" novalidate="novalidate">
			<div class="label">Subject:</div>
			<div class="field">
				<input type="text" id="subject" name="subject" placeholder="Subject.." title="Please enter your name" class="required" aria-required="true" required>
			</div>
			<div class="label">Email Address:</div>
			<div class="field">			
				<input type="text" id="email" name="email" placeholder="enter your email address here" title="Please enter your email address" class="required email" aria-required="true" required>
			</div>
			<div class="label">Attachment:</div>
			<div class="field">			
				<input type="file" name="attachment" id="attachment">
				<!-- <input type="text" id="phone" name="phone" placeholder="enter your phone number here" title="Please enter your phone number" class="required phone" aria-required="true" required> -->
			</div>
			<div class="label">Message:</div>
			<div class="field">			
				<textarea id="" name="message" placeholder="How can we help?"></textarea>			
			</div>
			<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>			
			<div id="mail-status"></div>			
			<button type="Submit" id="send-message" style="clear:both;">Send Message</button>
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
			$.ajax({
				url: "do_contact.php",
				type: "POST",
				dataType:'json',
				data: {
				"subject":$('input[name="subject"]').val(),
				"email":$('input[name="email"]').val(),
				"message":$('textarea[name="message"]').val(),
				"g-recaptcha-response":$('textarea[id="g-recaptcha-response"]').val()},				
				success: function(response){
				$("#mail-status").show();
				$('#loader-icon').hide();
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