<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc, removal_date - posting_date AS tleft FROM CouZoo_Watch, CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Watch.id_user = '$id_user' AND CouZoo_Watch.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.id_user = CouZoo_Members.id_user ORDER BY tleft");
$num = mysql_num_rows($qry);

?>

    <div class="changeable second">
        <div id="header-bg" class="header-expired"><h2>Below are all coupons you are watching.</h2></div>
       <ul class="acc" id="accw">

<?php

//Checks to see if there are any coupons
if (!$num)  
  {
    echo "<br><br><center>There are no coupons in your watch list yet.</center><br>";
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

// Grab the datbase data and outputs the information on the page - Grab the company info next
$phone = $res['phone'];
$website = $res['website'];
$address = $res['address'];
$city = $res['city'];
$state = $res['state'];
$zip = $res['zip'];
$link = $res['link'];

//Grab coupon template
include ("coupon.php");

$i++;
}
?>	
      </ul>
    </div>