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

	.card {
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
		min-height: 15rem;
		padding: 1.5rem;
		width: 15rem;
		border-bottom: #3f99ef 8px solid;
		position: relative;
	}

	.card .header{
		font-size: 1.1rem;
		font-weight: bold;
		color: #3f99ef;
		padding: 1rem;
	}

	.card .price {
		color: #839bb0;
		font-size: 1rem;
		font-weight: bold;
	}

	.card .options {
		padding: 1rem;
	}

	.card .options li{
			text-align: left;
		}
	.card .options li[class=active] i{
		color:#3f99ef;
	}


	.card .options li[class=inactive] i{
		color: #839bb0;
	}

	.text-active-bold {
		color: #3a769b;
		font-weight: bold;
	}

	.text-active {
		color: #93a3bd;
	}

	.text-inactive {
		color: #d3dce7;
	}

	.card .btn-action{
		border: #3f99ef 1px solid;
		color: #3f99ef;
		font-weight: bold;
		background-color: #ecf8ff; 
	}

	.card-badge{
		position: absolute;
		width: 6rem;
		height: 2rem;
		right: -10px; 
		top: 6px;
		background-color: #e875c6;
		padding: 10px;
		line-height: 10px;
		text-align: center;
		color: white;
		font-weight: bold;
		font-size: 80%;
	}

	.card-badge:after {
		content:"";
  		position: absolute;
  		top: -3px;
  		transform: skewY(30deg);
  		right:0px;
  		width:10px;
  		height:inherit;
  		background-color:#e875c6;
	}

	.card-badge:before {
	  content: "";  
	  position: absolute;  
	  display: block;  
	  bottom: 0em;  
	  border: 1rem solid #e875c6; 
	  } 

	 .card-badge:before {  
	 	left: -2em;  
	 	border-right-width: 1.5em;  
	 	border-left-color: transparent; 
	 }

	 .card {
  transition: transform .5s;
}

	.card:hover{
		transform: scale3d(1.006, 1.006, 1);
		 box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .15);
		&::after {
      opacity: 1;
    }
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
				<!-- <div class="row">
					

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

				</div> -->

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-2 col-md-offset-2" onclick="test('instant', 1)">
							<div class="card service instant">
								<div class="card-badge">
									Best Seller
								</div>
								<div class="header text-center">
									Instant Name
								</div>
								<div class="price text-center">
									$ 8.88
								</div>

								<div class="options">
									<ul>
										<li class="active"><i class="fa fa-check"></i><span class="text-active-bold">Personalize 3 Name</span></li>
										<li class="inactive"><i class="fa fa-check"></i><span class="text-inactive">Professional Review</span></li>
										<li class="inactive"><i class="fa fa-check"></i><span class="text-inactive">Digital Certificate</span></li>
									</ul>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-default btn-action">Purchase Now</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-1" onclick="test('custom', 2)">
							<div class="card service custom">
								<div class="header text-center">
									Custom Name
								</div>
								<div class="price text-center">
									$ 28.88
								</div>

								<div class="options">
									<ul>
										<li class="active"><i class="fa fa-check"></i><span class="text-active-bold">Personalize 1 Name</span></li>
										<li class="active"><i class="fa fa-check"></i><span class="text-active">Professional Review</span></li>
										<li class="active"><i class="fa fa-check"></i><span class="text-active">Digital Certificate</span></li>
									</ul>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-default btn-action">Purchase Now</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-1" onclick="test('upload', 3)">
							<div class="card service upload">
								<div class="header text-center">
									Upload Name
								</div>
								<div class="price text-center">
									$ 58.8
								</div>

								<div class="options">
									<ul>
										<li class="active"><i class="fa fa-check"></i><span class="text-active-bold">Personalize 1 Name</span></li>
										<li class="active"><i class="fa fa-check"></i><span class="text-active">Professional Review</span></li>
										<li class="active"><i class="fa fa-check"></i><span class="text-active">Digital Certificate</span></li>
									</ul>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-default btn-action">Purchase Now</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<center><input type="hidden" name="order_service_id" id="service_select">
				<!-- <button type="submit" name="add_order_service_id" id="btn" class="btn btn-success btn-lg" disabled>Next</button></center> -->
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