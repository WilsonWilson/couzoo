<?php
// include mobile header
include ("m-header.php");

$id_coupon = mysql_real_escape_string($_GET['id']);
$coup = mysql_query("SELECT * FROM CouZoo_Coupons AS coup
				   LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				   LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
				   WHERE my.id_coupon = '".$id_coupon."' AND my.status = '0'");

if (!mysql_num_rows($coup)) { header('Location: m-my-coupons.php'); }

$upd = mysql_query("UPDATE CouZoo_My_Coupons SET status = 1 WHERE id_coupon = ".$id_coupon." ");

if (mysql_affected_rows() < 1)
{
    echo "<center>We could not process your coupon. Please contact customer support</center>";
    die;
}

// Update total redemptions for coupons
$qry = mysql_query("UPDATE CouZoo_Coupons SET redemptions = redemptions + 1 WHERE id_coupon = '$coupon_id'");

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
    
    <div class="m-use-page-title">Coupon Used</div>
    
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

<div class="nice-work-container">
<div class="nice-work">Nice work! You just got your save on!</div>
</div>

<div class="m-find-button-contianer">
	<div class="m-find-button">
       <a href="m-my-coupons.php"> <div class="use-this-coupon">return to your coupons</div></a>
    </div>
</div><!--end use now button container-->

<div class="m-used-done-thanks-container">
<div class="m-used-done-thanks">
We hope that was easy!<br />
Our goal is to make buying and using
coupons easy and friendly.
<div>
Please feel free to<br />
<a href="m-contact-us.php">tell us your thoughts</a>
</div>
</div>
</div>

<div class="push"></div>
</div><!--End Container-->



</body>
</html>
