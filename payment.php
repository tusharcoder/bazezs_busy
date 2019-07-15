<?php session_start();?>
<?php
	include "database.php";
	include "functions.php";
	include "get_discount.php";
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} else {
		header("location:index.php");
		exit();
	}
	$order_res = mysqli_query($con, "SELECT * FROM orders WHERE order_id='$order_id'");
	$order_row = mysqli_fetch_array($order_res);
	$user_selection = $order_row['user_selection'];
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
		padding-top: 25px !important;
	}
		.circle {
	  display: inline-flex;         /* use this so theat items are on same line */
									
	  justify-content: center;      /* by using above, you can vertical and horizontal align without the need for a stupid line-height hack*/
	  align-items: center;
	  text-align: center;
	  
	  margin-right: 10px;
	  width: 60px;
	  height: 60px;
	  font-size: 18px;
	  border-radius: 50%;
	  color: #fef;
	  background: white;
	  color:black;
	  border:2px solid black;
	  cursor:pointer;
}
.table td, .table th {
    border: none !important;
}

.stripe-button-el{

	background: url(img/master-visa.png);
}
   </style>
}
</head>

<body>
	
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
	<div class="container">
    <section class="ptb--120" style="padding:90px 0 !important">
		<?php if (isset($_GET['fail'])){ ?>
		<p style="font-size:20px;color:red;text-align:center;">Payment Failed!</p><br>
		<?php } ?>
			<div class="row">
				<div class="col-md-2"></div>
				  <div class="col-md-8">
					<div class="panel panel-default panel-edit">
						  <div class="panel-heading panel-heading-edit">
						  <table class="table table-edit">
							<tr>
								<td><h5><strong>Checkout</strong></h5></td>
								
							</tr>
						  </table>
						  </div>
						<div class="panel-body panel-body-edit">
							<table class="table table-edit grey-bot-border">
								<tr>
									<td>
									<?php if($user_selection=='Human') { ?>
										<!-- <img src="icons/index-page/human.png" class="img-responsive" width="60px" style="display: inline-block">  -->
									<?php } else if($user_selection=='Orc') { ?>
										<img src="icons/index-page/orc.png" class="img-responsive" width="60px" style="display: inline-block"> 
									<?php } ?>
										<?php 
											if ($order_service_id){
												$q = "Select * from services where id='$order_service_id'";
												$result = mysqli_query($con, $q);
												if ($row = mysqli_fetch_array($result)){
													$price = $row['service_price'];
													$service_name = $row['service_name'];
													if (isset($_GET["code"]) && $_GET["code"]!=""){
															$discount = get_discount($_GET["code"], $price);
														}
														else
															{$discount = 0;}
												}else{
													    throw new Exception("No service selected or selected service not available, try again later");

												}
												}
										?>
										<?php echo strtoupper($service_name)." ORDER"; ?> 
									</td>
									<td align="right"><strong>$<?php echo($price-$discount); ?></strong></td>
								</tr>
							</table>
							<table class="table table-edit">
								<tr>
									<td><strong>Total</strong></td>
									<td align="right"> <strong>$<?php echo($price-$discount); ?></strong></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="well well-edit">
					  <form action="pro.php" method="post" class="creditly-card-form agileinfo_form form-horizontal" enctype="multipart/form-data">
						<input type="hidden" name="order_id" value="<?php echo $order_id?>">
						<input type="hidden" name="order_service_id" value="<?php echo $order_service_id?>">
						
							<h3 style="margin:50px 0 15px 0; font-size:20px;">SHIPPING AND BILLING ADDRESS</h3>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">Name</label>
							  	<div class="col-sm-10"><input type="text" class="form-control" onkeyup="test()" id="user-name" name="user_name" required></div>
							</div>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">Email</label>
							  	<div class="col-sm-10"><input type="email" class="form-control" onkeyup="test()" id="user-email" name="user_email" required></div>
							</div>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">Address</label>
							  	<div class="col-sm-10"><input type="email" class="form-control" onkeyup="test()" id="user-email" name="user_email" required></div>
							</div>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">City</label>
							  	<div class="col-sm-10"><input type="email" class="form-control" onkeyup="test()" id="user-email" name="user_email" required></div>
							</div>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">Postal Code</label>
							  	<div class="col-sm-10"><input type="email" class="form-control" onkeyup="test()" id="user-email" name="user_email" required></div>
							</div>
							<div class="form-group">
								<label class="font-normal lebel control-label col-sm-2">Country</label>
							  	<div class="col-sm-10">
									  <select class="form-control">
										  <option select="select">China</option>
										  <option>Australia</option>
										  <option>England</option>
										  <option>USA</option>
										  <option>Canada</option>
										  <option>Others</option>
									  </select>
								  </div>
							</div>
							<div class="well">
						<p style="text-align:right;color:rgb(82,126,199);cursor:pointer" onclick="myFunction()">Have a discount code? Click to enter it.</p>
						
							<p id="demo">
						<?php if (isset($_GET['code'])){ ?>
								<input type='text' name='promotional_code' value = "<?php echo ($_GET['code']); ?>" class='form-control'></p><?php }?>	
						
						
					</div>
							
							<div class="form-group">
							  <input type="hidden" class="form-control" name="user_ip" value="<?php echo getUserIpAddr();?>" required>
							</div>
							<div class="row grey-border">
								<div class="col-sm-2"><img src="img/alipay-logo.png" /></div>
								<div class="col-sm-2"><img src="img/master-visa.png" /></div>
							</div>
							<div style="border:1px solid #ccc;padding:14px">
								<input type="radio" checked> <b>Pay by Stripe</b>
								<img src="img/stripe-logo.png" height="20px" style="float:right">
							</div>
							<div style="border:1px solid #ccc;border-bottom:2px solid rgb(180,219,158);padding:14px">
								<input type="radio"  name="" disabled> <b>Pay with Alipay</b>
								<img src="img/ali-pay.png" height="18px" style="float:right">
							</div>
							
							<br>
							<script
								src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								data-key="pk_test_dNtkFiJDmxGBJo8RTAivVvak00NSjJ1Nph"
								data-amount="<?php echo(100*($price-$discount));?>"
								data-name="UNIQLO"
								data-description="Pay Now"
								data-image="images/logo/uniqlo.png"
								data-locale="auto">
							</script>
					  </form>
					  <br>
					</div>
				  </div>
			</div>
    </section>
	</div>
	<?php include "footerlinks.php";?>
</body>
<script>
  $(function() {
    $(".stripe-button-el").replaceWith('<button type="submit" class="pay"><img src="./img/master-visa.png" width="81"></button>');
  });
</script>
<script>
	function test() {
        var user_name = document.getElementById("user-name");
        var user_email = document.getElementById("user-email");
        var btn = $("button[type='submit']");
        if(user_name.value!='' && user_email.value!==''){
            btn.disabled=false;
        }else{
        	btn.disabled=true;
        }
    }
</script>
<script>
function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}

function myFunction() {
  document.getElementById("demo").innerHTML = "<input type='text' name='promotional_code' class='form-control'>";
  $("input[name=promotional_code]").on('blur', function(){
		var value = $(this).val();
		var uri = window.location.href;
		uri = updateQueryStringParameter(uri,"code",value);
		window.location.href = uri
	}).bind(this);
}

// function get_discount(promocode, value){
// /* This function will call the discount php script and set the discount of the order*/
// var user = {
//     'promocode': promocode,
//     'value': value,
// };
// var datastr = JSON.stringify(user);
// $.ajax({
//     url: 'get_discount.php',
//     type: 'post',
//     data: ,
//     success: function(response){
//         //do whatever.
//     }
// });

// }
$(document).ready(function(){
	$("input[name=promotional_code]").on('blur', function(){
		var value = $(this).val();
		var uri = window.location.href;
		uri = updateQueryStringParameter(uri,"code",value);
		window.location.href = uri
	}).bind(this);
})
</script>
</html>