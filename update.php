<?php
require_once("includes/config.php");
$couzoo->DBLogin();

$id_user = $couzoo->SanitizeForSQL($_POST[id_user]);
$type = $couzoo->SanitizeForSQL($_POST[type]);

// Add to Cart
if ($type === "Cart") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);

$cart_unique = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'"));

if($cart_unique) {

	// Set up associative array
	$data = array('success'=> false,'message'=>'<font color="#ff464a">Coupon already in cart!</font> ');
	 
	// JSON encode and send back to the server
	echo json_encode($data);
	exit;
}

$cart_qry = mysql_query("INSERT INTO CouZoo_Cart (id_user, id_coupon) VALUES ('$id_user','$id_coupon')");
$cartNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$cart = mysql_fetch_array(mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = '$id_coupon' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon"));
$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");

while ($price = mysql_fetch_array($cart_qry)) {
       $tPrice += $price['total'];
}

ob_start();
include 'cart-item.php';
$cartItem = ob_get_clean();
ob_end_flush();

if ($cart_qry){
	 
	    // Set up associative array
	    $data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon added to cart!</font>', 'number'=>$cartNum, 'items'=>$cartItem, 'tQty'=> $totalQty[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else{
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Remove from Cart
if ($type === "Remove Cart") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);

$remove = mysql_query("DELETE FROM CouZoo_Cart WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'");
$cartNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");

while ($cart = mysql_fetch_array($cart_qry)) {
       $tPrice += $cart['total'];
}

	if ($remove) { 
	    // Set up associative array
	    $data = array('success'=> true, 'message'=>'<font color="red">Coupon removed from cart</font>', 'number'=> $cartNum, 'tQty'=> $totalQty[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Update Cart Qty.
if ($type === "Cart Qty") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);
$qty = $couzoo->SanitizeForSQL($_POST['qty']);

$updCoupon = mysql_query("UPDATE CouZoo_Cart SET qty = '$qty' WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'");
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$tCPrice = mysql_fetch_row(mysql_query("SELECT '$qty' * price FROM CouZoo_Coupons WHERE id_coupon = '$id_coupon'"));

$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");

while ($cart = mysql_fetch_array($cart_qry)) {
       $tPrice += $cart['total'];
}

	if ($updCoupon) {
	    // Set up associative array
	    $data = array('success'=> true, 'tQty'=> $totalQty[0], 'tCPrice'=> '$'.$tCPrice[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Cart Empty
if ($type === "Empty Cart") {

$emptyCart = mysql_query("DELETE FROM CouZoo_Cart WHERE id_user = '$id_user'");

	if ($emptyCart) {
	    // Set up associative array
	    $data = array('success'=> true);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Add to Watch List
if ($type === "Watch") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);

$watch_unique = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'"));

if($watch_unique) {

	// Set up associative array
	$data = array('success'=> false,'message'=>'<font color="#ff464a">Coupon already in watch list!</font> ');
	 
	// JSON encode and send back to the server
	echo json_encode($data);
	exit;
}

$watch_insert = mysql_query("INSERT INTO CouZoo_Watch (id_user, id_coupon) VALUES ('$id_user','$id_coupon')");
$watchNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$watch = mysql_fetch_array(mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = '$id_coupon' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon"));
$watch_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon");

while ($price = mysql_fetch_array($watch_qry)) {
       $tPrice += $price['total'];
}

ob_start();
include 'watch-item.php';
$watchItem = ob_get_clean();
ob_end_flush();

if ($watch_qry){
	 
	    // Set up associative array
	    $data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon added to watch list!</font>', 'number'=>$watchNum, 'items'=>$watchItem, 'tQty'=> $totalQty[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else{
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Remove from Watch List
if ($type === "Remove Watch") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);

$remove = mysql_query("DELETE FROM CouZoo_Watch WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'");
$watchNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$watch_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon");

while ($watch = mysql_fetch_array($watch_qry)) {
       $tPrice += $watch['total'];
}

	if ($remove) { 
	    // Set up associative array
	    $data = array('success'=> true, 'message'=>'<font color="red">Coupon removed from watch list</font>', 'number'=>$watchNum, 'tQty'=> $totalQty[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Update Watch List Qty.
if ($type === "Watch Qty") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);
$qty = $couzoo->SanitizeForSQL($_POST['qty']);

$updCoupon = mysql_query("UPDATE CouZoo_Watch SET qty = '$qty' WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'");
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$tCPrice = mysql_fetch_row(mysql_query("SELECT '$qty' * price FROM CouZoo_Coupons WHERE id_coupon = '$id_coupon'"));

$watch_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon");

while ($watch = mysql_fetch_array($watch_qry)) {
       $tPrice += $watch['total'];
}

	if ($updCoupon) {
	    // Set up associative array
	    $data = array('success'=> true, 'tQty'=> $totalQty[0], 'tCPrice'=> '$'.$tCPrice[0], 'tPrice'=> '$'.$tPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Watch List Empty
if ($type === "Empty Watch") {

$emptyWatch = mysql_query("DELETE FROM CouZoo_Watch WHERE id_user = '$id_user'");

	if ($emptyWatch) {
	    // Set up associative array
	    $data = array('success'=> true);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}

// Watch List - Add to Cart
if ($type === "Watch Add Cart") {

$id_coupon = $couzoo->SanitizeForSQL($_POST[id_coupon]);

$watch_unique = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'"));

if($watch_unique) {

	// Set up associative array
	$data = array('success'=> false,'message'=>'<font color="#ff464a">Coupon already in cart!</font> ');
	 
	// JSON encode and send back to the server
	echo json_encode($data);
	exit;
}

$qty = mysql_fetch_array(mysql_query("SELECT qty FROM CouZoo_Watch WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'"));
$delWatch = mysql_query("DELETE FROM CouZoo_Watch WHERE id_user = '$id_user' AND id_coupon = '$id_coupon'");
$addCart = mysql_query("INSERT INTO CouZoo_Cart (id_user, id_coupon, qty) VALUES ('$id_user','$id_coupon', '$qty[0]')");
$watchNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$totalQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Watch WHERE id_user = '$id_user'"));
$watch_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Watch, CouZoo_Coupons WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon");
$cart = mysql_fetch_array(mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_coupon = '$id_coupon' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon"));
$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");
$cartNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user'"));
$cartQty = mysql_fetch_row(mysql_query("SELECT SUM(qty) FROM CouZoo_Cart WHERE id_user = '$id_user'"));

ob_start();
include 'cart-item.php';
$cartItem = ob_get_clean();
ob_end_flush();

while ($watch = mysql_fetch_array($watch_qry)) {
       $tPrice += $watch['total'];
}

$cart_qry = mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_user = '$id_user' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon");

while ($cart = mysql_fetch_array($cart_qry)) {
       $tCartPrice += $cart['total'];
}

	if ($addCart) {
	    // Set up associative array
	    $data = array('success'=> true, 'message'=> '<font color="green">Coupon moved to cart!</font>', 'number'=>$watchNum, 'tQty'=> $totalQty[0], 'tPrice'=> '$'.$tPrice, 'items'=>$cartItem, 'cartNum'=> $cartNum, 'cartQty'=> $cartQty[0], 'tCartPrice'=> '$'.$tCartPrice);
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
	else {
	    // Set up associative array
	    $data = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($data);
	}
}


// Update Customer Profile
if ($type == "Edit-Profile-Cust") {

$fname = $couzoo->SanitizeForSQL($_POST[fname]);
$lname = $couzoo->SanitizeForSQL($_POST[lname]);
$email = $couzoo->SanitizeForSQL($_POST[email]);
$phone = $couzoo->SanitizeForSQL($_POST[phone]);
$old_pass = $couzoo->SanitizeForSQL($_POST['old_password']);
$new_pass = $couzoo->SanitizeForSQL($_POST['new_password']);
$new_pass_confirm = $couzoo->SanitizeForSQL($_POST['new_password_confirm']);

if (!$fname){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your first name.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($lname == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your last name.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($email== ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your e-mail address.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($phone== ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your phone number.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}

elseif ($old_pass || $new_pass || $new_pass_confirm) {
	$getPass = mysql_fetch_array(mysql_query("SELECT password FROM CouZoo_Members WHERE id_user = '$id_user'"));

	if ($old_pass == "") { $pass_msg = "Please enter your current passwod."; }
	elseif ($new_pass == "") { $pass_msg = "Please enter your new desired passwod."; }
	elseif ($new_pass_confirm == "") { $pass_msg = "Please confirm your new passwod."; }
	elseif ($new_pass != $new_pass_confirm) { $pass_msg = "Your new passwords do not match."; }
	elseif (md5($old_pass) != $getPass[0]) { $pass_msg = "Your current password is incorrect."; }

	if ($pass_msg != "") {
	    $msg = "<font color='#ff464a'>".$pass_msg."</font>";
	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=> $msg);
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
	}

	$new_pass_enc = md5($new_pass);

	$pw_upd = mysql_query("UPDATE CouZoo_Members SET password = '$new_pass_enc' WHERE id_user = '$id_user'");
}

$c_edit_qry = mysql_query("UPDATE CouZoo_Members SET fname = '$fname', lname = '$lname', email = '$email', phone = '$phone' WHERE id_user = '$id_user'");

if ($c_edit_qry){
	 
	    // Set up associative array
	    $c_edit = array('success'=> true, 'message'=>'<font color="#017c04">Your profile has been updated!</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	}
	else{
	    // Set up associative array
	    $c_edit = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong..</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	}
}


// Update Merchant Profile
if ($type == "Edit-Profile-Merch") {

$bname = $couzoo->SanitizeForSQL($_POST[bname]);
$adr = $couzoo->SanitizeForSQL($_POST[address]);
$city = $couzoo->SanitizeForSQL($_POST[city]);
$state = $couzoo->SanitizeForSQL($_POST[state]);
$zip = $couzoo->SanitizeForSQL($_POST[zip]);
$phone = $couzoo->SanitizeForSQL($_POST[phone]);
$email = $couzoo->SanitizeForSQL($_POST[email]);
$website = $couzoo->SanitizeForSQL($_POST[website]);
$description = $_POST[description];
$old_pass = $couzoo->SanitizeForSQL($_POST['old_password']);
$new_pass = $couzoo->SanitizeForSQL($_POST['new_password']);
$new_pass_confirm = $couzoo->SanitizeForSQL($_POST['new_password_confirm']);

	$enc_adr = urlencode($adr);
	$enc_city = urlencode($city);
	$enc_state = urlencode($state);
	$enc_zip = urlencode($zip);

	$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$enc_adr."+".$enc_city."+".$enc_state."+".$enc_zip."&sensor=false");
	$loc = json_decode($json);

	$invalid_address = "false";
	$userAdr = "";
	if ($loc->status == 'OK') {
    		foreach ($loc->results[0]->address_components as $address) {
        		if (in_array("street_number", $address->types)) {
            			$userAdr = $address->short_name." ";
        		}
        		if (in_array("route", $address->types)) {
            			$userAdr .= $address->short_name;
        		}
        		if (in_array("locality", $address->types)) {
            			$userCity = $address->short_name;
        		}
        		if (in_array("administrative_area_level_1", $address->types)) {
            			$userState = $address->short_name;
        		}
        		if (in_array("postal_code", $address->types)) {
            			$userZip = $address->short_name;
        		}
    		}
		$userLat = $loc->results[0]->geometry->location->lat;
		$userLong = $loc->results[0]->geometry->location->lng;
	} 
	else { $invalid_address = "true"; }

if (!$bname){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your business name.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($adr == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your business address.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($city == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your business city.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}elseif ($state == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your business state.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}elseif ($zip == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your business zip code.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($invalid_address == "true" || !$userAdr){
	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">The address you entered is invalid. Please enter a valid business address.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($email == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your e-mail address.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($phone == ""){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your phone number.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif (strlen($description) > 700){

	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=>'<font color="#ff464a">The description cannot be longer than 700 characters.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
}
elseif ($old_pass || $new_pass || $new_pass_confirm) {
	$getPass = mysql_fetch_array(mysql_query("SELECT password FROM CouZoo_Members WHERE id_user = '$id_user'"));

	if ($old_pass == "") { $pass_msg = "Please enter your current passwod."; }
	elseif ($new_pass == "") { $pass_msg = "Please enter your new desired passwod."; }
	elseif ($new_pass_confirm == "") { $pass_msg = "Please confirm your new passwod."; }
	elseif ($new_pass != $new_pass_confirm) { $pass_msg = "Your new passwords do not match."; }
	elseif (md5($old_pass) != $getPass[0]) { $pass_msg = "Your current password is incorrect."; }

	if ($pass_msg != "") {
	    $msg = "<font color='#ff464a'>".$pass_msg."</font>";
	    // Set up associative array
	    $c_edit = array('success'=> false, 'message'=> $msg);
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	    exit;
	}

	$new_pass_enc = md5($new_pass);

	$pw_upd = mysql_query("UPDATE CouZoo_Members SET password = '$new_pass_enc' WHERE id_user = '$id_user'");
}

$c_edit_qry = mysql_query("UPDATE CouZoo_Members SET bname = '$bname', address = '$userAdr', city = '$userCity', state = '$userState', zip = '$userZip',
				email = '$email', phone = '$phone', website = '$website', description = '$description', latitude = '$userLat', longitude = '$userLong' 
				WHERE id_user = '$id_user'");

	if ($c_edit_qry) {
	 
	    // Set up associative array
	    $c_edit = array('success'=> true, 'message'=>'<font color="#017c04">Your profile has been updated!</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	}
	else {
	    // Set up associative array
	    $c_edit = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong..</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_edit);
	}
}


// Add Contact - Merch Prof
if ($type == "Add-Contact") {

$cname = $couzoo->SanitizeForSQL($_POST['cname']);
$cphone = $couzoo->SanitizeForSQL($_POST['cphone']);
$cemail = $couzoo->SanitizeForSQL($_POST['cemail']);
$cprimary = $couzoo->SanitizeForSQL($_POST['cprimary']);

if (!$cname){

	    // Set up associative array
	    $c_add = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter your new contacts name.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_add);
	    exit;
}
elseif ($cphone == ""){

	    // Set up associative array
	    $c_add = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter the contacts phone number.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_add);
	    exit;
}
elseif ($cemail == ""){

	    // Set up associative array
	    $c_add = array('success'=> false, 'message'=>'<font color="#ff464a">Please enter their e-mail address.</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_add);
	    exit;
}

	$phone = explode("\n", $cphone);

	foreach($phone as $number)
	{
 		$cphone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '$1-$2-$3', $number). "\n";
	}

if ($cprimary == "1") {
	$upd_prim = mysql_query("UPDATE CouZoo_Contacts SET primary_c = '0' WHERE id_user = '$id_user'");
}	

$c_add_qry = mysql_query("INSERT INTO CouZoo_Contacts (id_user, name, phone, email, primary_c) VALUES ('$id_user', '$cname', '$cphone', '$cemail', '$cprimary')");


	if ($c_add_qry) {
	 
	    // Set up associative array
	    $c_add = array('success'=> true, 'message'=>'<font color="#017c04">Your contact has been added!</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_add);
	}
	else {
	    // Set up associative array
	    $c_add = array('success'=> false,'message'=>'<font color="#ff464a">Something went wrong..</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_add);
	}
}


// Update Primary Contact - Merch Prof
if ($type == "Update-Contact") {

$cid = $couzoo->SanitizeForSQL($_POST['id_contact']);

$rm_prim = mysql_query("UPDATE CouZoo_Contacts SET primary_c = '0' WHERE id_user = '$id_user'");
$upd_prim = mysql_query("UPDATE CouZoo_Contacts SET primary_c = '1' WHERE id_contact = '$cid'");

	if ($upd_prim) {
	 
	    // Set up associative array
	    $c_upd = array('success'=> true, 'message'=>'<font color="#017c04">Updated!</font>');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_upd);
	}
	else {
	    // Set up associative array
	    $c_upd = array('success'=> false,'message'=>'<font color="#ff464a">Failed..</font> ');
	 
	    // JSON encode and send back to the server
	    echo json_encode($c_upd);
	}
}
?>