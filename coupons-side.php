<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = mysql_query("SELECT *, $sqlDist AS distance, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Ads_Side, CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Ads_Side.status = 'live' AND CouZoo_Ads_Side.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.id_user = CouZoo_Members.id_user ORDER BY distance LIMIT 2");

$i=2;
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
$description = $res['coupon_desc'];
$couponLat = $res['latitude'];
$couponLong = $res['longitude'];
$last_modified = strtotime($res['date']);

$dist = $couzoo->getDistance($userLong, $userLat, $couponLong, $couponLat);
$distance = round($dist, 2);
$unit = "miles";

//Format dates
$end = strtotime("$removal_date");
$nowsec = time();
$days = $end - $nowsec;
$daysleft = ceil($days/86400);

if ($daysleft > 1) { $dayplural = "Days"; } else { $dayplural = "Day"; }

$vdate = new DateTime($valid_date);
$formatted_vdate = $vdate->format("l, F j");
$edate = new DateTime($exp_date);
$formatted_edate = $edate->format("l, F j");

// Grab the datbase data and outputs the information on the page - Grab the company info next
$phone = $res['phone'];
$website = $res['website'];
$address = $res['address'];
$city = $res['city'];
$state = $res['state'];
$zip = $res['zip'];
$link = $res['link'];

//Grab coupon template
include ("side-ad.php");

$i++;
}
?>