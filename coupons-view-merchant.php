<?php
//Get Coupon Data
$couzoo->DBLogin();

$qry = mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Members.id_user = '$id_merchant' AND CouZoo_Coupons.id_user = CouZoo_Members.id_user AND status = 'live'");
$num = mysql_num_rows($qry);

?>

<ul class="acc" id="acc">

<?php

//Checks to see if there are any coupons
if (!$num)  
  {
    echo "<br><br><center>This merchant does not have any live coupons posted.</center><br>";
  }

$i=0;
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

$dist = $couzoo->getDistance($userLong, $userLat, $couponLong, $couponLat);
$distance = round($dist, 2);
$unit = "miles";

//Grab coupon template
include ("coupon.php");

$i++;
}
?>

</ul>