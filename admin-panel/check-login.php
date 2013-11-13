<?php
session_start();

//Get User Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$admin_access = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '$id_user' AND admin_access = '1' LIMIT 1"));

if($admin_access == 1 && isset($_SESSION['admin_access']))
{
	// Valid admin user and admin password verified
}
elseif($admin_access == 1)
{
	// Valid admin user, but they haven't verified admin pass yet
       header("Location: ".SITE_LOC . ADMIN_LOC."admin-login.php");
       exit;
}
else
{
	// Not logged in at all -- redirect them to where they belong
       header("Location: ".SITE_LOC."index.php");
       exit;
}
?>