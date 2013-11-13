<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = mysql_query("SELECT *, $sqlDist AS distance, CouZoo_Coupons.description AS coupon_desc, DATEDIFF(removal_date, now()) AS days FROM CouZoo_Coupons, CouZoo_Members WHERE $search $filter ORDER BY $sort_by $order");
$num = mysql_num_rows($qry);

//$upd_qry = mysql_query("UPDATE CouZoo_Coupons SET savings = percent_off * .01 * min_purchase WHERE savings = '0.00'")

?>

<ul class="acc" id="acc">

<?php

//Checks to see if there are any coupons
if (!$num)  
  {
    echo "<br><br><center>There are no coupons that match your search criteria. Please broaden your search!
		<br><br> Check out some of our sponsored coupons as well!</center><br>";
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
$last_modified = strtotime($res['date']);

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

//Grab coupon template
include ("coupon.php");

$i++;
}
?>
	
</ul>