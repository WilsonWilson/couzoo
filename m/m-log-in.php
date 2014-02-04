<?php
// include mobile header
include ("m-header.php");

if(isset($_POST['submitted']))
{
   if($couzoo->Login())
   {
   	if ($_SESSION['user_merchant'] == 'yes') {
           $url = "m-merchant-center.php";
	} else {
 	    $url = "m-my-account.php";
	}

	$couzoo->RedirectToURL($url);
    }
}

$id_user = "";
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

<!-- START Modal Content -->
<div class="page-overlay"></div>
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container">
    <div class="change-locaton-inner-container">
    <h2>Forgot Your Password</h2>
        <div id="m-advancedCall2">
                <form action="" name="forgotPassword">
                    <input class="forgotPasswordField" type="email" name="forgotPassword" value="email" />					
                </form>
                <br />
        </div>
        <div class="footnote">We will email you your password</div>
        <div class="m-find-button-contianer">
            <div class="m-change-location-button">
               <a href="#"> <div class="use-this-coupon">get password</div></a>
            </div>
        </div><!--end use now button container-->
    </div>
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Log In</div>
    
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



<div class="m-log-in-form-container">
<div id="m-advancedCall">
    <form method="POST" action="<?php echo $couzoo->GetSelfScript(); ?>" name="homeSearch" id="login_form">
	<input type='hidden' name='submitted' id='submitted' value='1'/>

	 <div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

        <input class="myclass" type="text" name="email" placeholder="email address" value="<?php echo $couzoo->SafeDisplay('email') ?>" />
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>				
        <br />
        <input class="myclass" type="password" name="password" id="password" placeholder="password" />
	<span id='login_password_errorloc' class='error'></span>

	<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
    </form>
</div>
</div>

<div class="m-log-in-button-contianer">
	<div class="m-log-in-button">
       <a href="#"><div class="use-this-coupon">sign in</div></a>
    </div>
</div><!--end use now button container-->
<div class="m-forgot-pass"><a class="get-password" href="#">forgot password</a></div>

<div style="height:10%"></div>

<div class="log-in-bottom-container">        
    <div class="m-log-in-button-contianer">
        <div class="m-sign-up-button">
           <a href="m-sign-up-customer.php"> <div class="use-this-coupon">sign up</div></a>
        </div>
	</div><!--end use now button container-->     
</div><!--End bottom-nav-container-->

<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".get-password").click(function(){
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
		
		
		$('.forgotPasswordField').keydown(function(){
			$('.page-overlay').css('height', '110%');
	});
		
</script>

<script>
$('.m-log-in-button').click(function() {
	$('#login_form').submit();
});

$('#password_fake').keyup(function() {
	$("<input type='password' />").attr({ name: this.name, value: this.value }).insertBefore(this);
	$(this).remove();
});
</script>

</body>
</html>
