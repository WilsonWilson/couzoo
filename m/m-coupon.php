<?php
// include mobile header
include ("m-header.php");

$id_coupon = mysql_real_escape_string($_GET['id']);
$valid = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_coupon = '$id_coupon'"));

if (!$valid) { header('Location: m-results.php'); }

$views = mysql_query("UPDATE CouZoo_Coupons SET views = views + 1 WHERE id_coupon = '$id_coupon'");

$id_user = $couzoo->GetUser();

$c = mysql_fetch_array(mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Coupons.id_coupon = '$id_coupon' AND CouZoo_Coupons.id_user = CouZoo_Members.id_user"));

$dist = $couzoo->getDistance($userLong, $userLat, $c['longitude'], $c['latitude']);
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
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Coupon for <?=$c['bname']?></div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<!--END TOP BAR & MENU-->

<div class="container">

<!--Start Coupon-->
<div class="m-use-container">
    <div class="m-use-coupon-now-container">
        <div class="m-coupon-page-price-box-container price-box-<?=$c['price']?>-dollar m-coupon-page-price-box">
          <div class="m-results-price">
          	$<?=$c['price']?>
          </div>
        </div><!--end m-use-button-container-->
    
        <div class="m-coupon-page-title-container">
        	<?=$c['title']?>
        </div>
        
        <div class="m-coupon-page-distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></div>
            
        </div><!--end m-use-now-title-container-->
         
    </div><!--end m-use-coupon-container-->
    
	<div class="coupon-ends-in-container">
        <div class="m-results-expires-on">

<?php
if ($c['status'] == 'live')
 {
	echo "<span class='ends-in'>Removed in: <span class='ends-in-numbers'>$daysleftR $daypluralR</span>";
 }
elseif ($c['status'] == 'ended')
 {
	echo "<span class='ends-in'>Ended on: <span class='ends-in-numbers'>$removal_date</span>";
 }
elseif ($c['status'] == 'upcoming')
 {
	echo "<span class='ends-in'>Starts in: <span class='ends-in-numbers'>$daysleftP $daypluralP</span>";
 }
?>

<?php
if ($c['max_purchases'] == "1" && $c['status'] == 'live')
 {
	echo "&nbsp;&nbsp;-or-&nbsp;&nbsp;<span class='ends-in-numbers'>".$c['max_purchases_num']." Sales</span>";
 }
elseif ($c['status'] == 'ended')
 {
	echo "&nbsp; with &nbsp;<span class='ends-in-numbers'>".$c['max_purchases_num']." Sales</span>";
 }
?> 

        </div>
        
    </div><!--End of Ends in Container-->
                
    <div class="m-coupon-image-container">
      <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['date'])?>" />
    </div>
 
    <div class="m-blurb">
        <?=$c['coupon_desc']?>
    </div><!--End m-Blurb-->


    <div class="m-map-container">
        <iframe style="width:100%;height:600px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$c['latitude']?>+<?=$c['longitude']?>&output=svembed&layer=c"></iframe>
    </div>

	<div id="m-address-container">
        <div id="address-box">
        <span class="m-company-name"><?=$c['bname']?></span><br/>
            <span class="street"><?=$c['address']?></span>
        </div>
        <div id="address-box">
            <span class="city"><?=$c['city']?></span>, <span class="state"><?=$c['state']?></span> <span class="zip"><?=$c['zip']?></span>
        </div><!--End address-box-->
        <div class="company-phone"><?=$c['phone']?></div>
        <div class="company-website"><a href="http://<?=$c['website']?>" target="_blank" class="company-website"><?=$c['website']?></a></div>     
    </div><!--End address-contianer-->

	<div class="m-view-merch-profile"><a href="merchant/<?=$c['link']?>">View Merchant's Profile Page</a></div>

	<div class="m-need-to-know-container">
        <div class="title">Need to know</div>
            <p>
                <span class="restrictions-title"><b>Restrictions:</b>
		      		<?=$c['restrictions']?>
		  		</span>
		  		<br><br>
                <span class="restrictions-date-line">
                	This coupon is valid for redemption from:
                	<span class="valid-on"><?=$formatted_vdate?></span> - <span class="valid-off"><?=$formatted_edate?></span>
                </span>
          </p>
    </div>
                   
</div><!--end m-use-container-->
<!--END Coupon-->
   
<br clear="all"/>

<div class="m-use-now-push"></div>

<div class="m-coupon-bottom-fixed">
    <div id="theDiv"><img src="m-images/m-scroll-down-arrow.png" /> <span>scroll for more details</span> <img src="m-images/m-scroll-down-arrow.png" /></div>
    <div class="m-buy-now-container">
    		<div class="m-watch-now-button">
               <a class="m-watch-now-btn-link" href="#"> <div class="watch-this-coupon">watch</div></a>
            </div>
            <div class="m-buy-now-button">
		 <?php if($id_user):?>
                   <form action="m-check-out.php" method="POST" name="buy" id="buy-now">
			   <input type="hidden" name="id" value="<?=$c['id_coupon']?>">
		     </form>
		     <a href="#"> <div id="buy-btn" class="use-this-coupon">buy now</div></a>
		 <?php else:?>
                   <a href="m-log-in.php"> <div class="use-this-coupon">please login to buy now</div></a>
		 <?php endif;?>
            </div>
            <div class="added-to-watch">This coupon has been added to your watch list.</div>
    </div>
</div>

</div><!--End Container-->


</body>
</html>

<script>
$(".m-watch-now-btn-link").click(function(){
            $(".added-to-watch").show('slow');
			setTimeout(func, 2800);
				function func() {
					$(".added-to-watch").hide('slow');
				}
        })

</script>

<script>
$('#buy-btn').click(function() {
	$('#buy-now').submit();
});

</script>
