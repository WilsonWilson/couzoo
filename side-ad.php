<div id="divindiv<?=$i?>" class="side-ad-container side-ad-<?=$price?>-dollar-bg">

<div class="side-ad-price-box">
	$<?=$price?>
	<div class="changeable other-stuff" style="width:1px; height:56px;"></div>
</div>

<div class="side-ad-item-title">
	<?=$title?>
</div>

	<div class="side-ad-image-container">

	<?php if (strlen($title) > 42) { echo "<div class='elipse changeable default'>...</div>"; } ?>
    
      <div class="push-image changeable other-stuff"></div>
        <div class="side-ad-image">
            <img src="uploads/ads/side/<?=$id_coupon?>.jpg?<?=$last_modified?>" />
        </div>
        
        <div class="side-ad-view-detial changeable default">
        	<div class="view-detials-push">
                <div class="side-ad-distance">Distance: <?=$distance?> mi.</div>
                <a href="javascript:void(0);" class="side-ad-view-box trigger" data-activates="other-stuff">view</a>
            </div>
        </div>
    </div>

<br class="changeable default other-stuff" clear="all"/>


<!--<a href="javascript:void(0);" class="side-ad-view-box trigger changeable default" data-activates="other-stuff">
<div class="side-ad-open-btn changeable default"></div>
</a>-->

<div class="small-ad-content-2 changeable other-stuff">
	<div class="distance changeable default">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span> </div>
   
    <div class="ends-in changeable default">Removed in: <span class="ends-in-numbers"><?=$daysleft?> <?=$dayplural?></span>

	<?php
	if (($max_purchases == "1"))
 	{
		echo "<br>-or-&nbsp;&nbsp;<span class='ends-in-numbers'>$max_purchases_num Sales</span>";
 	}
	?>

    	</span>
    	</div>
    
    <br class="changeable other-stuff" clear="all"/>
    
    <div class="address-box">
    <span class="street"><?=$address?></span>
    </div>
    <div class="address-box">
    <span class="city"><?=$city?></span>, <span class="state"><?=$state?></span> <span class="zip"><?=$zip?></span>                				
    </div><!--End address-box-->
    <div class="company-phone"><?=$phone?></div>
    <div class="map"><a class="map fancybox fancybox.iframe" href="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$couponLat?>+<?=$couponLong?>&output=svembed&layer=c">open map</a></div>
    <div class="company-website"><a href="http://<?=$website?>" class="company-website"><?=$website?></a></div>

	<br class="changeable other-stuff" clear="all"/>

                	<div id="inline1_<?=$i?>" style="width:600px;display: none;">
                        <p>
                            <div class="restrictions-title">
					Description: 
				</div>
                <?=$description?>
                        </p>
                    </div>

                	<div id="inline2_<?=$i?>" style="width:600px;display: none;">
                        <p>
                            <div class="restrictions-title">
					Restrictions: 
				</div>
                <?=$restrictions?>
				<br><br>
				<div class="restrictions-date-line">
					This coupon is valid for redemption from: <br><br>
					<span class="valid-on"><?=$formatted_vdate?></span> - <span class="valid-off"><?=$formatted_edate?></span>
				</div>
                        </p>
                    </div>

    <div class="description"><a href="#inline1_<?=$i?>" class="description-link fancybox" >Description</a></div>
    <div class="need-to-know"><a href="#inline2_<?=$i?>" class="need-to-know-link fancybox" >Need to know</a></div>    
    <div class="company-profile"><a class="company-profile" href="/merchant/<?=$link?>">View Company Profile</a></div>
    
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
    
    
    <div class="social-share-side-ad changeable other-stuff">
        <span id="social-share-sml">
            <a href="http://www.twitter.com" target="_blank"><img src="images/twitter-sml.png" border="0"/></a>
            <a href="http://www.facebook.com" target="_blank"><img src="images/facebook-sml.png" border="0"/></a>
            <a href="http://plus.google.com" target="_blank"><img src="images/google-plus-sml.png" border="0"/></a>
            <a href="http://plus.google.com" target="_blank"><img src="images/pinterest-sml.png" border="0"/></a>
            <a href="mailto:"><img src="images/email-sml.png" border="0"/></a>
        </span>
    </div>
    
    <br clear="all" class="changeable other-stuff"/>
    
    <div class="close-side-ad">
    <a href="javascript:void(0);" class="side-ad-view-box trigger changeable other-stuff" data-activates="default">
    <img src="images/arrow-up.png" width="20" height="12" />
    </a>
    </div>
    
</div>

<a href="javascript:void(0);" class="sideAdLink changeable default trigger" data-activates="other-stuff"></a>

</div>

<script type="text/javascript">

$('#addCart_side_ad_<?=$i?>').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user_side_ad_<?=$i?>').attr('value'), id_coupon: $('#id_coupon_side_ad_<?=$i?>').attr('value'), type: 'Cart' },
        beforeSend: function(){
            $('#cartStatus_side_ad_<?=$i?>').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#cartStatus_side_ad_<?=$i?>').fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#cartNum').fadeIn(250).html(data.number);
            $('#cartItems').fadeIn(250).html(data.items);
        },
        error: function(data){
            $('#cartStatus_side_ad_<?=$i?>').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('#watchList_side_ad_<?=$i?>').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user_side_ad_<?=$i?>').attr('value'), id_coupon: $('#id_coupon_side_ad_<?=$i?>').attr('value'), type: 'Watch' },
        beforeSend: function(){
            $('#watchStatus_side_ad_<?=$i?>').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#watchStatus_side_ad_<?=$i?>').fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#watchNum').fadeIn(250).html(data.number);
            $('#watchItems').fadeIn(250).html(data.items);
        },
        error: function(data){
            $('#watchStatus_side_ad_<?=$i?>').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>