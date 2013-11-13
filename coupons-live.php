<?php
//Get Coupon Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_user' AND status = 'live'");
$num = mysql_num_rows($qry);
?>

    <div class="changeable defualt">
    <div id="header-bg" class="header-live"><h2>Below are all of your live coupons.</h2></div>
    <ul class="acc" id="acc">

<?php

//Checks to see if there are any coupons
if (!$num)  
  {
    //echo "<center><br>You don't have any live coupons. Go add some coupons!</center><br>";
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
$description = $res['description'];

?>

<?php
	include ("coupon.php");
?>

<?php
$i++;
}
?>

      </ul>
	</div>