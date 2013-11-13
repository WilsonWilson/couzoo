<?php
require_once("includes/config.php");
$couzoo->DBLogin();

$id_user = $couzoo->SanitizeForSQL($_POST[id_user]);
$type = $couzoo->SanitizeForSQL($_POST[type]);

if (!$couzoo->CheckLogin()) {

	// Set up associative array
	$data = array('success'=> false,'message'=>'<font color="#ff464a">Please login!</font> ');
	 
	// JSON encode and send back to the server
	echo json_encode($data);
	exit;
}

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
$cart = mysql_fetch_array(mysql_query("SELECT *, price * qty AS total FROM CouZoo_Cart, CouZoo_Coupons WHERE CouZoo_Cart.id_coupon = '$id_coupon' AND CouZoo_Cart.id_coupon = CouZoo_Coupons.id_coupon"));
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
?>