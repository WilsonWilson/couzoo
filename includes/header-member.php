<?php
//Get User Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = "SELECT * FROM CouZoo_Members WHERE id_user='$id_user'";
$result = mysql_query($qry);
$row = mysql_fetch_assoc($result);

	$merchant = $row['merchant'];
	$admin_access = $row['admin_access'];

if($merchant == "yes")
{
	$acclink = "merchant-dash.php";
}
else
{
	$acclink = "customer-dash.php";
}

if ($admin_access == 1)
{
       $admin_link = '<li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
			 <li><a href="'.SITE_LOC . ADMIN_LOC.'index.php">Admin Panel</a></li>';
}
?>

<!-- OLD NAV
<div id="login-box<?=$admin_css?>">

<a href="logout.php?return=<?=$url?>" style="color:#f26625;">Log Out</a> &nbsp;|&nbsp; <a href="<?=$acclink?>" style="color:#f26625;">My Account</a> <?=$admin_link?>

</div>
-->

    <div class="sign-in-nav-container">
        
        <div id="sign-in-sign-up-menu">
            <ul>
                <li><a href="logout.php?return=<?=$url?>">Log Out</a></li>
                <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
		  <li><a href="<?=$acclink?>">My Account</a></li>
		  <?=$admin_link?>
            </ul>
        </div>
    </div>
    <!-- END Sign-In Sign-Up Main Top Nav -->

    <div id="header">

        <div class="header-home-link-container"><a href="./index.php"><div class="header-home-link"></div></a></div>
        
    </div>
<!-- END Member Header -->