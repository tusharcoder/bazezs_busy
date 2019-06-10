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
<html lang="en">
<head>
   <?php include "headerlinks.php";?>
   <style>
	.pt--120 {
		padding-top: 90px 0 !important;
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
        <!-- End Header Style -->
        
        <div class=""></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->

        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
        <section class="ptb--120" style="padding:90px 0 !important">
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
				<button type="submit" name="add_order_service_id" id="btn" class="btn btn-success btn-lg" disabled>Next</button></center>
			</form>
        </section>
    </div>
	<?php include "footerlinks.php";?>
</body>
<script>
	function test(elem, no){
		$('.service').css("border","none");
		$('.'+elem).css("border","3px solid red");
		$('#service_select').val(no);
		var btn = document.getElementById('btn');
			if(elem.value!=''){
				btn.disabled = false;
			} else {
				 btn.disabled = true;
		}
	}
	//document.getElementById('build').onclick = function () {
    //window.location.href = 'payment.php';
	//}
</script>
</html>