<?php
//Used to login and stay on same page
$url = $_SERVER['REQUEST_URI'];
$_SESSION['url'] = $url;

require_once("includes/config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>CouZoo - The Crown of Coupons!</title>

<link rel="stylesheet" href="css/style.css" type="text/css" /><!--gerneral-->
<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' /><!--Login-->
<link rel="stylesheet" href="css/log-in-changer.css">
<link rel="stylesheet" href="css/fg_membersite.css">
<link rel="stylesheet" href="css/create-coupon.css" type="text/css"/>
<link rel="stylesheet" href="css/mini-cart-styles.css" type="text/css"/>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

    <!-- FOR DROPDOWN -->
    <script type='text/javascript' src='js/sign-in-sign-up.js'></script>

    <!--FOR FORM-->
	<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    <script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>

    <!-- AsyncSlider Core Files -->
    <link href="css/asyncslider_body.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.asyncslider2.js"></script>
    <!-- End of: AsyncSlider Core Files -->

<!--For log-in (customer/merchant login/sign up) changer-->
    <script src="js/log-in-changer.js"></script>   

    <!-- FOR Div Expander -->
    <script type='text/javascript' src='js/div-expander.js'></script>


<!-- New login/signup -->
<script type="text/javascript">
 
 	$(window).load(function(){
		$("#slider_2").asyncSlider2({
			direction: "horizontal",
			minTime: 1200,
			maxTime: 1200,
			easingIn: 'easeInExpo',
			easingOut: 'easeOutExpo',
			prevNextNav: $(".prev_next_nav_env"),
			keyboardNavigate: false,
			slidesNav: $("#asyncslider_links")
		});
	// Link to go to slide - ZOO View
	$(".go_to_slide_zooview").click(function(ev){
		ev.preventDefault();
		$("#slider_2").asyncSlider2("moveToSlide", 2);
	});
// Link to go to slide - SEARCH View
	$(".go_to_slide_search").click(function(ev){
		ev.preventDefault();
		$("#slider_2").asyncSlider2("moveToSlide", 1);
	});	
});
</script>


<!-- Sample CSS Code -->
<style type="text/css">
</style>

<!--Delay load of browse view-->
<script>
function show() {
    AB = document.getElementById('theIdOfYourObject');
    AB.style.display = 'inline';
}
setTimeout("show()", 5000);
</script>

	<!-- Add fancyBox main JS and CSS files -->
	<?php include ("fancybox.html"); ?>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.0.6" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});
			
		});
	</script>
    
    <!--Start Delayed load-->
		<script>
            $(document).ready(function() {
             $('#slide-login').delay(700).fadeIn(700);
             $('#slide-c-sign-up').delay(800).fadeIn(800);
             $('#slide-m-sign-up').delay(900).fadeIn(900);
             $('#slide-forgot').delay(1100).fadeIn(1100);
             $('#slide-sign-up-direct').delay(1200).fadeIn(1200);  
            });​
        </script>
    <!-- End Delayed load-->

</head> 
<body>

<?php

if (isset($_SESSION['id_user']))
{
	include "includes/header-member.php";
}
else
{
	include "includes/header-guest.php";
}

?>

</div>
