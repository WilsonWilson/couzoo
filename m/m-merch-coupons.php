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

$coupons = "SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_user'";

$live_qry = mysql_query($coupons . " AND status = 'live'");
$live_num = mysql_num_rows($live_qry);

$exp_qry = mysql_query($coupons . " AND status = 'ended'");
$exp_num = mysql_num_rows($exp_qry);

$save_qry = mysql_query($coupons . " AND status = 'upcoming'");
$save_num = mysql_num_rows($save_qry);
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
    
    <div class="m-use-page-title">My Company's Coupons</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="m-merchant-center.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-merch-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account--
<!--END TOP BAR & MENU-->

<div class="container">
    <div class="m-merch-coupon-nav-container">
        <ul>
            <li class="unused"><a href="javascript:void(0);" class="box-trigger" data-activates="default">Live</a></li>
            <li class="watching"><a href="javascript:void(0);" class="box-trigger" data-activates="second">Expired</a></li>
            <li class="used"><a href="javascript:void(0);" class="box-trigger" data-activates="third">Pending</a></li>
        </ul>
    </div>

	<div id="box">
        <div class="changeable default">
            <div class="m-merch-coupon-section-head m-live-head-bg">
                Below are your LIVE coupons
            </div>

<?php

//Checks to see if there are any coupons
if (!$live_num)  
  {
    echo "<center><br>You don't have any live coupons. Go add some coupons!</center><br>";
  }

while ($c = mysql_fetch_array($live_qry)):

$now = date('Y-m-d');

$end = strtotime($c['removal_date']);
$nowsec = time();
$rdays = $end - $nowsec;
$daysleftR = ceil($rdays/86400);

if ($daysleftR > 1) { $daypluralR = "Days"; } else { $daypluralR = "Day"; }
?>

            <!--Start Coupon-->
            <div class="m-result-container">
                <a href="m-coupon.php?id=<?=$c['id_coupon']?>">
                <div class="m-result-coupon-container">
                    <div class="m-result-coupon-title"><?=$c['title']?></div>
                    <div class="m-result-content-container">
                    
                    <div class="m-result-image-container">
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
                        </div>
                    
                  <div class="m-results-price-box-container price-box-<?=$c['price']?>-dollar">
                            <div class="m-results-price">
                            $<?=$c['price']?>
                            </div>
                        </div><!--end m-use-button-container-->
                        
                        <div class="m-more-arrow"><img src="m-images/m-results-arrow.png" width="47" height="150" /></div>
                    </div><!--end m-use-content-container-->
                    
                    <div class="m-results-expires-on">Removed in: 
                        <span class='ends-in-numbers'><?=$daysleftR?> <?=$daypluralR?></span>

<?php
if ($c['max_purchases'] == "1")
 {
	echo "&nbsp;or&nbsp;<span class='ends-in-numbers'>".$c['max_purchases_num']." Sales</span>";
 }
?>
                    </div><!--end m-reuslts-expires-on-->
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->

<?php endwhile;?>

        </div>
        
        <div class="changeable second">
            <div class="m-merch-coupon-section-head m-expired-head-bg">
                Below are your EXPIRED coupons
            </div>
<?php

//Checks to see if there are any coupons
if (!$exp_num)  
  {
    echo "<center><br>You don't have any coupons that have expired yet.</center><br>";
  }

while ($c = mysql_fetch_array($exp_qry)):

$rdate = new DateTime($c['removal_date']);
$formatted_rdate = $rdate->format("m/d/y");

$coupon_view = mysql_fetch_array(mysql_query("SELECT sum(views) as views FROM CouZoo_Coupons WHERE id_user = '".$id_user."'"));
$views = $coupon_view[0];
?>

            <!--Start Coupon-->
            <div class="m-result-container">
                <a href="m-coupon.php?id=<?=$c['id_coupon']?>">
                <div class="m-result-coupon-container">
                    <div class="m-result-coupon-title"><?=$c['title']?></div>
                    <div class="m-result-content-container">
                    
                    <div class="m-result-image-container">
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
                        </div>
                    
                  <div class="m-results-price-box-container price-box-<?=$c['price']?>-dollar">
                            <div class="m-results-price">
                            $<?=$c['price']?>
                            </div>
                        </div><!--end m-use-button-container-->
                        
                        <div class="m-more-arrow"><img src="m-images/m-results-arrow.png" width="47" height="150" /></div>
                    </div><!--end m-use-content-container-->

                    <div class="m-results-expires-on">Expired: 
                        <span class='ends-in-numbers'><?=$formatted_rdate?></span>
                        &nbsp;with&nbsp;
                        <span class='ends-in-numbers'>-- sold</span>
                        &nbsp;and&nbsp;
                        <span class='ends-in-numbers'><?=$views?> views</span>
                    </div><!--end m-reuslts-expires-on-->
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->

<?php endwhile;?>
            
        </div>
        
        <div class="changeable third">
            <div class="m-merch-coupon-section-head m-pending-head-bg">
                Below are your PENDING coupons
            </div>
<?php

//Checks to see if there are any coupons
if (!$save_num)  
  {
    echo "<center><br>You don't have any coupons that are saved and upcoming.</center><br>";
  }

while ($c = mysql_fetch_array($save_qry)):

$udate = new DateTime($c['posting_date']);
$formatted_udate = $udate->format("m/d/y");

$start = strtotime($c['posting_date']);
$pdays = $start - $nowsec;
$daysleftP = ceil($pdays/86400);

if ($daysleftP > 1) { $daypluralP = "Days"; } else { $daypluralP = "Day"; }
?>

            <!--Start Coupon-->
            <div class="m-result-container">
                <a href="m-coupon.php?id=<?=$c['id_coupon']?>">
                <div class="m-result-coupon-container">
                    <div class="m-result-coupon-title"><?=$c['title']?></div>
                    <div class="m-result-content-container">
                    
                    <div class="m-result-image-container">
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
                        </div>
                    
                  <div class="m-results-price-box-container price-box-<?=$c['price']?>-dollar">
                            <div class="m-results-price">
                            $<?=$c['price']?>
                            </div>
                        </div><!--end m-use-button-container-->
                        
                        <div class="m-more-arrow"><img src="m-images/m-results-arrow.png" width="47" height="150" /></div>
                    </div><!--end m-use-content-container-->

                    <div class="m-results-expires-on">Goes live: 
                        <span class='ends-in-numbers'><?=$formatted_udate?></span>
                        , which is in&nbsp;
                        <span class='ends-in-numbers'><?=$daysleftP?> <?=$daypluralP?></span>
                    </div><!--end m-reuslts-expires-on-->
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->

<?php endwhile;?>
           
        </div>
	</div>


	<div class="bottom-nav-fixed-push"></div>
</div><!--End Container-->

<!--Start Bottom nav
<div class="bottom-nav-fixed">
    <div class="bottom-nav-container">
        <div class="view-my-account-btn"><a href="#">Filter Results</a></div>
        <div class="change-location-btn"><a href="#">Change Location</a></div>
    </div>
</div><!--End bottom nav-->

<script type="text/javascript" src="js/jquery.content.changer.js"></script>
<script type="text/javascript">
$(function() {
	$('#box').contentChanger({
		triggerClassName: 'box-trigger',
		triggerScope: 'body'
	});
});
</script>

</body>
</html>
