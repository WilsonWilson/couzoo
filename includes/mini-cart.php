<link rel="stylesheet" href="css/mini-cart-styles.css" type="text/css"/>

<script type="text/javascript">
setTimeout('yourFunction();', 725);

function yourFunction(){
    document.getElementById('mini-cart').style.display='block';
}
</script>

	<!--Mini-Cart Slide out-->
    
	<script src="js/jquery.tabSlideOut.v1.3.js"></script>
	<script type="text/javascript" src="js/miini-cart-settings.js"></script>  


<div id="mini-cart" class="mini-cart" style="display:none;">

<div id="advancedCall-minicart">

<form id="checkOut" action="cart-check-out.php" method="post">

<!-- Tell check out page that there are items in user's cart, so just take coupons from there -->
<input type="hidden" name="check_out_coupons" value="true">
            
<div class="slide-out-div">
    <a class="handle" href="http://link-for-non-js-users.html">
       <div class="in-cart-icon">
            	<span id="cartNum" class="number">
			<?php $cartNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user'"));
			echo $cartNum;
			?>
		</span>
       </div>
    </a>

    <div class="cart-content-container">
		    
    <div class="cart-header">
            <div class="name-box">Items in Your Cart</div>
            <span class="price-box">Price</span>
            <span class="quantity-box">Qty.</span>
            <span class="total-box">Total</span>
    </div>
        
    <br clear="all"/>
        
    <div class="cart-container"><!--In Cart section-->

       <div id="cart-item-container">
	<div id='clearCart'>
		<li>&nbsp;</li>
	</div>

<div id="loader"><img src="images/ajax-loader.gif"></div>
<div id='emptyCart'>

<?php
if ($cartNum == 0) { echo "<div id='emptyCartMsg'>Your cart is currently empty</div>"; };
$tQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Cart WHERE id_user = '$id_user'"));

$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");

while ($cart = mysql_fetch_array($cart_qry)) {
       $tPrice += $cart['total'];
	include("cart-item.php");
}
?>

</div>

<script type="text/javascript">
$('#cart-item-container').delegate(".remove.cart", "click", function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Remove Cart' },
        beforeSend: function(){
            $('#cartItems_' + cid).hide();
            $('#loader').show();
        },
        success: function(data){
            $('#loader').hide();
            $('#cartItems_' + cid).remove();
            $('#rmCartStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#cartNum').fadeIn(250).html(data.number);
            $('#totalQty').fadeIn(250).html(data.tQty);
            $('#totalPrice').fadeIn(250).html(data.tPrice);
	     if (data.number == 0) {
                $('#clearCart').html('<li>&nbsp;</li><div id="loader"><img src="images/ajax-loader.gif"></div><div id="emptyCart"></div>');
           	  $('#emptyCart').delay(3500).fadeIn(250).html('<div id="emptyCartMsg">Your cart is currently empty</div>');
           	  $('#totalQty').fadeOut(250).hide();
           	  $('#totalPrice').fadeOut(250).hide();
	     }
        },
        error: function(data){
            $('#loader').hide();
            $('#cartItems_' + cid).show();
            $('#rmCartStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('.quantity-box.cart input').live('change', function() { 
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, qty: $(this).attr('value'), type: 'Cart Qty' },
        success: function(data){
           $('#qtyStatus').css('color', 'green').fadeIn(250).html('Updated!').delay(2500).fadeOut(250);
           $('#totalQty').fadeIn(250).html(data.tQty);
           $('#tCPrice_' + cid).fadeIn(250).html(data.tCPrice);
           $('#totalPrice').fadeIn(250).html(data.tPrice);
        },
        error: function(data){
            $('#qtyStatus').fadeIn(250).css('color', '#ff464a').html('Error..').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>

	</div><!--END cart-item-container-->

	<div class="line"></div>

    <div class="promo-code-container">
    <div class="title">Enter Promotional Code:</div>
          <input class="myclass" type="text" name="promoCode" value="" />
    </div><!--End Promo code container-->


<div class="totals-row">

<span class="quantity-box" id="totalQty"><?=$tQty[0]?></span>
<span class="total-box" id="totalPrice"><?php if ($tPrice) { echo "$".$tPrice; } ?></span>
<div class="item-buttons-box">
<a href="" class="update"></a>
<div class="empty cart"></div>
</div>
</div><!--END totals-row-->


</div>
<div id="cart-bottom-content">
<span id="qtyStatus"></span>
<div class="check-out"><a href="#" class="check-out-btn"></a></div>
</div><!--END cart-bottom-content-->
</div><!--END cart-container-->

</div><!--END cart-content-container-->

<script type="text/javascript">
$('.check-out-btn').click(function() {
	$(this).closest("form").submit();
});

$('.empty.cart').click(function() { 
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', type: 'Empty Cart' },
        success: function(data){
           $('#emptyCart').remove();
           $('#clearCart').html('<li>&nbsp;</li><div id="loader"><img src="images/ajax-loader.gif"></div><div id="emptyCart"></div>');
           $('#emptyCart').delay(3500).fadeIn(250).html('<div id="emptyCartMsg">Your cart is currently empty</div>');
           $('#qtyStatus').fadeIn(250).css('color', 'green').html('Cart Emptied').delay(2500).fadeOut(250);
           $('#totalQty').fadeOut(250).hide();
           $('#totalPrice').fadeOut(250).hide();
           $('#cartNum').fadeIn(250).html('0');
        },
        error: function(data){
            $('#qtyStatus').fadeIn(250).css('color', '#ff464a').html('Error..').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>

</form>


<!--Start Watching Section-->    
    
<div class="slide-out-div2">
    <a class="handle2" href="http://link-for-non-js-users.html">
    <div class="in-cart-icon">
    <div class="number">
            	<span id="watchNum" class="number">
			<?php $watchNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));
			echo $watchNum;
			?>
		</span>
	</div>
    </div>
    </a>
     <div class="cart-content-container">
    
    <div class="cart-header">
        <div class="name-box">Items You Are Watching</div>
        <span class="price-box">Price</span>
        <span class="quantity-box">Qty.</span>
        <span class="total-box">Total</span>
    </div>

	<br clear="all"/>

    <div class="cart-container"><!--In Cart section-->
    
        <div id="watching-item-container">
	 <div id='clearWatch'>
		<li>&nbsp;</li>
	 </div>

<div id="loader" class="watchLoader"><img src="images/ajax-loader.gif"></div>
<div id='emptyWatch'>

<?php
if ($watchNum == 0) { echo "<div id='emptyWatchMsg'>Your watch list is currently empty</div>"; };
$wQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Watch WHERE id_user = '$id_user'"));

$watch_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon");

while ($watch = mysql_fetch_array($watch_qry)) {
       $wPrice += $watch['total'];
	include("watch-item.php");
}
?>

</div>

<script type="text/javascript">
$('#watching-item-container').delegate(".remove.watch", "click", function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Remove Watch' },
        beforeSend: function(){
            $('#watchItems_' + cid).hide();
            $('.watchLoader').show();
        },
        success: function(data){
            $('.watchLoader').hide();
            $('#watchItems_' + cid).remove();
            $('#rmWatchStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#watchNum').fadeIn(250).html(data.number);
            $('#watchTQty').fadeIn(250).html(data.tQty);
            $('#watchTPrice').fadeIn(250).html(data.tPrice);
	     if (data.number == 0) {
           	  $('#clearWatch').html('<li>&nbsp;</li><div id="loader"><img src="images/ajax-loader.gif" class="watchLoader"></div><div id="emptyWatch"></div>');
            	  $('#emptyWatch').delay(3500).fadeIn(250).html('<div id="emptyWatchMsg">Your watch list is currently empty</div>');
           	  $('#watchTQty').fadeOut(250).hide();
           	  $('#watchTPrice').fadeOut(250).hide();
	     }
        },
        error: function(data){
            $('.watchLoader').hide();
            $('#watchItems_' + cid).show();
            $('#rmWatchStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('.quantity-box.watch input').live('change', function() { 
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, qty: $(this).attr('value'), type: 'Watch Qty' },
        success: function(data){
           $('#qtyWStatus').css('color', 'green').fadeIn(250).html('Updated!').delay(2500).fadeOut(250);
           $('#watchTQty').fadeIn(250).html(data.tQty);
           $('#wCPrice_' + cid).fadeIn(250).html(data.tCPrice);
           $('#watchTPrice').fadeIn(250).html(data.tPrice);
        },
        error: function(data){
            $('#qtyWStatus').fadeIn(250).css('color', '#ff464a').html('Error..').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('#watching-item-container').delegate(".add-to-cart-watching", "click", function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Watch Add Cart' },
        beforeSend: function(){
            $('#watchItems_' + cid).hide();
            $('.watchLoader').show();
        },
        success: function(data){
	   if(data.success == true) {
            $('.watchLoader').hide();
            $('#watchItems_' + cid).remove();
            $('#rmWatchStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#watchNum').fadeIn(250).html(data.number);
            $('#watchTQty').fadeIn(250).html(data.tQty);
            $('#watchTPrice').fadeIn(250).html(data.tPrice);
            $('#cartNum').fadeIn(250).html(data.cartNum);
	     $("#cart-item-container li:first").after(data.items);
            $('#emptyCart').remove();
            $('#totalQty').fadeIn(250).html(data.cartQty);
            $('#totalPrice').fadeIn(250).html(data.tCartPrice);
	     if (data.number == 0) {
            	  $('#clearWatch').html('<li>&nbsp;</li><div id="loader"><img src="images/ajax-loader.gif" class="watchLoader"></div><div id="emptyWatch"></div>');
            	  $('#emptyWatch').delay(3500).fadeIn(250).html('Your watch list is currently empty');
           	  $('#watchTQty').fadeOut(250).hide();
           	  $('#watchTPrice').fadeOut(250).hide();
	     }
	   } else {
            $('.watchLoader').hide();
            $('#watchItems_' + cid).show();
            $('#rmWatchStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
	   }
        },
        error: function(data){
            $('.watchLoader').hide();
            $('#watchItems_' + cid).show();
            $('#rmWatchStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>
            
       </div><!--END promo-code-container-->
    
    <div class="line"></div>

<div style="float: left">
<span id="qtyWStatus"></span>
</div>

<div class="totals-row">
	<span class="quantity-box" id="watchTQty"><?=$wQty[0]?></span>
	<span class="total-box" id="watchTPrice"><?php if ($wPrice) { echo "$".$wPrice; } ?></span>
	<div class="item-buttons-box">
		<a href="" class="update"></a>
		<div class="empty watch"></div>
	</div>
</div><!--END totals-row-->
    
    
    </div>

</div><!--END cart-container-->
        
</div>
  
</div>        

</div>

<script type="text/javascript">
$('.empty.watch').click(function () {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', type: 'Empty Watch' },
        success: function(data){
           $('#emptyWatch').remove();
           $('#clearWatch').html('<li>&nbsp;</li><div id="loader"><img src="images/ajax-loader.gif" class="watchLoader"></div><div id="emptyWatch"></div>');
           $('#emptyWatch').delay(3500).fadeIn(250).html('<div id="emptyWatchMsg">Your watch list is currently empty</div>');
           $('#qtyWStatus').fadeIn(250).css('color', 'green').html('Watch List Emptied').delay(2500).fadeOut(250);
           $('#watchTQty').fadeOut(250).hide();
           $('#watchTPrice').fadeOut(250).hide();
            $('#watchNum').fadeIn(250).html('0');
        },
        error: function(data){
            $('#qtyWStatus').fadeIn(250).css('color', '#ff464a').html('Error..').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>