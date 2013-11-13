	 <center><span class="rmCartStatus_<?=$cart['id_coupon']?>" id="rmCartStatus_<?=$cart['id_coupon']?>"></span></center>
       
            <div id="cartItems_<?=$cart['id_coupon']?>" class="item-row">
                <div class="name-box">
			<a href="view-coupon?id=<?=$cart['id_coupon']?>" style="text-decoration: none; color: #666;"><?=$cart['title']?></a>
		  </div>

                <div class="price-box">
			$<?=$cart['price']?>
		  </div>

                <div class="quantity-box cart">
			<input class="myclass" id="<?=$cart['id_coupon']?>" type="text" value="<?=$cart['qty']?>" style="width:30px;"/>
		  </div>

                <div class="total-box" id="<?=$cart['id_coupon']?>">
			<span id="tCPrice_<?=$cart['id_coupon']?>">$<?=$cart['total']?></span>
		  </div>

                <div class="item-buttons-box">
                	<a href="view-coupon?id=<?=$cart['id_coupon']?>" class="details"></a>
        		<form id="rmCart" action="" method="post">
        			<div id="<?=$cart['id_coupon']?>" class="remove cart"></div>
        		</form>         
		  </div>
            </div><!--END item-row-->
