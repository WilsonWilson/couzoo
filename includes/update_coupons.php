<?php
//Update coupons
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

//Look for coupons that were upcoming and now are live and update them accordingly
$status = mysql_query("UPDATE CouZoo_Coupons SET status = 'live' WHERE status = 'upcoming' AND curdate() >= posting_date");

//If coupons are updated, we know there is updating that needs to be done - large and side ads are set to live as well
	if (mysql_affected_rows() > 0) {
		$upd_large_ad = mysql_query("UPDATE CouZoo_Ads_Large, CouZoo_Coupons SET CouZoo_Ads_Large.status = 'live' WHERE CouZoo_Ads_Large.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.status = 'live' AND CouZoo_Ads_Large.status = 'upcoming'");
		$upd_side_ad = mysql_query("UPDATE CouZoo_Ads_Side, CouZoo_Coupons SET CouZoo_Ads_Side.status = 'live' WHERE CouZoo_Ads_Side.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.status = 'live' AND CouZoo_Ads_Side.status = 'upcoming'");
	}

//Look for coupons that were live and now are ended and update them accordingly
$status = mysql_query("UPDATE CouZoo_Coupons SET status = 'ended' WHERE status = 'live' AND curdate() >= removal_date");

//If coupons are updated, we know there is updating that needs to be done - large and side ads are set to expired as well
	if (mysql_affected_rows() > 0) {
		$upd_large_ad = mysql_query("UPDATE CouZoo_Ads_Large, CouZoo_Coupons SET CouZoo_Ads_Large.status = 'ended' WHERE CouZoo_Ads_Large.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.status = 'ended' AND CouZoo_Ads_Large.status = 'live'");
		$upd_side_ad = mysql_query("UPDATE CouZoo_Ads_Side, CouZoo_Coupons SET CouZoo_Ads_Side.status = 'ended' WHERE CouZoo_Ads_Side.id_coupon = CouZoo_Coupons.id_coupon AND CouZoo_Coupons.status = 'ended' AND CouZoo_Ads_Side.status = 'live'");
	}

//$sql = mysql_query("UPDATE CouZoo_Coupons SET status = 'live'");

?>