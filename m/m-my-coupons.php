<?php
// include mobile header
include ("m-header.php");

$redirect = $couzoo->CheckLoginDash("customer-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("m-log-in.php");
    	exit;
}

//Get User Data
$id_user = $couzoo->GetUser();

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));
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
    
    <div class="m-use-page-title">My Coupons</div>
    
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
        
        <div class="m-my-account-coupon-nav-container">
            <ul>
                <li class="unused"><a href="javascript:void(0);" class="box-trigger" data-activates="first">Unused</a></li>
                <li class="watching"><a href="javascript:void(0);" class="box-trigger" data-activates="second">Watching</a></li>
                <li class="used"><a href="javascript:void(0);" class="box-trigger" data-activates="third">Used</a></li>
            </ul>
        </div><!--END m-my-account-coupon-nav-container-->
        
        
        <div id="box">
        <div class="changeable default">
        </div>
        <div class="changeable first">
            <div class="m-merch-coupon-section-head m-live-head-bg">
                Below are your UNUSED coupons
            </div>

<?php
$c_pur = mysql_query("SELECT * FROM CouZoo_Coupons AS coup 
				   LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				   LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
				   WHERE my.id_user = '$id_user' AND my.status = '0'");
$i=0;
while ($c = mysql_fetch_array($c_pur)):

$pur_date = new DateTime($c['pdate']);
$pdate = $pur_date->format("m/d/y");
$exp_date = new DateTime($c['exp_date']);
$edate = $exp_date->format("m/d/y");
?>
            <!--Start Coupon-->
                <div class="m-use-container">
                    <div class="m-use-coupon-container">
                        <div class="m-use-coupon-title"><?=$c['title']?></div>
                        <div class="m-use-content-container">
                            <div class="m-use-image-container">
                              <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['cdate'])?>" />
                            </div>
                            <div class="m-use-button-container">
                                <div class="m-use-coupon-use-coupon">
                                    <div class="use-this-coupon">use this coupon</div>
                                    <a href="m-use-now.php?id=<?=$c['id_coupon']?>"></a>
                                </div><!--end m-use-coupon-use-coupon-->
                            </div><!--end m-use-button-container-->
                        </div><!--end m-use-content-container-->
                        <div class="m-used-purchased-on">Purchased: <span><?=$pdate?></span></div>
                        <div class="m-used-valid-thru">Valid Thru: <span><?=$edate?></span></div>
                        <br clear="all"/>
                    </div><!--end m-use-coupon-container-->
                </div><!--end m-use-container-->
            <!--END Coupon-->
<?php 
    $i++;
    endwhile;

    if ($i < 1)
    {
  	echo '<div class="m-use-container"><div class="m-use-coupon-container"><center>You currently do not have any unused coupons. Go out and find some!</center></div></div>';
    }
?>
                
        </div>
        
        <div class="changeable second">
            <div class="m-merch-coupon-section-head m-expired-head-bg">
                Below are the coupons you are WATCHING
            </div>

<?php
$c_watching = mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc, removal_date - posting_date AS tleft 
		      FROM CouZoo_Watch, CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Watch.id_user = '$id_user' 
		      AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.id_user = CouZoo_Members.id_user 
		      ORDER BY tleft");
$i=0;
while ($c = mysql_fetch_array($c_watching)):

$dist = $couzoo->getDistance($user['longitude'], $user['latitude'], $c['CouZoo_Members.longitude'], $c['CouZoo_Members.latitude']);
$distance = round($dist, 2);
$unit = "miles";

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
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['cdate'])?>" />
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
                    
                    <div class="m-results-distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></div>
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->
<?php 
    $i++;
    endwhile;

    if ($i < 1)
    {
  	echo '<div class="m-use-container"><div class="m-use-coupon-container"><center>You are not currently watching any coupons.</center></div></div>';
    }
?>
        </div>
        
        <div class="changeable third">
            <div class="m-merch-coupon-section-head m-pending-head-bg">
                Below are your USED coupons
            </div>

<?php
$c_used = mysql_query("SELECT * FROM CouZoo_Coupons AS coup 
				    LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				    LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
				    WHERE my.id_user = '$id_user' AND my.status = '1'");
$i=0;
while ($c = mysql_fetch_array($c_used)):

$dist = $couzoo->getDistance($user['longitude'], $user['latitude'], $c['memb.longitude'], $c['memb.latitude']);
$distance = round($dist, 2);
$unit = "miles";

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
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['cdate'])?>" />
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
                    
                    <div class="m-results-distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></div>
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->
<?php 
    $i++;
    endwhile;

    if ($i < 1)
    {
  	echo '<div class="m-use-container"><div class="m-use-coupon-container"><center>You do not have any used coupons yet.</center></div></div>';
    }
?>
        </div>
	</div>

<script type="text/javascript"/><!--scroll to CAC on click-->
	$('.box-trigger').mouseup(function(){
			setTimeout(func, 1200);
				function func() {
					$("html, body").animate({ scrollTop: 700 }, 600);
				return false;
			}
	});
</script>

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
