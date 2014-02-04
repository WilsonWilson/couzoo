<?php
// include mobile header
include ("m-header.php");
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

<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' /> 

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>


<!--FOR FORM-->
<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.asyncslider.min.js"></script>
</head>

<body>

<!-- START Modal Content -->
<div class="page-overlay"></div>
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container">
    <div class="change-locaton-inner-container">
    <h2>Change Location</h2>
        <div id="m-advancedCall2">
                <form method="POST" id="change_location" name="form_location">
		      <input type="hidden" name="location" value="true">
                    <input class="changeLocationField" style="text-align:center;" type="text" name="address" placeholder="enter zip code or city name" />					
                </form>
                <br />
        </div>
        <div class="m-find-button-contianer">
            <div class="m-change-location-button">
               <a href="#"> <div class="use-this-coupon">change location</div></a>
            </div>
        </div><!--end use now button container-->
    </div>
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<div class="home-container">
    <div class="home-header">
        <div class="brown-stripe"><img src="m-images/cou.jpg" width="214" height="67" /></div>
        <div class="stripe-break"></div>
        <div class="orange-stripe"><img src="m-images/zoo.jpg" width="214" height="67" /></div>
    </div><!--end home header-->
    
    <div class="home-header-push">
        <div class="brown-stripe2"><img src="m-images/cou.jpg" width="1" height="67" /></div>
        <div class="stripe-break"></div>
        <div class="orange-stripe2"><img src="m-images/zoo.jpg" width="1" height="67" /></div>
    </div>

	<ul class="my_asyncslider">
		<li>

            <div class="m-use-button-contianer">
                <div class="m-use-button">
                   <a href="m-my-coupons.php"> <div class="use-this-coupon">my coupons</div></a>
                </div>
            </div><!--end use now button container-->
                        
            <div class="search-coupon-section-container">
            <div class="m-search-container">
            <div id="m-advancedCall">
                <form action="m-results.php" id="keyword_search" name="homeSearch">
                    <input class="myclass" type="text" style="text-align:center;" name="search" placeholder="search for coupons here" />					
                    <br />
                </form>
            </div>
            </div>
            
            <div class="m-find-button-contianer">
                <div class="m-find-button">
                   <a href="#"> <div id="search_btn" class="use-this-coupon">find a coupon</div></a>
                </div>
            </div><!--end use now button container-->
            </div><!--end search-coupon-section-container-->

		</li>
	</ul>

<div class="push-home"></div>
</div><!--End Container-->

<div class="bottom-home-nav">
<!--<div class="bottom-home-nav-fixed">-->
    <div class="bottom-home-nav-container">
        <div class="view-my-account-btn">
        	<a href="m-my-account.php">View My<br/>Account</a>
        </div>
              
        <div class="pricing_table merchant-center-btn" id="couzooHome">        	
		    <a href='m-merchant-center.php'>Merchant<br/>Center</a>           
        </div>
                
        <div class="change-location-btn">
        	<a class="change-location-click" href="#">Change<br/>Location</a>
        </div>
    </div><!--End bottom-nav-container-->
</div><!--End bottom nav-->

<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".change-location-btn").click(function(){
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
		
		
		$('.changeLocationField').keydown(function(){
			$('.page-overlay').css('height', '110%');
	});		
</script>

<script>
$('#change_loc').click(function() {
	$('#change_location').submit();
});

$('#search_btn').click(function() {
	$('#keyword_search').submit();
});

$('form').submit(function(){
    	$(this).children('input[value=""]').prop('disabled', 'disabled');
    	$('select').children('option[value=""]').prop('disabled', 'disabled');
});

</script>

</body>
</html>
