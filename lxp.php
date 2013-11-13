<div id="le-tabs" class="example3 oldlook animSpeed-300 direction-horizontal  autoOrder-false autoplayInterval-10000">
			
<div id="le-tabs_tab_container">
				<a href="#first_content" id="first_tab" class="L-tab">L</a>
				<a href="#second_content" class="X-tab">X</a>
				<a href="#last_content" class="P-tab">P</a>
                
			</div>
			
			<div id="le-tabs_content_container">
				<div id="le-tabs_content_inner">

					<div id="first_content" class="le-tabs_content">
						<div id="L-top"></div>
                        <div id="LXP-section-title"><div id="L-section-title">Local</div></div>

<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$local = mysql_query("SELECT *, $sqlDist AS distance, removal_date - posting_date AS tleft FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Coupons.id_user = CouZoo_Members.id_user AND status = 'live' ORDER BY distance, tleft LIMIT 5");

$i=0;
while ($res = mysql_fetch_array($local)) {

// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
$id_coupon = $res['id_coupon'];
$title = $res['title'];
$price = $res['price'];
$posting_date = $res['posting_date'];
$removal_date = $res['removal_date'];
$couponLat = $res['latitude'];
$couponLong = $res['longitude'];

$dist = $couzoo->getDistance($userLong, $userLat, $couponLong, $couponLat);
$distance = round($dist, 2);
?>
                      
                        <div id="LXP-item-container">
                        <a href="view-coupon.php?id=<?=$id_coupon?>" class="LXP-link">
                        <div id="price-container"><div id="price-box" class="LXP-<?=$price?>-dollar-icon-bg"><?=$price?></div></div>
                        <div id="right-container">
                        <div class="LPX-title"><?=$title?></div>
                        <div id="distance">Distance: <span class="distance-number"><?=$distance?></span> mi.</div>
                        </div><!--END right-container-->
                        <br clear="all"/>
                        </a>
                        </div><!--END LXP-item-container-->
<?php
$i++;
}
?>

                       <div id="L-bottom"></div>
                    </div>

					<div id="second_content" class="le-tabs_content">
   						<div id="X-top"></div>
						<div id="LXP-section-title"><div id="X-section-title">Expiring</div></div>
                        

<?php
$exp = mysql_query("SELECT *, (removal_date - posting_date) AS tleft FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Coupons.id_user = CouZoo_Members.id_user AND status = 'live' ORDER BY tleft LIMIT 5");

$i=0;
while ($res = mysql_fetch_array($exp)) {

// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
$id_coupon = $res['id_coupon'];
$title = $res['title'];
$price = $res['price'];
$posting_date = $res['posting_date'];
$removal_date = $res['removal_date'];
$max_purchases = $res['max_purchases'];
$max_purchases_num = $res['max_purchases_num'];

$end = strtotime("$removal_date");
$nowsec = time();
$rdays = $end - $nowsec;
$daysleft = ceil($rdays/86400);

if ($daysleft > 1) { $dayplural = "Days"; } else { $dayplural = "Day"; }
?>
                        <div id="LXP-item-container">
                        <a href="view-coupon.php?id=<?=$id_coupon?>">
                        <div id="price-container"><div id="price-box" class="LXP-<?=$price?>-dollar-icon-bg"><?=$price?></div></div>
                        <div id="right-container">
                        <div class="LPX-title"><?=$title?></div>
                        <div id="ends-in"><span class="ends-in-numbers"><?=$daysleft?> <?=$dayplural?></span><br />

			<?php if ($max_purchases == "1") { echo "-or-&nbsp;<span class='ends-in-numbers'>$max_purchases_num Sales</span> Left"; } ?>

			</div>

                        </div><!--END right-container-->
                        <br clear="all"/>
                        </a>
                        </div><!--END LXP-item-container-->
<?php
$i++;
}
?>
					    <div id="X-bottom"></div>
                    </div>
                    
					<div id="last_content" class="le-tabs_content">
                    	<div id="P-top"></div>
						<div id="LXP-section-title"><div id="P-section-title">Popular</div></div>

<?php
$pop = mysql_query("SELECT * FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Coupons.id_user = CouZoo_Members.id_user AND removal_date AND status = 'live' ORDER BY views DESC LIMIT 5");

$i=0;
while ($res = mysql_fetch_array($pop)) {

// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
$id_coupon = $res['id_coupon'];
$title = $res['title'];
$price = $res['price'];
$views = $res['views'];
?>
                        
                        <div id="LXP-item-container">
                        <a href="view-coupon.php?id=<?=$id_coupon?>">
                        <div id="price-container"><div id="price-box" class="LXP-<?=$price?>-dollar-icon-bg"><?=$price?></div></div>
                        <div id="right-container">
                        <div class="LPX-title"><?=$title?></div>
                        <div id="total-sold">Total viewed: <span class="total-viewed-numbers"><?php printf("%04d", $views);?></span><br />
						Total sold: <span class="total-sold-numbers">0000</span></div>
                        </div><!--END right-container-->
                        <br clear="all"/>
                        </a>
                        </div><!--END LXP-item-container-->
<?php
$i++;
}
?>                                               
					  <div id="P-bottom"></div>
                    </div>

				</div>
			</div>
          </div>