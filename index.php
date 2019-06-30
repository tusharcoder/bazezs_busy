<?php session_start();?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   <?php include "headerlinks.php";
   include "database.php";
   ?>
    <style type="text/css">
    /* Take care of image borders and formatting, client hacks */
    img { max-width: 450px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    a img { border: none; }
    table { border-collapse: collapse !important;}
    #outlook a { padding:0; }
    .ReadMsgBody { width: 100%; }
    .ExternalClass { width: 100%; }
    .backgroundTable { margin: 0 auto; padding: 0; width: 100% !important; }
    table td { border-collapse: collapse; }
    .ExternalClass * { line-height: 115%; }
    .container-for-gmail-android { min-width: 400px; }


    /* General styling */
    * {
      font-family: Helvetica, Arial, sans-serif;
    }

    body {
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      width: 100% !important;
      margin: 0 !important;
      height: 100%;
      color: #676767;
    }

    td {
      font-family: Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #777777;
      text-align: center;
      line-height: 21px;
    }

    a {
      color: #676767;
      text-decoration: none !important;
    }

    .pull-left {
      text-align: left;
    }

    .pull-right {
      text-align: right;
    }

    .header-lg,
    .header-md,
    .header-sm {
      font-size: 32px;
      font-weight: 700;
      line-height: normal;
      padding: 35px 0 0;
      color: #4d4d4d;
    }

    .header-md {
      font-size: 24px;
    }

    .header-sm {
      padding: 5px 0;
      font-size: 18px;
      line-height: 1.3;
    }

    .content-padding {
      padding: 20px 0 5px;
    }

    .mobile-header-padding-right {
      width: 290px;
      text-align: right;
      padding-left: 10px;
    }

    .mobile-header-padding-left {
      width: 290px;
      text-align: left;
      padding-left: 10px;
    }

    .free-text {
      width: 100% !important;
      padding: 10px 60px 0px;
    }

    .button {
      padding: 30px 0;
    }

    .mini-block {
      border: 1px solid #e5e5e5;
      border-radius: 5px;
      background-color: #ffffff;
      padding: 12px 15px 15px;
      text-align: left;
      width: 253px;
    }

    .mini-container-left {
      width: 278px;
      padding: 10px 0 10px 15px;
    }

    .mini-container-right {
      width: 278px;
      padding: 10px 14px 10px 15px;
    }

    .product {
      text-align: left;
      vertical-align: top;
      width: 175px;
    }

    .total-space {
      padding-bottom: 8px;
      display: inline-block;
    }

    .item-table {
      padding: 50px 20px;
      width: 560px;
    }

    .item {
      width: 300px;
    }

    .mobile-hide-img {
      text-align: left;
      width: 125px;
    }

    .mobile-hide-img img {
      border: 1px solid #e6e6e6;
      border-radius: 4px;
    }

    .title-dark {
      text-align: left;
      border-bottom: 1px solid #cccccc;
      color: #4d4d4d;
      font-weight: 700;
      padding-bottom: 5px;
    }

    .item-col {
      padding-top: 20px;
      text-align: left;
      vertical-align: top;
    }

    .force-width-gmail {
      min-width:600px;
      height: 0px !important;
      line-height: 1px !important;
      font-size: 1px !important;
    }

  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {

      table[class*="container-for-gmail-android"] {
        min-width: 290px !important;
        width: 100% !important;
      }

      img[class="force-width-gmail"] {
        display: none !important;
        width: 0 !important;
        height: 0 !important;
      }

      table[class="w320"] {
        width: 288px !important;
      }

      td[class*="mobile-header-padding-left"] {
        width: 160px !important;
        padding-left: 0 !important;
      }

      td[class*="mobile-header-padding-right"] {
        width: 160px !important;
        padding-right: 0 !important;
      }

      td[class="header-lg"] {
        font-size: 24px !important;
        padding-bottom: 5px !important;
      }

      td[class="content-padding"] {
        padding: 5px 0 5px !important;
      }

       td[class="button"] {
        padding: 5px 5px 30px !important;
      }

      td[class*="free-text"] {
        padding: 10px 18px 30px !important;
      }

      td[class~="mobile-hide-img"] {
        display: none !important;
        height: 0 !important;
        width: 0 !important;
        line-height: 0 !important;
      }

      td[class~="item"] {
        width: 140px !important;
        vertical-align: top !important;
      }

      td[class~="quantity"] {
        width: 50px !important;
      }

      td[class~="price"] {
        width: 90px !important;
      }

      td[class="item-table"] {
        padding: 30px 20px !important;
      }

      td[class="mini-container-left"],
      td[class="mini-container-right"] {
        padding: 0 15px 15px !important;
        display: block !important;
        width: 290px !important;
      }

    }
  </style>
   <style>
.circle {
	  margin-right: 10px;
	  margin-top: 50px;
	  width: 100px;
	  height: 100px;
	  border-radius: 150px;
	  font-size: 16px;
	  color: #fef;
	  text-align: center;
	  background: #000;
	  position: relative;
	  cursor:pointer;
	}
	.circle p {
	  margin: 0;
	  transform: translate(-50%, -50%);
	  top: 50%;
	  left: 50%;
	  position: absolute;
	}
	.text {
		font-size:17px;
		color:black;
	}
	.div-text {
		font-size:35px;
		color:white;
	}
	h4 {
		font-family:calibri;
		color:black;
		font-size:22px;
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
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">About Us</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">About Us</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php 
        $q = "Select * from icons";
        $res = mysqli_query($con, $q);
        if (mysqli_num_rows($res)){
          $res = mysqli_fetch_array($res);
          $orc = "uploads/".$res['orc'];
          $human = "uploads/".$res['human'];
        }else{
          $orc = "icons/index-page/orc.png";
          $human = "icons/index-page/human.png";
          

        }
        ?>
		
		<div class="htc__brand__area bg__white ptb--80">
            <div class="container">
				<form action="operations.php" method="POST">
					<input type="hidden" name="user_selection" id="user_selection">
					<!--
						<div class="row">
							<div class="col-xs-4"></div>
							<div class="col-xs-2">
								<img src="icons/index-page/human.png" class="img-circle circle human" onclick="test('human', 1, 'Human')"><br> <b>Human</b>
							</div>
							<div class="col-xs-2">
								<img src="icons/index-page/orc.png" class="img-circle circle orc" onclick="test('orc', 2, 'Orc')"><br> 
								<b>Orc</b>
							</div>
						</div>-->
					<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%" style="margin-top:-50px">
					  <tr>
						<td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
						  <center>
							<table cellspacing="0" cellpadding="0" width="450" class="w320">
							  <tr>
								<td class="header-lg">
								  <center>
									  <div class="">
									  <img src="<?php echo $human;?>" class="img-circle circle human" onclick="test('human', 1, 'Human')">
									  </div>
										<p class="text"><b>Human</b></p>
								  </center>
								</td>
								<td class="header-lg">
								  <center>
									  <div class="">
										<img src="<?php echo $orc;?>" class="img-circle circle orc" onclick="test('orc', 2, 'Orc')">
									  </div>
										<p class="text"><b>Orc</b></p>
								  </center>
								</td>
							  </tr>
							</table>
						  </center>
						</td>
					  </tr>
					</table>
						<!--<input type="hidden" name="circle" id="circle_select">-->
					<br><center><a href="service.php"><button type="submit" name="add_user_selection" id="btn" class="btn btn-success btn-lg" disabled="disabled">Next</button></a>
					</center>
				</form>
            </div>
        </div>
				
        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
        <section class="htc__store__area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Welcome To Our Site</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                        </div>
                        <div class="store__btn">
                        </div>
                    </div>
                </div>
            </div>
        </section>
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