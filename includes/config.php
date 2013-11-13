<?php
require_once("functions.php");

$couzoo = new CouZoo();

//Provide your site name here
$couzoo->SetWebsiteName('CouZoo');

//Provide the email address where you want to get notifications
//$couzoo->SetAdminEmail('support@aronedesigns.com');

//Provide the email address for the from address on automatic e-mails
$couzoo->SetFromAddress('no-reply@couzoo.com');

// Site variables
define(SITE_LOC, "/"); // Sub-directory? Otherwise, enter "/" for root of domain -- **Sub-domains, with a root directory, don't need to be changed - leave "/" **
define(ADMIN_LOC, "admin-panel/"); // Admin location, don't forget trailing slash
define(ADMIN_PASS, "admin123"); // Admin Password

//Provide your database login details here:
//hostname, user name, password, database name and table name
//by itself on submitting register.php for the first time
$couzoo->InitDB(/*hostname*/ 'db449239349.db.1and1.com',
                      /*username*/ 'dbo449239349',
                      /*password*/'pete789&*(',
                      /*database name*/ 'db449239349',
			 ADMIN_PASS,
                      /*table name (members)*/ 'CouZoo_Members',
                      /*table name (coupons)*/ 'CouZoo_Coupons',
                      /*table name (cart)*/ 'CouZoo_Cart');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$couzoo->SetRandomKey('jp7EsVfgyAhUwnF');

//Update the coupons for the site in the database
require_once("update_coupons.php");

//Check is user, otherwise if user has guest id in cookies, otherwise assign them one
if (isset($_COOKIE['CouZoo_guest_id'])) {
	$id_user = $_COOKIE['CouZoo_guest_id'];
} else {
	$now = strtotime("now"); $rand = rand();
	$id_user = $now."_".$rand;;
	setcookie("CouZoo_guest_id", $id_user, strtotime( '+30 days' ) );
}

?>