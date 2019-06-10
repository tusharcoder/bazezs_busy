<!doctype html>
<html class="no-js" lang="en">
<head>
   <?php include "headerlinks.php";?>
   <style>
	.circle {
	  display: inline-flex;         /* use this so theat items are on same line */
									
	  justify-content: center;      /* Cy using aCove, you can vertical and horizontal align without the need for a stupid line-height hack*/
	  align-items: center;
	  text-align: center;
	  
	  margin-right: 10px;
	  width: 90px !important;
	  height: 90px  !important;
	  font-size: 18px  !important;
	  border-radius: 50%;
	  color: #fef;
	  background: white;
	  color:black;
	  //border:1px solid white  !important;
	  cursor:pointer;
}
.ptb--120 {
    padding: 50px 0 !important;
}

   </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
		<?php include "navbar.php";?>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        
        </div>
        </div>
		
		<div class="htc__brand__area bg__white ptb--80">
            <div class="container">
			<form action="operations.php" method="POST">
				<input type="hidden" name="order_id" value="<?php echo $order_id?>">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2" style="">
					  <center><img src="icons/service-type/instant.png" class="service instant" onclick="test('instant', 1)" alt="Instant" id="build" style="width:170px;border-radius:50% !important"><br><br>
					  <b>Instant</b></center>
					</div>
					<div class="col-sm-2">
					  <center><img src="icons/service-type/custom.png" alt="Custom" class="service custom" onclick="test('custom', 2)" style="width:170px;border-radius:50% !important"><br><br>
					  <b>Custom</b></center>
					</div>
					<div class="col-sm-2">
					  <center><img src="icons/service-type/upload.png" alt="Upload" class="service upload" onclick="test('upload', 3)" style="width:170px;border-radius:50% !important"><br><br>
					  <b>Upload</b></center>
					</div>
				</div><br>
				<center><input type="hidden" name="order_service_id" id="service_select">
				<button type="submit" name="add_order_service_id" id="btn" class="btn btn-success btn-lg" disabled>Next</button></center><br>
			</form>
            </div>
				
        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
        <section class=" ptb--120 bg__white">
            
        </section>
		
        </div>
</body>
  <?php include "footerlinks.php";?>
<script>
	function test(elem, no, name){
		//alert(no);
		$('.circle').css("border","none");
		$('.'+elem).css("border","3px solid red");
		$('#circle_select').val(no);
		var btn = document.getElementById('btn');
			if(elem.value!=''){
				btn.disabled = false;
			} else {
				 btn.disabled = true;
			}
		$('#user_selection').val(name);

	}
</script>
</html>