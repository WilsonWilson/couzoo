<?php
// include mobile header
include ("m-header.php");

$id_coupon = mysql_real_escape_string($_POST['id']);
$coup = mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_coupon = '$id_coupon'");
$c = mysql_fetch_array($coup);

if (!mysql_num_rows($coup)) { header('Location: m-results.php'); }

$id_user = $couzoo->GetUser();
$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '$id_user'"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" href="css/ldpi.css" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1)" href="css/mdpi.css" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1.5)" href="css/hdpi.css" />
<meta name="viewport" content="target-densitydpi=device-dpi" />
<title>CouZoo Mobile</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<!--FOR FORM-->
<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script src="js/mobile-menu.js" type="text/javascript"></script>

<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' />

</head>

<body>

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Check Out</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<!--END TOP BAR & MENU-->

<div class="container">

<!--Start Coupon-->
<div class="m-use-container">
    <div class="m-use-coupon-now-container">
        <div class="m-use-image-container">
          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
        </div>
    
        <div class="m-use-now-title-container">
        	<?=$c['title']?>
  </div><!--end m-use-now-title-container-->
        
  		<br clear="all"/>
    </div><!--end m-use-coupon-container-->
</div><!--end m-use-container-->

<div class="m-log-in-form-container" style="margin:0px auto; width:97%;">
	<div id="m-advancedCall">

      <div class="m-check-out-total-container">
            <div class="price-box price-box-2-dollar">$<?=$c['price']?></div>
            <div class="quantity-container">
                <div>Quantity:</div>
                <form class="quant-num" action="" name="homeSearch">
        			<input style="height:auto; padding:14px 14px 12px;" type="text" id="quantity" name="checkOutQuantity" value="1" />					
        	    </form>
            </div>
            <div class="price-total-container">
                <div>Total:</div><div id="total-price" class="total-num">$<?=$c['price']?></div>
            </div>
      </div><!--END m-check-out-total-container -->
      <br clear="all"/><br clear="all"/>
      
      	<input class="" type="text" name="" value="<?=$user['fname']?> <?=$user['lname']?>" />
        <br />
        <input class="" type="text" name="" value="card number" />
        <br />
        <input style="width:49%; float:left;" class="" type="text" name="" value="exp date" />
        <input style="width:49%; float:right;" class="" type="text" name="" value="3-digit code" />

	</div>
</div>


<br clear="all"/>

<div class="m-use-now-button-contianer">
	<div class="m-use-now-button">
       <a href="m-use-confirm.php">
       	<div class="use-this-coupon">purchase</div>
       </a>
    </div>
</div><!--end use now button container-->

<div class="m-or-paypal-container">
	<div class="m-or-paylpal-line m-or-paylpal-line-l"></div>
     or 
     <div class="m-or-paylpal-line m-or-paylpal-line-r"></div>
</div>

<div class="m-use-paypal-button-contianer">
	<div class="m-use-paypal-button">
       <a href="m-use-confirm.php">
       	<div class="use-this-coupon"><img src="m-images/paypal-logo.png" height="auto" /></div>
       </a>
    </div>
</div><!--end use PsyPal button container-->
<br clear="all"/>
</div><!--End Container-->


<script>

$('#quantity').change(function() {
	qty = $( this ).val();
	total = qty * <?=$c['price']?>;
	$('#total-price').html('$'+total);
});

</script>



</body>
</html>
