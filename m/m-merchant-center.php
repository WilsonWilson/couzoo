<?php
// include mobile header
include ("m-header.php");

$redirect = $couzoo->CheckLoginDash("merchant-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("m-log-in.php");
    	exit;
}
elseif($redirect === "customer")
{
    	$couzoo->RedirectToURL("m-my-account.php");
    	exit;
}

//Get User Data
$id_user = $couzoo->GetUser();

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));

$c_tally = mysql_fetch_array(mysql_query("SELECT sum(views) AS views, sum(sales) AS sales, sum(redemptions) AS red FROM CouZoo_Coupons WHERE id_user = '".$id_user."'"));
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
    <h2>My Stats</h2>
    	<div class="modal-stats-container">      
            <span id="stat-name">Coupons Sold:</span> <?=$c_tally['sales']?><br>
            <span id="stat-name">Coupons Redeemed:</span> <?=$c_tally['red']?><br>
            <span id="stat-name">Coupon Views:</span> <?=$c_tally['views']?><br>
            <span id="stat-name">Profile Views:</span> <?=$user['profile_views']?><br>
            <span id="stat-name">Revenue from CouZoo Sales:</span> $--*<br> 
            <span id="stat-name">Revenue if using Groupon:</span> $--**<br>       
        	<div class="footnote">More in-depth stats, charts, and graphs will be coming here soon.</div>
            <div class="footnote">*Minimum amount customer who redeemed coupons spent with you</div>
            <div class="footnote">**Estimate based on average Groupon share of 50%</div>
        </div>        
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
        	<a name="merch-center-sec"></a>
        	<div class="m-create-button-contianer">
                <div class="m-create-button">
                   <a href="m-create-coupons.php"> <div class="use-this-coupon">create a coupon</div></a>
                </div>
            </div><!--end use now button container-->
            
            <div class="m-view-my-button-contianer">
                <div class="m-view-my-button">
                   <a href="m-merch-coupons.php"> <div class="use-this-coupon">view coupons</div></a>
                </div>
            </div><!--end use now button container-->
            
            
            
            <div class="m-manage-profile-button-contianer">
                <div class="m-manage-profile-button">
                   <a href="m-merch-account.php"> <div class="use-this-coupon">my account</div></a>
                </div>
            </div><!--end use now button container-->
            
        </li>
	</ul>

<div class="push-home"></div>
</div><!--End Container-->

<div class="bottom-home-nav">
<!--<div class="bottom-home-nav-fixed">-->
    <div class="bottom-home-nav-container">
        <div class="view-my-account-btn">
        	<a href="m-edit-merch-profile.php">Manage My<br/>Profile Page</a>
        </div>
        
        <div class="pricing_table merchant-center-btn" id="merchHome">        	
            <a href="index.php">CouZoo<br/>Home</a>           
        </div>        
                
        <div class="change-location-btn">
        	<a class="view-stats-click" href="#">View My<br/>Stats</a>
        </div>
    </div><!--End bottom-nav-container-->
</div><!--End bottom nav-->

<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".view-stats-click").click(function(){
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
</body>
</html>
