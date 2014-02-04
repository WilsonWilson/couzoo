<?php
// include mobile header
include ("m-header.php");

$link = mysql_real_escape_string($_GET['bname']);

$bus = mysql_query("SELECT * FROM CouZoo_Members WHERE link = '".$link."' AND merchant = 'yes'");
$res = mysql_fetch_array($bus);
$valid = mysql_num_rows($bus);

if (!$valid) { header('Location: ../m-results.php'); }

$id_merchant = $res['id_user'];

$views = mysql_query("UPDATE CouZoo_Members SET profile_views = profile_views + 1 WHERE id_user = '".$id_merchant."'");

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_merchant."'"));

$id_user = $couzoo->GetUser();

$jdate = new DateTime($user['joined_date']);
$formatted_jdate = $jdate->format("n/j/Y");

$liveNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_merchant."' AND status = 'live'"));
$expNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_merchant."' AND status = 'ended'"));
$totalNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_merchant."'"));

$c_qry = mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_merchant."' AND status = 'live'");
$c_num = mysql_num_rows($c_qry);

$up_dir = "../";
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
<script src="<?=$up_dir?>js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="<?=$up_dir?>js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script src="<?=$up_dir?>js/mobile-menu.js" type="text/javascript"></script>

<link type='text/css' href='<?=$up_dir?>css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='<?=$up_dir?>css/mobile.css' rel='stylesheet' media='screen' />

<!--FADE OUT on scroll-->
<script type="text/javascript">
	$(window).scroll(function(){
		  if($(window).scrollTop()>12){
			 $("#theDiv").fadeOut();
		  }else{
			 $("#theDiv").fadeIn();
		  }
		});
</script>


</head>

<body>

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="<?=$up_dir?>m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Company Profile</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="<?=$up_dir?>m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-merch-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<!--END TOP BAR & MENU-->

<div class="container">

<!--Start Coupon-->
<div class="m-use-container">
    	<div class="m-merch-profile-page-title-container">
        	<h1><?=$user['bname']?></h1>
        </div>
</div><!--end m-use-coupon-container-->
                
    <div class="m-coupon-image-container">
      <img src="<?=$up_dir?>../../uploads/merchants/<?=$user['id_user']?>.jpg?<?=strtotime($user['last_update'])?>" />
    </div>
 
    <div class="m-blurb">
    	<?=$user['description']?> 
    </div><!--End m-Blurb-->
    
	<div class="merch-profile-demo-list">
        <ul>
            <li><span>Member Since:</span> <?=$formatted_jdate?></li>
            <li><span>Profile Views:</span> <?=$user['profile_views']?></li>
            <li><span>Total Live Coupons:</span> <?=$liveNum?></li>
            <li><span>Total Expired Coupons:</span> <?=$expNum?></li>
            <li><span>Total Coupons Created:</span> <?=$totalNum?></li>
        </ul>
    </div>


	<div class="m-map-container">
		<iframe style="width:100%;height:600px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$user['latitude']?>+<?=$user['longitude']?>&output=svembed&layer=c"></iframe>
    </div>

	<div id="m-address-container">
        <div id="address-box">
        <span class="m-company-name"><?=$user['bname']?></span><br/>
            <span class="street"><?=$user['address']?></span>
        </div>
        <div id="address-box">
            <span class="city"><?=$user['city']?></span>, <span class="state"><?=$user['state']?></span> <span class="zip"><?=$user['zip']?></span>
        </div><!--End address-box-->
        <div class="company-phone"><?=$user['phone']?></div>
        <div class="company-website"><a href="http://<?=$user['website']?>" target="_blank" class="company-website"><?=$user['website']?></a></div>     
    </div><!--End address-contianer-->


<div class="bottom-nav-fixed-push"></div>
		<div class="m-merch-profile-coupon-title-container">
        	<h2><?=$user['bname']?>'s Coupons</h2>
        </div>
        
        <!--START Coupon container-->

<?php

//Checks to see if there are any coupons
if (!$c_num)  
  {
    echo "<center><br>This company does not have any live coupons at the moment. Check back later!</center><br>";
  }

while ($c = mysql_fetch_array($c_qry)):

$dist = $couzoo->getDistance($userLong, $userLat, $user['longitude'], $user['latitude']);
$distance = round($dist, 2);
$unit = "miles";

$now = date('Y-m-d');

$end = strtotime($c['removal_date']);
$nowsec = time();
$rdays = $end - $nowsec;
$daysleftR = ceil($rdays/86400);

if ($daysleftR > 1) { $daypluralR = "Days"; } else { $daypluralR = "Day"; }

$start = strtotime($c['posting_date']);
$pdays = $start - $nowsec;
$daysleftP = ceil($pdays/86400);

if ($daysleftP > 1) { $daypluralP = "Days"; } else { $daypluralP = "Day"; }

$vdate = new DateTime($c['valid_date']);
$formatted_vdate = $vdate->format("l, F j");
$pur_vdate = $vdate->format("m/d/y");
$edate = new DateTime($c['exp_date']);
$formatted_edate = $edate->format("l, F j");
$pur_edate = $edate->format("m/d/y");
$pdate = new DateTime($c['posting_date']);
$formatted_pdate = $pdate->format("l, F j, Y");
?>

            <!--Start Coupon-->
            <div class="m-result-container">
                <a href="../m-coupon.php?id=<?=$c['id_coupon']?>">
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

			<div class="m-results-distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></div>
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->

<?php endwhile;?>

        
        <!--END coupon Container-->
                   
</div><!--end m-use-container-->
<!--END Coupon-->
   
<br clear="all"/>



<div class="m-coupon-bottom-fixed">
    <div id="theDiv"><img src="<?=$up_dir?>m-images/m-scroll-down-arrow.png" /> <span>scroll for more details</span> <img src="<?=$up_dir?>m-images/m-scroll-down-arrow.png" /></div>
</div>


</div><!--End Container-->

</body>
</html>
