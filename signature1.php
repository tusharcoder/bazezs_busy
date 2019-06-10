<?php session_start();?>
<?php
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   <?php include "headerlinks.php";?>
   <style>
	.pt--120 {
		padding-top: 30px !important;
	}
		.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 5px 15px;
  border-radius: 8px;
  font-size: 15px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.btn-success {
  border: 2px solid #5cb85c;
  color: white;
  background-color: #5cb85c;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}
.row {
	margin-top:-29px;
}
   </style>
</head>
<body>
<?php include "navbar.php";?>
<center><p style="font-size:20px;color:red">Write in the first signature 1</p></center><br>
<?php include "signature_pad.php";?><br>
		<center>
			<form action="operations.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="order_id" value="<?php echo $order_id?>">
					<div class="upload-btn-wrapper">
						<!--<button class="btn">Upload a file</button>
							<input type="file" accept="image/png" id="upload" name="custom_signature_file"required>
							<label for="file_default">No File Choosen </label>
							<label for="file_name"><b></b></label>-->
					</div><br>
					<textarea style="display:none" name="dataurl" id="dataurl"></textarea>
					<button type="submit" id="create_signature" name="add_signature1" class="btn btn-success btn-lg" style="">Next</button>
			</form>
		</center><br><br>
	<?php include "footerlinks.php";?>
</body>
<?php include "signature_script.php"; ?>
<script>
	$('#upload').change(function() {
    var filename = $('#upload').val();
    if (filename.substring(3,11) == 'fakepath') {
        filename = filename.substring(12);
    } // For Remove fakepath
    $("label[for='file_name'] b").html(filename);
    $("label[for='file_default']").text('');
});
</script>
</html>