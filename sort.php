<?php
require_once("includes/config.php");
$couzoo->DBLogin();

$type = $couzoo->SanitizeForSQL($_POST[type]);

// Add to Cart
if ($type === "Sort") {

$sorted = mysql_query("SELECT *, $sqlDist AS distance FROM CouZoo_Coupons, CouZoo_Members WHERE $search ORDER BY $sort_by $order");
$num = mysql_num_rows($qry);

if($sorted) {

	// Set up associative array
	$data = array('success'=> false,'message'=>'<font color="#ff464a">Coupon already in cart!</font> ');
	 
	// JSON encode and send back to the server
	echo json_encode($data);
	exit;
}

$cart_qry = mysql_query("INSERT INTO CouZoo_Cart (id_user, id_coupon) VALUES ('$id_user','$id_coupon')");

$cartNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user'"));

if ($cart_qry){
	 
	    // Set up associative array
	    $data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon added to cart!</font>', 'number'=>$cartNum, 'items'=>$title);
	 
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