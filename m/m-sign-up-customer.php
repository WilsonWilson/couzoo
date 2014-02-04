<?php
// include mobile header
include ("m-header.php");
$id_user = "";
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

<!-- START Modal Content -->
<div class="page-overlay"></div>
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container">
    <div class="change-locaton-inner-container">
    <h2>Privacy Statement</h2>
    <p class="modal-p">All your info is safe with us. We don't share anything with anybody. Our payments are also processed and protected through PayPal so you can shop with confidence, knowing your financial information is secure no matter how you choose to pay.</p>     
    </div>
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Sign Up</div>
    
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

<?php 
if(isset($_POST['submitted']))
{
   if($couzoo->RegisterCustomer())
   {
	echo "<div class='center-reg'> Thank you for registering with CouZoo. Please complete your registration by confirming your account.<br>
		An e-mail has been sent to you with further instructions.</div>";
	die;
   }
}
?>

<div class="m-sign-up-intro">Please complete the form below to create a customer account.</div>
<div class="m-sign-up-im-a-merch"><a href="m-sign-up-merchant.php">I'm a<br/>Merchant</a></div>

<div class="m-sign-up-form-container">
<div id="m-advancedCall">
    <form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	<input type='hidden' name='merchant' id='merchant' value='no' />

	<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

        <input class="myclass" type="text" name='fname' id='fname' value='<?php echo $couzoo->SafeDisplay('fname') ?>' maxlength="50" placeholder="First Name" />					
        <br />
        <input class="myclass" type="text" name='lname' id='lname' value='<?php echo $couzoo->SafeDisplay('lname') ?>' maxlength="50" placeholder="Last Name" />
        <br />
        <input class="myclass" type="text" name='email' id='email' value='<?php echo $couzoo->SafeDisplay('email') ?>' maxlength="50" placeholder="E-mail" />
        <br />
        <input class="myclass" type="text" name='confirm_email' id='confirm_email' value='<?php echo $couzoo->SafeDisplay('confirm_email') ?>' maxlength="50" placeholder="Confirm E-mail" />
        <br />

        <input style="width:49%; float:left;" class="myclass" type='password' name='password' id='password' maxlength="50" />
	 <input style="width:49%; float:right;" class="myclass" type='password' name='confirm_password' id='confirm_password' maxlength="50" />

	 <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
    </form>
</div>
</div>
<br clear="all"/>
<div class="m-log-in-button-contianer">
	<div class="m-log-in-button">
       <a href="#"> <div class="use-this-coupon">sign up</div></a>
    </div>
</div><!--end use now button container-->
<div class="m-forgot-pass"><a class="privacy-statement-link" href="#">privacy statement</a></div>

</div><!--End Container-->

<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".privacy-statement-link").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container").fadeIn('slow');
				$(".close-change-location-modal").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container").fadeOut('slow');	
			$(".close-change-location-modal").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal").click(function(){
			$(".change-locaton-container").fadeOut('slow');	
			$(".close-change-location-modal").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
</script>

<script>
$('.m-log-in-button').click(function() {
	$('#login_form').submit();
});
</script>

</body>
</html>
