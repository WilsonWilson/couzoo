<?php
// include mobile header
include ("m-header.php");

$id_coupon = mysql_real_escape_string($_GET['id']);
$coup = mysql_query("SELECT * FROM CouZoo_Coupons AS coup
				   LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				   LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
				   WHERE my.id_coupon = '".$id_coupon."' AND my.status = '0'");

if (!mysql_num_rows($coup)) { header('Location: m-my-coupons.php'); }

$id_user = $couzoo->GetUser();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1.5)" />
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
    
    <div class="m-use-page-title">Use This Coupon</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account--
<!--END TOP BAR & MENU-->

<div class="container">

<?php while($c = mysql_fetch_array($coup)):

$pdate = new DateTime($c['my.date']);
$pdate = $pdate->format("m/d/y");
$edate = new DateTime($c['exp_date']);
$edate = $edate->format("m/d/y");
?>

<!--Start Coupon-->
<div class="m-use-container">
    <div class="m-use-coupon-now-container">
        <div class="m-use-image-container">
          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
        </div>
    
        <div class="m-use-now-title-container">
        	<?=$c['title']?>
        </div><!--end m-use-now-title-container-->
    
        <div class="m-used-purchased-on">Purchased: <span><?=$pdate?></span></div>
        <div class="m-used-valid-thru">Valid Thru: <span><?=$edate?></span></div>
    
  		<br clear="all"/>
    </div><!--end m-use-coupon-container-->
</div><!--end m-use-container-->
<!--END Coupon-->

<div class="show-to-merchant"></div>

<div class="m-use-now-button-contianer">
	<div class="m-use-now-button">
       <a href="m-use-confirm.php?id=<?=$c['id_coupon']?>"> <div class="use-this-coupon">use now</div></a>
    </div>
</div><!--end use now button container-->
<br clear="all"/>

<?php endwhile;?>

<div class="m-use-now-push"></div>
</div><!--End Container-->

<div class="m-use-now-explain">
<span class="how-to-use-title">How to use:</span> to use this coupon present this screen the merchant at the time of purchase. Do not press "use now" until the merchant has viewed and appoved the use of this coupon. Merchant may require pressing "use now" themselves.    
</div>



</body>
</html>
