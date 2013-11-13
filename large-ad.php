<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$searchAdd = "CouZoo_Ads_Large.status = 'live' AND CouZoo_Ads_Large.id_coupon = CouZoo_Coupons.id_coupon";

// Select Coupons only with a Large Ad, then grab the bus info
$qry = mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Ads_Large, CouZoo_Coupons, CouZoo_Members WHERE $search AND $searchAdd LIMIT 1");
if (mysql_num_rows($qry) < 1) {
	$qry = mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Ads_Large, CouZoo_Coupons, CouZoo_Members WHERE $searchAdd ORDER BY removal_date LIMIT 1");
}

$res = mysql_fetch_array($qry);

// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
$id_coupon = $res['id_coupon'];
$title = $res['title'];
$price = $res['price'];
$posting_date = $res['posting_date'];
$removal_date = $res['removal_date'];
$max_purchases = $res['max_purchases'];
$max_purchases_num = $res['max_purchases_num'];
$valid_date = $res['valid_date'];
$exp_date = $res['exp_date'];
$restrictions = $res['restrictions'];
$description = $res['coupon_desc'];
$couponLat = $res['latitude'];
$couponLong = $res['longitude'];
$last_modified = strtotime($res['date']);

$dist = $couzoo->getDistance($userLong, $userLat, $couponLong, $couponLat);
$distance = round($dist, 2);
$unit = "miles";

// Grab the datbase data and outputs the information on the page - Grab the company info next
$phone = $res['phone'];
$website = $res['website'];
$address = $res['address'];
$city = $res['city'];
$state = $res['state'];
$zip = $res['zip'];
$link = $res['link'];

$end = strtotime("$removal_date");
$nowsec = time();
$days = $end - $nowsec;
$daysleft = ceil($days/86400);

if ($daysleft > 1) { $dayplural = "Days"; } else { $dayplural = "Day"; }

$vdate = new DateTime($valid_date);
$formatted_vdate = $vdate->format("l, F j");
$edate = new DateTime($exp_date);
$formatted_edate = $edate->format("l, F j");

?>

    <div id="divindiv" class="large-ad-container large-ad-<?=$price?>-dollar-bg">
        <div class="price-container price-box-<?=$price?>-dollar">
            <div class="price-box">$<?=$price?></div>
            <br clear="all"/>
            <div class="price-box-padding changeable default"></div>
            <div class="price-box-flat-bottom price-box-<?=$price?>-dollar changeable other-stuff"></div>
        </div>
        
        
        <div class="large-ad-image changeable default"><img width="285" height="190" src="uploads/ads/large/<?=$id_coupon?>.jpg?<?=$last_modified?>" /></div>
    
        <div id="large-ad-right-content">
        
        <div class="large-ad-item-title"><?=$title?></div>
        
        <span class="ends-in changeable other-stuff">Offer expires in: <span class="ends-in-numbers changeable other-stuff"><?=$daysleft?> <?=$dayplural?></span>

	<?php
	if (($max_purchases == "1"))
 	{
		echo "&nbsp;&nbsp;-or-&nbsp;&nbsp;<span class='ends-in-numbers changeable other-stuff'>$max_purchases_num Sales</span>";
 	}
	?>
	
	<img src="images/space.png" class="changeable other-stuff" width="1" height="2" border="0"/>
        </span>
        
        <span class="distance changeable other-stuff">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></span>
        
        <div class="large-ad-learn-more">
            <a href="javascript:void(0);" class="trigger changeable default" data-activates="other-stuff">View Details</a>
        </div>
        	           
        <div class="large-ad-image-2 changeable other-stuff">
            <img src="uploads/ads/large/<?=$id_coupon?>.jpg?<?=$last_modified?>" />
        </div>
        
        
        <div id="large-add-content-2" class="changeable other-stuff">
            
            <div class="large-ad-learn-more-2 changeable other-stuff">
        		<a href="javascript:void(0);" class="trigger changeable other-stuff" data-activates="default" >Hide Details</a>
		    </div>
        
        	<div class="social-share-sml-2 changeable other-stuff">
                <span id="social-share-sml">
                    <a href="http://www.twitter.com" target="_blank"><img src="images/twitter-sml.png" border="0"/></a>
                    <a href="http://www.facebook.com" target="_blank"><img src="images/facebook-sml.png" border="0"/></a>
                    <a href="http://plus.google.com" target="_blank"><img src="images/google-plus-sml.png" border="0"/></a>
                    <a href="http://plus.google.com" target="_blank"><img src="images/pinterest-sml.png" border="0"/></a>
                    <a href="mailto:"><img src="images/email-sml.png" border="0"/></a>
                </span>
            </div>
            
           
            
            <div id="large-ad-address-container">
                <div id="address-box">
                <span class="street"><?=$address?></span>
                </div>
                <div id="address-box">
				<span class="city"><?=$city?></span>, <span class="state"><?=$state?></span> <span class="zip"><?=$zip?></span>                				
                </div><!--End address-box-->
                <div class="company-phone"><?=$phone?></div>
                <br clear="all" class="changeable other-stuff"/>
				<div class="map"><a class="map fancybox fancybox.iframe" href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$couponLat?>+<?=$couponLong?>&output=svembed&layer=c">open map</a></div>
                <div class="company-website"><a href="http://<?=$website?>" class="company-website"><?=$website?></a></div>

                <br clear="all" class="changeable other-stuff"/>
                <div class="need-to-know"><a href="#inline1_large_ad" class="need-to-know-link fancybox" >Need to know</a></div>
                <br clear="all" class="changeable other-stuff"/>
                                
            </div><!--End address-blurb-box-->

                	<div id="inline1_large_ad" style="width:600px;display: none;">
                        <p>
                            <div class="restrictions-title">Restrictions:</div>
					 <?=$restrictions?>				
				<br><br>
				<div class="restrictions-date-line">
					This coupon is valid for redemption from: <br><br>
					<span class="valid-on"><?=$formatted_vdate?></span> - <span class="valid-off"><?=$formatted_edate?></span>
				</div>
                        </p>
                    </div>

            <div id="buttons-box-2">

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
               
            </div><!--End button-box-->
        
        </div>
        
                
        <div style="width:700px; height:80px"  class="changeable other-stuff">
        	
            <div class="large-ad-blurb changeable other-stuff">
			<?=$description?>
            </div><!--End Blurb-->
            
            <div class="large-ad-company-profile changeable other-stuff"><a class="company-profile" href="<?=$link?>">View Company Profile</a></div>  
            
            
		</div>
        
        
        <div class="large-ad-distance changeable default">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span> </div>
        
        <div class="ends-in changeable default">Offer expires in:
        <span class="ends-in-numbers"><?=$daysleft?> <?=$dayplural?></span>


	<?php
	if ($max_purchases == "1")
 	{
		echo "&nbsp;&nbsp;-or-&nbsp;&nbsp;<span class='ends-in-numbers'>$max_purchases_num Sales</span>";
 	}
	?>
	
	</div>
        
        <div class="large-ad-social-share-sml changeable default">
            <a href="http://www.twitter.com" target="_blank"><img src="images/twitter-sml.png" border="0"/></a>
            <a href="http://www.facebook.com" target="_blank"><img src="images/facebook-sml.png" border="0"/></a>
            <a href="http://plus.google.com" target="_blank"><img src="images/google-plus-sml.png" border="0"/></a>
            <a href="http://plus.google.com" target="_blank"><img src="images/pinterest-sml.png" border="0"/></a>
            <a href="mailto:"><img src="images/email-sml.png" border="0"/></a>
        </div>
        
         <a href="javascript:void(0);" class="trigger changeable default" data-activates="other-stuff"><div class="large-ad-click-map"></div></a>
        
        <div class="large-ad-buttons-box changeable default">
            <div class="large-ad-buy-now-btn"></div>
            <div class="large-ad-add-to-cart-btn"></div>
            <div class="large-ad-maybe-btn"></div>

        </div><!--END buttons-box-->
        
        </div><!--END large-ad-right-content-->
    	
        
    
    	<div class="changeable other-stuff" style="height:590px;"></div>
  </div>


<script type="text/javascript">

$('#addCart_large_ad').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user_large_ad').attr('value'), id_coupon: $('#id_coupon_large_ad').attr('value'), type: 'Cart' },
        beforeSend: function(){
            $('#cartStatus_large_ad').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#cartStatus_large_ad').fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#cartNum').fadeIn(250).html(data.number);
            $('#cartItems').fadeIn(250).html(data.items);
        },
        error: function(data){
            $('#cartStatus_large_ad').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('#watchList_large_ad').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user_large_ad').attr('value'), id_coupon: $('#id_coupon_large_ad').attr('value'), type: 'Watch' },
        beforeSend: function(){
            $('#watchStatus_large_ad').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#watchStatus_large_ad').fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#watchNum').fadeIn(250).html(data.number);
            $('#watchItems').fadeIn(250).html(data.items);
        },
        error: function(data){
            $('#watchStatus_large_ad').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>