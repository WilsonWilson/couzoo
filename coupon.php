<?php
$now = date('Y-m-d');

$end = strtotime("$removal_date");
$nowsec = time();
$rdays = $end - $nowsec;
$daysleftR = ceil($rdays/86400);

if ($daysleftR > 1) { $daypluralR = "Days"; } else { $daypluralR = "Day"; }

$start = strtotime("$posting_date");
$pdays = $start - $nowsec;
$daysleftP = ceil($pdays/86400);

if ($daysleftP > 1) { $daypluralP = "Days"; } else { $daypluralP = "Day"; }

$vdate = new DateTime($valid_date);
$formatted_vdate = $vdate->format("l, F j");
$pur_vdate = $vdate->format("m/d/y");
$edate = new DateTime($exp_date);
$formatted_edate = $edate->format("l, F j");
$pur_edate = $edate->format("m/d/y");
$pdate = new DateTime($posting_date);
$formatted_pdate = $pdate->format("l, F j, Y");

$exp = $now > $removal_date;
$saved = $now < $posting_date;

if ($now >= $posting_date && $now <= $removal_date) { $live = "true"; } else { $live = ""; }
?>

<li>
		<h3>
        <span id="price-box" class="price-box-<?=$price?>-dollar">$<?=$price?></span>
        <span id="header-right">
        <span id="item-title"><?=$title?></span>
        <span class="second-line-content-container">
            <span id="header-right-exp-date">

<?php
if ($purchased)
 {
	echo "<span class='ends-in'>Valid from: <span class='ends-in-numbers'>$pur_vdate - $pur_edate</span>";
 }
elseif ($live)
 {
	echo "<span class='ends-in'>Removed in: <span class='ends-in-numbers'>$daysleftR $daypluralR</span>";
 }
elseif ($exp)
 {
	echo "<span class='ends-in'>Ended on: <span class='ends-in-numbers'>$removal_date</span>";
 }
elseif ($saved)
 {
	echo "<span class='ends-in'>Starts in: <span class='ends-in-numbers'>$daysleftP $daypluralP</span>";
 }
?>

<?php
if ($max_purchases == "1" && $live && !$purchased)
 {
	echo "&nbsp;&nbsp;-or-&nbsp;&nbsp;<span class='ends-in-numbers'>$max_purchases_num Sales</span>";
 }
elseif ($exp)
 {
	echo "&nbsp; with &nbsp;<span class='ends-in-numbers'>$max_purchases_num Sales</span>";
 }
?>
        </span>
	 </span>

<?php
if ($url != "/merchant-dash.php") {
?>
        <span id="distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></span>
<?php
}
?>
        
        <span id="social-share-sml">
        <a href="http://www.twitter.com" target="_blank"><img src="../images/twitter-sml.png" border="0"/></a>
        <a href="http://www.facebook.com" target="_blank"><img src="../images/facebook-sml.png" border="0"/></a>
        <a href="http://plus.google.com" target="_blank"><img src="../images/google-plus-sml.png" border="0"/></a>
        <a href="http://plus.google.com" target="_blank"><img src="../images/pinterest-sml.png" border="0"/></a>
        <a href="mailto:"><img src="../images/email-sml.png" border="0"/></a>
        </span>
        </span>
	 </span><!-- END second-line-content-container-->
        </h3>
        
		<div class="acc-section">
			<div class="acc-content">
				<div id="item-image"><img src="../uploads/coupons/<?=$id_coupon?>.jpg?<?=$last_modified?>" border="0" class="coupon-image"/>
                <div class="company-profile"><a class="company-profile" href="/merchant/<?=$link?>">View Company Profile</a></div>

                	<div id="inline1<?=$i?>" style="width:600px;display: none;">
                        <p>
                           			<!-- <div class="restrictions-title"></div> -->
                                    <div class="restrictions-title">Restrictions:</div>
					 <?=$restrictions?>
				<br><br>
				<div class="restrictions-date-line">
					This coupon is valid for redemption from: <br><br>
					<span class="valid-on"><?=$formatted_vdate?></span> - <span class="valid-off"><?=$formatted_edate?></span>
				</div>
                        </p>
                    </div>
                </div>

                <div id="address-container">
                <div id="address-box">
                <span class="street"><?=$address?></span>
                </div>
                <div id="address-box">
				<span class="city"><?=$city?></span>, <span class="state"><?=$state?></span> <span class="zip"><?=$zip?></span></div><!--End address-box-->
                <div class="company-phone"><?=$phone?></div>
				<div class="map"><a class="map fancybox fancybox.iframe" href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$couponLat?>+<?=$couponLong?>&output=svembed&layer=c">open map</a></div>
                <div class="company-website"><a href="http://<?=$website?>" target="_blank" class="company-website"><?=$website?></a></div>
                
                <div class="need-to-know"><a href="#inline1<?=$i?>" class="need-to-know-link fancybox" >Need to know</a></div>
                
                </div><!--End address-blurb-box-->
                              
               
                <div id="buttons-box">

<?php
if ($used)
 {
?>

	 <div id="<?=$id_coupon?>" class="markUsed" style="cursor: pointer;">You have already used this coupon.</div>
	 <br>
<?php
} elseif ($purchased)
 {
?>

        <form id="markUsed_form" action="cart-check-out.php" method="post">
	 <center><span class="usedStatus_<?=$id_coupon?>" id="usedStatus_<?=$id_coupon?>"></span></center>
	 <div id="<?=$id_coupon?>" class="markUsed" style="cursor: pointer;">Mark coupon as used</div>
        </form>
	 <br>
<?php
} elseif ($live) {
?>

        <form id="buyNow" action="cart-check-out.php" method="post">
	 <input type="hidden" value="<?=$id_coupon?>" id="id_coupon" name="coupon_id">
        <div id="buyNow" class="buy-now-btn"></div>
        </form>

	 <div style="padding-bottom: 2px;"></div>

        <form id="addCart" action="" method="post">
	 <center><span class="cartStatus_<?=$id_coupon?>" id="cartStatus_<?=$id_coupon?>"></span></center>
        <div id="<?=$id_coupon?>" class="add-to-cart-btn"></div>
        </form>

	 <div style="padding-bottom: 2px;"></div>

        <form id="watchList" action="" method="post">
	 <center><span class="watchStatus_<?=$id_coupon?>" id="watchStatus_<?=$id_coupon?>"></span></center>
        <div id="<?=$id_coupon?>" class="maybe-btn"></div>
        </form><br>

<?php
} elseif ($exp) {
?>             
	This coupon has expired
<?php
} elseif ($saved) {
?>
	 <b>This coupon will be available on <?=$formatted_pdate?></b> <br><br><br>

        <form id="watchList" action="" method="post">
	 <center><span class="watchStatus_<?=$id_coupon?>" id="watchStatus_<?=$id_coupon?>"></span></center>
        <div id="<?=$id_coupon?>" class="maybe-btn"></div>
        </form><br>
<?php 
} 
?>
                </div><!--End button-box-->
                <div id="blurb">
		  	<?=$description?>
		  </div><!--End Blurb-->

                <br clear="all"/>
                 
			</div>
		</div>
	</li>