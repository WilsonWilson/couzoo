<?php

$end = strtotime("$watch[removal_date]");
$nowsec = time();
$rdays = $end - $nowsec;
$daysleftR = ceil($rdays/86400);

if ($daysleftR > 1) { $daypluralR = "Days"; } else { $daypluralR = "Day"; }
?>

	<center><span class="rmWatchStatus_<?=$watch['id_coupon']?>" id="rmWatchStatus_<?=$watch['id_coupon']?>"></span></center>

		<div id="watchItems_<?=$watch['id_coupon']?>" class="item-row">
                <div class="name-box">
			<a href="view-coupon?id=<?=$watch['id_coupon']?>" style="text-decoration: none; color: #666;"><?=$watch['title']?></a>
		  </div>

                <div class="price-box">
			$<?=$watch['price']?>
		  </div>

                <div class="quantity-box watch">
			<input class="myclass" id="<?=$watch['id_coupon']?>" type="text" value="<?=$watch['qty']?>" style="width:30px;"/>
		  </div>

                <div class="total-box" id="<?=$watch['id_coupon']?>">
			<span id="wCPrice_<?=$watch['id_coupon']?>">$<?=$watch['total']?></span>
		  </div>

                <div class="item-buttons-box">
                	<a href="view-coupon?id=<?=$watch['id_coupon']?>" class="details"></a>
        		<form id="rmWatch" action="" method="post">
                    		<div id="<?=$watch['id_coupon']?>" class="remove watch"></div>
			</form>
                </div>
                
                <div class="time-left-box">
                    <span class='ends-in'>Removed in: <span class='ends-in-numbers'><?=$daysleftR?> <?=$daypluralR?>

<?php
if ($watch[max_purchases] == "1")
 {
	echo "&nbsp;&nbsp;-or-&nbsp;&nbsp;<span class='ends-in-numbers'>$watch[max_purchases_num] Sales</span>";
 }
?>
		</span>
                </div>

                <div class="item-buttons-box">
                    <div id="<?=$watch['id_coupon']?>" class="add-to-cart-watching"></div>
                </div>
            </div><!--END item-row-->