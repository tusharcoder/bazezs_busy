<?php
	include "database.php";
	$order_id = 0;
	if(isset($_SESSION['order_id'])){
		$order_id = strval($_SESSION['order_id']);
	} 
	$order_res = mysqli_query($con, "SELECT * FROM orders INNER JOIN user_personality ON orders.user_personality_id = user_personality.user_personality_id WHERE order_id='$order_id'");
	$order_row = mysqli_fetch_array($order_res);
	$order_time = $order_row['order_time'];
	$user_selection = $order_row['user_selection'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<body bgcolor="#f7f7f7" style="width: 100% !important;margin: 0 !important;height: 100%;color: #676767;">
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
  <tr>
    <td align="left" valign="top" width="100%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
      <center>
      <img src="http://s3.amazonaws.com/swu-filepicker/SBb2fQPrQ5ezxmqUTgCr_transparent.png" class="force-width-gmail">
        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
          <tr>
            <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
              <center>
                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                  <tr>
                    <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                      <a href=""><img width="137" height="47" src="http://s3.amazonaws.com/swu-filepicker/0zxBZVuORSxdc9ZCqotL_logo_03.gif" alt="logo" style="padding-left:100px;"></a>
                    </td>
                    <td class="pull-right mobile-header-padding-right" style="color: #4d4d4d;">
                      <a href=""><img width="44" height="47" src="http://s3.amazonaws.com/swu-filepicker/k8D8A7SLRuetZspHxsJk_social_08.gif" alt="twitter" /></a>
                      <a href=""><img width="38" height="47" src="http://s3.amazonaws.com/swu-filepicker/LMPMj7JSRoCWypAvzaN3_social_09.gif" alt="facebook" /></a>
                      <a href=""><img width="40" height="47" src="http://s3.amazonaws.com/swu-filepicker/hR33ye5FQXuDDarXCGIW_social_10.gif" alt="rss" /></a>
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td style="font-size: 25px;font-weight: 700;line-height: normal;padding: 35px 0 0;color: #4d4d4d;font-family: Helvetica, Arial, sans-serif;color: #777777;text-align: center;line-height: 21px;">
              Thank you for your order!
            </td>
          </tr>
          <tr>
            <td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: #777777;text-align: center; line-height: 21px;">
              We'll let you know as soon as your items have shipped. To change or view your order, please view your account by clicking the button below.
            </td>
          </tr>
		  <tr>
			<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;"><br>
				<p style="color:black;font-size:20px;font-family:calibri"><h2>ORDER CONFIRMATION</h2></p> Thanks for your order! <br><br>
				<b>ORDER SUMMARY</b> 
				<span style="float:right">
					<?php echo date('F j Y', $order_time)?>
				</span><hr/>
			</td>
		  </tr>
		  <tr>
			<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: right; line-height: 21px;"><b>Order ID:</b> <?php echo "IN276786786"?></td>
		  </tr>
		  <tr>
			<td style="width: 100% !important;padding: 10px 60px 0px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;color: black;text-align: left; line-height: 21px;"><img src="icons/index-page/human.png" style="border-radius:50%"> Lord Arthur </td>
		  </tr>
        </table>
      </center>
    </td>
  </tr>
</table>
</div>
</body>
</html>