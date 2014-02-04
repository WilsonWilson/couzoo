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
    
    <div class="m-use-page-title">Contact Us</div>
    
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



<div class="m-contact-us-form-container">
<div id="m-advancedCall">
    <form action="" name="homeSearch">
        <input class="myclass" type="text" name="contactName" value="name" />
        <br />
        <input class="myclass" type="text" name="contactEmail" value="email address" />	
        <br />
        <textarea class="m-textarea" style="font-family:Verdana, Geneva, sans-serif; font-size:3em;">comment or question</textarea>				       
    </form>
</div>
</div>

<div class="m-log-in-button-contianer">
	<div class="m-log-in-button">
       <a href="m-check-out.php"> <div class="use-this-coupon">send</div></a>
    </div>
</div><!--end use now button container-->


<div style="height:2.5%"></div>

<div class="log-in-bottom-container">        
         <div class="m-used-done-thanks">
            Email us anytime at<br />
            <a style="margin-bottom:4px;" href="mailto:people@couzoo.com">people@couzoo.com</a>
            <br/>
            Or call us at <font color="#f26625">555-555-5555</font>
         </div>
</div><!--End bottom-nav-container-->

</body>
</html>
