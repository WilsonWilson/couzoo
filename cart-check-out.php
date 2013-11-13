<?php
	require_once("includes/config.php");
	$couzoo->CheckLogin();
	$cur_mon = date('m');
	$cur_year = date('Y');
	$empty_cart = "";
	
	// Get coupon (buy now) or coupons (from cart)
	$coupon_id = mysql_real_escape_string($_POST['coupon_id']);
	$check_out = $_POST['check_out_coupons'];

       if ($_POST['checkout'] == 'true') {
		
		// Post info for purchase
		$payer_id = mysql_real_escape_string($_POST['payer_id']);
		$total = mysql_real_escape_string($_POST['total']);
		$cc_id = mysql_real_escape_string($_POST['cc_id']);
		$coupon_ids = $_POST['coupon_ids'];
		
		// Card is saved, get the info, else post the new CC info
		if ($cc_id) {
			$cc = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Cards WHERE id = '$cc_id'"));
			$saved_cc = 'true';
		} else {
			$cc = $_POST['new_cc'];
			$cc_last_four = substr(mysql_real_escape_string($cc['number']), -4);
			$cc_lname = mysql_real_escape_string($cc['lname']);
			$cc_month = mysql_real_escape_string($cc['exp_month']);
			$cc_check = mysql_query("SELECT *, SUBSTRING(number, -4) AS num FROM CouZoo_Cards HAVING num = '$cc_last_four' AND lname = '$cc_lname' AND exp_month = '$cc_month'");
			if (mysql_num_rows($cc_check)) {
				$cc = mysql_fetch_array($cc_check);
				$saved_cc = 'true';
			}
		}

		if (!$cc) {
		    $err = "There was no credit card selected. Please either use an existing card or add a new one!";
		}

		
		if ($err == "") {

		include("includes/paypal.php");
		$pp = new PayPal();
		$url = $pp->host.'/v1/oauth2/token'; 
		$postArgs = 'grant_type=client_credentials';
		$token = $pp->get_access_token($url,$postArgs);
		$url = $pp->host.'/v1/payments/payment';
		
		if ($saved_cc) {
			$payment = array(
				'intent' => 'sale',
				'payer' => array(
					'payment_method' => 'credit_card',
                        		'funding_instruments' => array ( array(
                                        'credit_card_token' => array ('credit_card_id' => $cc['card_id'], 'payer_id' => $cc['payer_id'])))),
				'transactions' => array (array('amount' => array('total' => $total, 'currency' => 'USD' ), 'description' => 'Payment for coupons at CouZoo.com'))
			);
		} else {
			$payment = array(
				'intent' => 'sale',
				'payer' => array(
					'payment_method' => 'credit_card',
					'funding_instruments' => array ( array(
						'credit_card' => array (
							'number' => $cc['number'],
							'type'   => $cc['type'],
							'expire_month' => $cc['exp_month'],
							'expire_year' => $cc['exp_year'],
							'cvv2' => $cc['cvv'],
							'first_name' => $cc['fname'],
							'last_name' => $cc['lname']
					)))),
				'transactions' => array (array('amount' => array('total' => $total, 'currency' => 'USD' ), 'description' => 'Payment for coupons at CouZoo.com'))
			);
		}

		$json = json_encode($payment);
		$json_resp = $pp->make_post_call($url, $json);

		if ($json_resp['state'] == 'approved') {
			$payment_id = $json_resp['id'];
			//print_r($json_resp['transactions']);
			$sale_id = $json_resp['related_resources'][0]['sale']['id'];
			$state = $json_resp['related_resources'][0]['sale']['state'];
			//echo $payment_id."<br><br>".$sale_id."<br><br>".$state;

			$coupons = $coupon_id ? $coupon_id : implode(',',$coupon_ids);
			$total_coupons = count($coupon_ids) ? count($coupon_ids) : 1;

			// Add Order to database
			$qry = mysql_query("INSERT INTO CouZoo_Orders (payer_id, pp_payment_id, pp_sale_id, coupon_ids, total, status) 
						VALUES ('$payer_id', '$payment_id', '$sale_id', '$coupons', '$total','$state') ");

			// Add coupons to user
			if ($coupon_id) {
			    	$qry = mysql_query("INSERT INTO CouZoo_My_Coupons (id_user, id_coupon, status) VALUES ('$payer_id', '$coupon_id', '0') ");
			} else {
				foreach ($coupon_ids as $c_id) {
				    $qry = mysql_query("INSERT INTO CouZoo_My_Coupons (id_user, id_coupon, status) VALUES ('$payer_id', '$c_id', '0') ");
				}

				$empty_cart = true;
			}

			// Update total purhcased coupons
			$qry = mysql_query("UPDATE CouZoo_Members SET purchased_coupons = purchased_coupons + '$total_coupons' WHERE id_user = '$payer_id'");

			if (!$saved_cc) {
				// Store CC Info through PayPal
				$url = $pp->host.'/v1/vault/credit-card';
				$store_cc = array(
 		   			"payer_id" => $payer_id,
 					"type" => $cc['type'],
 					"number" => $cc['number'],
 					"expire_month" => $cc['exp_month'],
 					"expire_year" => $cc['exp_year'],
 					"first_name" => $cc['fname'],
 		   			"last_name" => $cc['lname']
				);
				$json = json_encode($store_cc);
				$cc_res = $pp->make_post_call($url, $json);
		
				// Add CC to database
				$qry = mysql_query("INSERT INTO CouZoo_Cards (card_id,payer_id,type,number,exp_month,exp_year,fname,lname,valid)
				    	      		VALUES ('$cc_res[id]','$payer_id','$cc[type]','$cc_res[number]','$cc[exp_month]','$cc[exp_year]','$cc[fname]','$cc[lname]','') ");
			}

		}
		$paid = true;
		}
	}

       if (!$paid && !$coupon_id && !$check_out) { header("Location: results"); die(); }
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<div id="container">

<div id="page-top-push"></div>

    <div id="main-column">
    
<!--Start Order Info Section-->

        <div id="merch-dash-header-container">
            <div id="merch-dash-header">
         
            <h1>Order Info</h1>
            
               <div id="cart-check-out-table-header">
                   <div class="item">Item Name</div>
                   <div class="price">Price</div>
                   <div class="qty">Qty.</div>
                   <div class="total">Total</div>
               </div><!--end table header-->

<form id="check-out" action="" method="post">

<?php
	$qry = "SELECT * FROM CouZoo_Coupons AS coup ";
	if ($coupon_id) {
	    $qry .= "WHERE coup.id_coupon = '$coupon_id'";
	} else {
	    $qry .= "LEFT JOIN CouZoo_Cart AS cart ON (coup.id_coupon = cart.id_coupon) WHERE cart.id_user = '$id_user'";	
	}

	$sql = mysql_query($qry);
	$coupon_ids = array();
	while ($res = mysql_fetch_array($sql)) {

		// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
		$id_coupon = $res['id_coupon'];
		$title = $res['title'];
		$price = $res['price'];
		$qty = $res['qty']  ? $res['qty'] : 1;
		$tCoup = $price * $qty;
		$tPrice += $tCoup;
		$tQty += $qty;
?>
               
               <div id="cart-check-out-table-row">
                   <div class="item"><?=$title?></div>
                   <div class="price">$<?=$price?></div>
                   <div class="qty"><?=$qty?></div>
                   <div class="total">$<?=$tCoup?></div>
               </div><!--end table header-->
		
	<?php 
		for ($q=0; $q < $qty; $q++) {
	?>
		    <input type="hidden" name="coupon_ids[]" value="<?=$id_coupon?>">
	<?php
		}
	} ?>              
        
               <div id="cart-check-out-table-row">
		     <div class="total-title"><?=$tQty?></div>
                   <div class="total-price">$<?=$tPrice?></div>
               </div><!--end table header-->                
            
            <br clear="all"/>

<?php if ($paid) { ?>
	Thank you for your order! Please go to your account and make sure you use your coupons before they expire! The CouZoo Team thanks you for your business. Happy Couponing!

	if ($empty_cart == 'true') {
		// Empty cart since it was a checkout and not a buy now
		$qry = mysql_query("DELETE FROM CouZoo_Cart WHERE id_user = '$payer_id'");
	}

<?php } else { ?>

	<input type="hidden" name="checkout" value="true">
	<input type="hidden" name="payer_id" value="<?=$id_user?>">
	<input type="hidden" name="coupon_id" value="<?=$coupon_id?>">
            
<!--Start Account Info Section-->
        	<h1>Payment Info</h1>
<?php
       $qry = mysql_query("SELECT * FROM CouZoo_Cards WHERE payer_id = '$id_user'");
	$total_cc = mysql_num_rows($qry);
	if ($total_cc) {
?>
               <div id="cart-check-out-table-header" class="card-headers">
		     <div class="card-name">Previously Used Cards</div>
                   <div class="card-type">Card Type</div>
                   <div class="card-number">Card Number</div>
               </div><!--end table header-->
<?php
	} while ($cc = mysql_fetch_array($qry)) {
		if ($cc['type'] == 'amex') { $cc_type = "American Express"; } else { $cc_type = ucfirst($cc['type']); }
?>
               <div id="cart-check-out-table-row" class="<?=$cc['id']?>">
		     <input type="radio" id="cc_id" name="cc_id" value="<?=$cc['id']?>">
                   <div class="card-name"><?=$cc['fname']?> <?=$cc['lname']?></div>
                   <div class="card-type"><?=$cc_type?></div>
                   <div class="card-number"><?=$cc['number']?></div>
		     <div id="<?=$cc['id']?>" class="card-delete"><img src="/images/red-x.png" width="15"></img></div>
               </div><!--end table header-->

<?php } if (!$total_cc) { ?> 
               <div id="cart-check-out-table-row">
                   <div class="radio-button"><a href="#add-card" class="fancybox change" >add a credit card</a></div>
               </div>
<?php } else { ?>  
               <div id="cart-check-out-table-row">
                   <div class="radio-button"><a href="#add-card" class="fancybox change" >pay with a different credit card</a></div>
               </div>
<?php } ?>

               <br clear="all"/>

		<div id="err" align="center" style='color: red;'><?=$err?></div>

		<br clear="all"/>
				
               <div id="cart-check-out-table-row"> 
	            <div class="check-out"><a href="#" class="check-out-btn"></a></div>
               </div>

		 <input type="hidden" name="total" value="<?=$tPrice?>">
	
		 </form>

<?php } ?>                  
               <br clear="all"/>
                        
            </div><!--END merch-dash-header -->
         
                <br clear="all"/>
                
        </div>
<!--End Order Info Section-->
            
    </div><!--END MAIN-COLUMN-->

<div id="side-column"><!--start right side column-->

</div><!--END right side column-->
<div class="push-box"></div>
<div class="push"></div>
</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

</body>
</html>

<script>
$('.check-out-btn').click(function() {
	if (!$("input[name='cc_id']").is(':checked')) {
		$("#err").html('There was no credit card selected. Please either use an existing card or add a new one!');	
	} else {
		$("#err").html('<font color="grey">Processing.. Please wait.</font>');
		$("#check-out").submit();
	}
});
</script>

	<div id="add-card" style="display: none;">
		<form id="check-out-card" action="" method="post">
		<input type="hidden" name="checkout" value="true">
		<input type="hidden" name="coupon_ids" value="<?=$coupon_ids?>">
		<input type="hidden" name="total" value="<?=$tPrice?>">
		<input type="hidden" name="payer_id" value="<?=$id_user?>">

			<h2>Add a New Credit Card</h2>
			
			<ul>
				<li><label>Cardholder's First Name:</label> <input type="text" id="fname" name="new_cc[fname]"></li>
				<li><label>Cardholder's Last Name:</label> <input type="text" id="lname" name="new_cc[lname]"></li>
				<li><label>Card Type:</label>
					<select id="type" name="new_cc[type]"> 
						<option value="visa">Visa</option>
						<option value="mastercard">Mastercard</option>
						<option value="amex">American Express</option>
						<option value="discover">Discover</option>
					</select>
				</li>
				<li><label>Card Number:</label> <input type="text" id="number" name="new_cc[number]"></li>
				<li><label>Expiration Month:</label>
					<select id="exp_month" name="new_cc[exp_month]"> 
						<option value="01" <?=$cur_mon == 1 ? "SELECTED" : "";?> >01</option>
						<option value="02" <?=$cur_mon == 2 ? "SELECTED" : "";?> >02</option>
						<option value="03" <?=$cur_mon == 3 ? "SELECTED" : "";?> >03</option>
						<option value="04" <?=$cur_mon == 4 ? "SELECTED" : "";?> >04</option>
						<option value="05" <?=$cur_mon == 5 ? "SELECTED" : "";?> >05</option>
						<option value="06" <?=$cur_mon == 6 ? "SELECTED" : "";?> >06</option>
						<option value="07" <?=$cur_mon == 7 ? "SELECTED" : "";?> >07</option>
						<option value="08" <?=$cur_mon == 8 ? "SELECTED" : "";?> >08</option>
						<option value="09" <?=$cur_mon == 9 ? "SELECTED" : "";?> >09</option>
						<option value="10" <?=$cur_mon == 10 ? "SELECTED" : "";?> >10</option>
						<option value="11" <?=$cur_mon == 11 ? "SELECTED" : "";?> >11</option>
						<option value="12" <?=$cur_mon == 12 ? "SELECTED" : "";?> >12</option>
					</select>
				</li>
				<li><label>Expiration Year:</label>
					<select id="exp_year" name="new_cc[exp_year]"> 
						<option value="2013" <?=$cur_year == 2013 ? "SELECTED" : "";?> >2013</option>
						<option value="2014" <?=$cur_year == 2014 ? "SELECTED" : "";?> >2014</option>
						<option value="2015" <?=$cur_year == 2015 ? "SELECTED" : "";?> >2015</option>
						<option value="2016" <?=$cur_year == 2016 ? "SELECTED" : "";?> >2016</option>
						<option value="2017" <?=$cur_year == 2017 ? "SELECTED" : "";?> >2017</option>
						<option value="2018" <?=$cur_year == 2018 ? "SELECTED" : "";?> >2018</option>
						<option value="2019" <?=$cur_year == 2019 ? "SELECTED" : "";?> >2019</option>
						<option value="2020" <?=$cur_year == 2020 ? "SELECTED" : "";?> >2020</option>
						<option value="2021" <?=$cur_year == 2021 ? "SELECTED" : "";?> >2021</option>
						<option value="2022" <?=$cur_year == 2022 ? "SELECTED" : "";?> >2022</option>
						<option value="2023" <?=$cur_year == 2023 ? "SELECTED" : "";?> >2023</option>
						<option value="2024" <?=$cur_year == 2024 ? "SELECTED" : "";?> >2024</option>
						<option value="2025" <?=$cur_year == 2025 ? "SELECTED" : "";?> >2025</option>
						<option value="2026" <?=$cur_year == 2026 ? "SELECTED" : "";?> >2026</option>
						<option value="2027" <?=$cur_year == 2027 ? "SELECTED" : "";?> >2027</option>
						<option value="2028" <?=$cur_year == 2028 ? "SELECTED" : "";?> >2028</option>
						<option value="2029" <?=$cur_year == 2029 ? "SELECTED" : "";?> >2029</option>
					</select>
				</li>
				<li><label>Security Code (CVV2):</label> <input type="text" style="width: 100px;" id="cvv" name="new_cc[cvv]"></li>
	            		<li><label><div class="check-out"><a href="#" class="check-out-btn card-checkout"></a></div></label></li>
				<li><label><div id="err_add" style='color: red;'></div></label></li>
			</ul>
		</form>
	</div>

<script>
$('.card-checkout').click(function() {
	var cc_num = $("#number").val();
	var num = cc_num.replace(/-/g, '');
	var cvv = $("#cvv").val();
	if (!$("#fname").val()) {
		$("#err_add").html("Please enter the cardholder's first name!");	
	} else if (!$("#lname").val()) {
		$("#err_add").html("Please enter the cardholder's last name");
	} else if(!num.match(/^\d+$/) || num.length < 14 || num.length > 18) {
		$("#err_add").html("Please enter a valid credit card number!");	
	} else if(!cvv.match(/^\d+$/) || cvv.length < 3 || cvv.length > 4) {
		$("#err_add").html("Please enter the CVV2 code (back of card)!");		
	} else {
		$("#number").val(num);
		$("#err_add").html('<font color="grey">Processing.. Please wait.</font>');
		$("#check-out-card").submit();
	}
});

$('.card-delete').click(function() {
    var id_card = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update_card.php?q=del_card",
    	 dataType: "json",
        data: { payer_id: '<?=$id_user?>', id_card: id_card },
        success: function(res){
		if (res.success) {
            		$('.' + id_card).fadeOut();
		}
		else {             
			alert(res.message); 
		}

		if (!res.total) {
			$('.card-headers').fadeOut();
		}
        },
        error: function(res){
            alert('There was a problem removing your credit card'); 
        }
    });
    return false;
});
</script>