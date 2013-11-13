<?php
require_once("includes/config.php");
require_once("includes/location.php");
$couzoo->DBLogin();

$id_user = $couzoo->SanitizeForSQL($_POST[id_user]);
$type = $couzoo->SanitizeForSQL($_POST[type]);
$type = "Unused";
$id_user = 2;

// Get Unused Coupons (Customer Dash)
if ($type === "Unused") {

$items_array = array();

$qry = mysql_query("SELECT *, $sqlDist AS distance, DATEDIFF(removal_date, now()) AS days FROM CouZoo_Coupons AS coup 
					LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
					LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
					WHERE my.id_user = '$id_user' AND my.status = '0' LIMIT 2");
    while ($res = mysql_fetch_array($qry)) {

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
	$description = $res['description'];
	$couponLat = $res['latitude'];
	$couponLong = $res['longitude'];

	$distance = round($res['distance'], 2);
	$unit = "miles";

	// Grab the datbase data and outputs the information on the page - Grab the company info next
	$phone = $res['phone'];
	$website = $res['website'];
	$address = $res['address'];
	$city = $res['city'];
	$state = $res['state'];
	$zip = $res['zip'];
	$link = $res['link'];

	$purchased = true;
	ob_start();
	include 'coupon.php';
	$cartItem = ob_get_clean();
	$items_array[] = $cartItem;
	ob_end_flush();
    }
	 
    // Set up associative array
    $data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon added to cart!</font>', 'items'=>$items_array);
	 
    // JSON encode and send back to the server
    echo json_encode($data);
}
?>