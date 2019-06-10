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
		padding-top: 5px !important;
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
   </style>
</head>

<body>

		<?php include "navbar.php";?>

        <section class="htc__store__area pt--120 bg__white">
		<center>
			<div class="row">
			  <div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="well">
						<center><p style="font-size:20px;color:red">Select an image to upload.</p></center><br>
						<form action="operations.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="order_id" value="<?php echo $order_id?>">
							<center><img id="output" src="img/camera_avatar.png" class="img-responsive" width="33%"></center><br>
							<center>
								<div class="upload-btn-wrapper">
									<button class="btn">Upload a file</button>
										<input type="file" accept="image/*" onchange="loadFile(event)" id="upload" name="upload_file_name"required>
										<label for="file_default">No File Choosen </label>
										<label for="file_name"><b></b></label>
									<br><br>
								</div>
							</center>
							<button type="submit" name="add_upload_file" class="btn btn-success btn-lg">Next</button>
						</form>
					</div>
				</div>
			</div>
		</center>
        </section>
		
    </div>
	<?php include "footerlinks.php";?>
</body>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
 
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