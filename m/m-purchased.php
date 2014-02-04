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
    
    <div class="m-use-page-title">Purchase Coupon</div>
    
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

<div class="m-purchased-done-thanks-container">
    <div class="m-purchased-done-thanks">
    Thanks for using CouZoo!<br />You can find this coupon in your <a href="">account page</a>
    </div>
</div>

<div class="m-or-paypal-container">
    <div class="m-or-paylpal-line m-or-paylpal-line-l"></div>
     or 
     <div class="m-or-paylpal-line m-or-paylpal-line-r"></div>
</div> 

<br clear="all" /><br clear="all" />

<div class="m-find-button-contianer">
	<div class="m-find-button">
       <a href="m.php"> <div class="use-this-coupon">use this coupon now</div></a>
    </div>
</div><!--end use now button container-->

<div class="m-used-done-thanks-container">
<div class="m-used-done-thanks">
We hope that was easy!<br />
Our goal is to make buying and using
coupons easy and friendly.
<div>
Please feel free to<br />
<a href="#">tell us your thoughts</a>
</div>
</div>
</div>

<div class="push"></div>
</div><!--End Container-->

<div class="bottom-nav">
    <div class="bottom-nav-container">
        <div class="view-my-account-btn"><a href="#">My Account</a></div>
        <div class="change-location-btn"><a href="#">Change Location</a></div>
    </div><!--End bottom-nav-container-->
</div><!--End bottom nav-->

</body>
</html>
