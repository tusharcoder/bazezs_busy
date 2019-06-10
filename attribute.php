<?php session_start();?>
<?php
	include "database.php";
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
	$order_res = mysqli_query($con, "SELECT * FROM orders WHERE order_id='$order_id'");
	$order_row = mysqli_fetch_array($order_res);
	$order_service_id = $order_row['order_service_id'];
	if($order_service_id==0){
		header("location:personality.php");
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
		.circle {
	  display: inline-flex;         /* use this so theat items are on same line */
									
	  justify-content: center;      /* by using above, you can vertical and horizontal align without the need for a stupid line-height hack*/
	  align-items: center;
	  text-align: center;
	  
	  margin-right: 10px;
	  width: 80px;
	  height: 80px;
	  font-size: 18px;
	  border-radius: 50%;
	  color: #fef;
	  background: white;
	  color:black;
	  border:2px solid black;
	  cursor:pointer;
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
        <section class="htc__store__area pt--120 bg__white">
		<center>
		<div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
			  <div class="">
				<p style="font-size:20px;color:red">Select 5 out of 12 only</p><br>
				<form action="operations.php" method="POST">
					<input type="hidden" name="order_id" value="<?php echo $order_id?>">
					<input type="hidden" name="order_service_id" value="<?php echo $order_service_id?>">
					  <div class="circle c1" onclick="test('c1', 1, this)" elem-selected="0">
						<img src="icons/attributes/C1.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c2" onclick="test('c2', 2, this)"  elem-selected="0">
						<img src="icons/attributes/C2.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c3" onclick="test('c3', 3, this)"  elem-selected="0">
						<img src="icons/attributes/C3.png" width="80px" style="border-radius:50% !important">
					  </div>
					  <br><br>
					  
					  <div class="circle c4" onclick="test('c4', 4, this)"  elem-selected="0">
						<img src="icons/attributes/C4.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c5" onclick="test('c5', 5, this)"  elem-selected="0">
						<img src="icons/attributes/C5.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c6" onclick="test('c6', 6, this)"  elem-selected="0">
						<img src="icons/attributes/C6.png" width="80px" style="border-radius:50% !important">
					  </div>
					  <br><br>
					  
					  <div class="circle c7" onclick="test('c7', 7, this)"  elem-selected="0">
						<img src="icons/attributes/C7.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c8" onclick="test('c8', 8, this)"  elem-selected="0">
						<img src="icons/attributes/C8.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c9" onclick="test('c9', 9, this)"  elem-selected="0">
						<img src="icons/attributes/C9.png" width="80px" style="border-radius:50% !important">
					  </div>
					  <br><br>
					  
					  <div class="circle c10" onclick="test('c10', 10, this)"  elem-selected="0">
						<img src="icons/attributes/C10.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c11" onclick="test('c11', 11, this)"  elem-selected="0">
						<img src="icons/attributes/C11.png" width="80px" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle c12" onclick="test('c12', 12, this)"  elem-selected="0">
						<img src="icons/attributes/C12.png" width="80px" style="border-radius:50% !important">
					  </div><br><br>
					  
					   <input type="hidden" id="circle_val_1" name="user_strength_id[]" id="circle_select" value="0">
					   <input type="hidden"  id="circle_val_2" name="user_strength_id[]" id="circle_select" value="0">
					   <input type="hidden"  id="circle_val_3" name="user_strength_id[]" id="circle_select" value="0">
					   <input type="hidden"  id="circle_val_4" name="user_strength_id[]" id="circle_select" value="0">
					   <input type="hidden"  id="circle_val_5" name="user_strength_id[]" id="circle_select" value="0">
					  
					  <a href="personality.php"><button type="button"  class="btn btn-success">Back</button></a>
					  <button type="submit" name="add_user_strength" id="next_btn" class="btn btn-success" disabled>Next</button></center><br>
					 
				</form>
		  </div>
		</div>
		</center>
        </section>
		
    </div>
	<?php include "footerlinks.php";?>
</body>
<script>
	/*function test(elem, no){
		$('.circle').css('background-color','white');
		$('.'+elem).css('background-color','grey');
		$('#circle_select').val(no);
		var btn = document.getElementById('btn');
			if(elem.value!=''){
				btn.disabled = false;
			} else {
				 btn.disabled = true;
		}
	}*/
	var selected = 0;
	function test(elem, no, obj) {
		if (selected<5) {
			var elem_sel = $(obj).attr('elem-selected');
			if (elem_sel==1) {
				$(obj).css("border","3px solid red");
				$(obj).attr('elem-selected', '0');
				selected--;
			} else {
				$(obj).css("border","3px solid red");
				$(obj).attr('elem-selected', '1');
				selected++;
			}
			$('#circle_val_'+selected).val(no);
			var btn = document.getElementById('next_btn');
			if (selected==5) {
				btn.disabled = false;
			} else {
				btn.disabled = true;
			}
			
		}
	}
</script>
</html>