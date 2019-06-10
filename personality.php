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

		<?php include "navbar.php";?>

        <section class="htc__store__area pt--120 bg__white">
		<center>
		<div class="row">
		  <div class="col-md-3"></div>
			<div class="col-md-6">
				<p style="font-size:20px;color:red">Select 1 out of 12 only</p><br>
				  <form action="operations.php" method="POST">
					<input type="hidden" name="order_id" value="<?php echo $order_id?>">
					  <div class="circle b1" onclick="test('b1', 1)"><img class="per-image per-image-b1" width="80px" src="icons/personality/B1.png" style="border-radius:50% !important;"></div>
					  <div class="circle b2" onclick="test('b2', 2)"><img class="per-image per-image-b2" width="80px" src="icons/personality/B2.png" style="border-radius:50% !important"></div>
					  <div class="circle b3" onclick="test('b3', 3)"><img class="per-image per-image-b3" width="80px" src="icons/personality/B3.png" style="border-radius:50% !important"></div>
					  <br><br>
					  <div class="circle b4" onclick="test('b4', 4)">
						<img class="per-image per-image-b4" width="80px" src="icons/personality/B4.png" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle b5" onclick="test('b5', 5)"><img class="per-image per-image-b5" width="80px" src="icons/personality/B5.png" style="border-radius:50% !important"></div>
					  <div class="circle b6" onclick="test('b6', 6)"><img class="per-image per-image-b6" width="80px" src="icons/personality/B6.png" style="border-radius:50% !important"></div>
					  <br><br>
					  <div class="circle b7" onclick="test('b7', 7)"><img class="per-image per-image-b7" width="80px" src="icons/personality/B7.png" style="border-radius:50% !important"></div>
					  <div class="circle b8" onclick="test('b8', 8)"><img class="per-image per-image-b8" width="80px" src="icons/personality/B8.png" style="border-radius:50% !important"></div>
					  <div class="circle b9" onclick="test('b9', 9)"><img class="per-image per-image-b9" width="80px" src="icons/personality/B9.png" style="border-radius:50% !important"></div>
					  <br><br>
					  <div class="circle b10" onclick="test('b10', 10)">
						<img class="per-image per-image-b10" width="80px" src="icons/personality/B10.png" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle b11" onclick="test('b11', 11)">
						<img class="per-image per-image-b11" width="80px" src="icons/personality/B11.png" style="border-radius:50% !important">
					  </div>
					  
					  <div class="circle b12" onclick="test('b12', 12)">
						<img class="per-image per-image-b12" width="80px" src="icons/personality/B12.png" style="border-radius:50% !important">
					  </div><br><br>
					  
					<input type="hidden" name="user_personality_id" id="circle_select">
					<a href="service.php"><button type="button" name="abc" class="btn btn-success">Back</button></a>
					<button type="submit" name="add_user_personality" id="btn" class="btn btn-success" disabled>Next</button></center><br>
				  </form>
			</div>
		</div>
		</center>
        </section>
		
    </div>
	<?php include "footerlinks.php";?>
</body>
<script>
	function test(elem, no){
		$('.circle').css('background-color','black');
		$('.'+elem).css('background-color','grey');
		$('#circle_select').val(no);
		var btn = document.getElementById('btn');
			if(elem.value!=''){
				btn.disabled = false;
			} else {
				 btn.disabled = true;
		}
		
		$('.per-image').each(function(){
			$(this).css({
				'border':'none'
			});
		});
		$('.per-image-'+elem).css({
			'border' : '3px solid red'
		});
	}
</script>
</html>