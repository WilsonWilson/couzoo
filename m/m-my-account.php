<?php
// include mobile header
include ("m-header.php");

$redirect = $couzoo->CheckLoginDash("customer-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("m-log-in.php");
    	exit;
}
elseif($redirect === "merchant")
{
    	$couzoo->RedirectToURL("m-merch-account.php");
    	exit;
}

//Get User Data
$id_user = $couzoo->GetUser();

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));

$jdate = new DateTime($user['joined_date']);
$formatted_jdate = $jdate->format("n/j/Y");

$purNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_My_Coupons WHERE id_user = '$id_user'"));
$usedNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_My_Coupons WHERE id_user = '$id_user' AND status = '1'"));
$watchingNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));

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

	<script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=toggler]").click(function() {
                $('.toHide').hide();
                $("#blk-" + $(this).val()).show('slow');
				$("#blk-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script> 
    
    <!--Expand and collapse div-->  
    <script type="text/javascript" src="js/expander.js"></script> 


<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' />

</head>

<body>
<div class="page-overlay"></div>

<!-- START Modal Content "change email" -->
<div class="close-change-location-modal3">close</div>
<div class="change-locaton-container3"style="margin-top:15%;">
    <div class="change-locaton-inner-container">
        <h2>Update Email</h2>
            <div id="m-advancedCall3">
                <input class="" type="text" name="" value="new email" />
                <br />
                <input class="" type="text" name="" value="confirm new email" />
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">update</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<!-- START Modal Content "change password" -->
<div class="close-change-location-modal4">close</div>
<div class="change-locaton-container4"style="margin-top:10%;">
    <div class="change-locaton-inner-container">
        <h2>Update Password</h2>
            <div id="m-advancedCall4">
            	<input class="" type="text" name="" value="current password" />
                <br />
                <input class="" type="text" name="" value="new password" />
                <br />
                <input class="" type="text" name="" value="confirm new password" />
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">update</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->
<!-- START Modal Content "Add Card" -->
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container"style="margin-top:10%;">
    <div class="change-locaton-inner-container">
        <h2>Add a Card</h2>
            <div id="m-advancedCall">
                <input class="" type="text" name="" value="name on card" />
                <br />
                <input class="" type="text" name="" value="card number" />
                <br />
                <input style="width:49%; float:left;" class="" type="text" name="" value="exp date" />
                <input style="width:49%; float:right;" class="" type="text" name="" value="3-digit code" />
        	</div>  
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer" style="width:90%;">
            <div class="m-use-now-button">
               <a href="#">
                <div class="use-this-coupon">add card</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->



<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">My Account</div>
    
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

    <div class="m-user-general-info-container">
    	<a href="" class="m-user-use-coupon box-trigger" data-activates="first" style="color:#fff;">Use a<br/>Coupon</a>
	    <div class="m-user-name"><?=$user['fname']?>  <?=$user['lname']?></div>
        
        <div class="m-user-coupon-stat">Coupons Purchased: <span><?=$purNum?></span> </div>
        <div class="m-user-coupon-stat">Coupons Used: <span><?=$usedNum?></span> </div>
        <div class="m-user-coupon-stat">Coupons Watching: <span><?=$watchingNum?></span> </div>
        
        <div class="m-user-email">Email: <span><?=$user['email']?></span></div>
        <div class="edit-info-link-container"><a class="edit-info edit-email-click" href="#" style="margin-top:-1.4em">edit email</a></div>
        <div class="m-user-password">Password: <span>******</span></div>
        <div class="edit-info-link-container"><a class="edit-info edit-pass-click" href="#" style="margin-top:-2.4em">edit password</a></div>
        
   		<div class="m-user-credit-card">
        	<span class="toggler" id="toggler-slideOne" style="font-weight:bold;">
            Billing Info        
            <span class="expandSlider">
            	<img src="m-images/div-open.jpg" width="38" height="38" />
            </span>
            <span class="collapseSlider">
            	<img src="m-images/div-close.jpg" width="38" height="38" />
            </span>
       		</span>
            <div class="slider" id="slideOne">
                <div class="add-card-link-container"><a class="add-card add-card-click" href="#">add a card</a></div>
                <form>
                	<div class="m-info-row">
                    <input type="radio" id="r1" class="radio1" name="customer-billing-preference" CHECKED  /><label for="r1"><span>Visa</span> <span>**** **** **** 1234</span></label> &nbsp; <a href="">X</a>       
                    </div>    
                    <div class="m-info-row">         
                    <input type="radio" id="r2" class="radio1" name="customer-billing-preference" /><label for="r2"><span>Visa</span> <span>**** **** **** 5678</span> </label> &nbsp; <a href="">X</a>
                    </div>
                </form>
             </div><!--End Slider-->
        </div><!--End m-user-credit-card-->
        
        <div class="m-my-account-coupon-nav-container">
            <div class="m-user-coupon-stat">My Coupons</div>
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
        
        
    </div><!--end m-user-general-infor-container-->
    
</div><!--End Container-->
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
<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".add-card-click").click(function(){
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
<script type="text/javascript">
		$(".edit-email-click").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container3").fadeIn('slow');
				$(".close-change-location-modal3").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container3").fadeOut('slow');	
			$(".close-change-location-modal3").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal3").click(function(){
			$(".change-locaton-container3").fadeOut('slow');	
			$(".close-change-location-modal3").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
	});			
</script>
<script type="text/javascript">
		$(".edit-pass-click").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container4").fadeIn('slow');
				$(".close-change-location-modal4").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container4").fadeOut('slow');	
			$(".close-change-location-modal4").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal4").click(function(){
			$(".change-locaton-container4").fadeOut('slow');	
			$(".close-change-location-modal4").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
	});			
</script>


</body>
</html>
