<?php
// include mobile header
include ("m-header.php");

$redirect = $couzoo->CheckLoginDash("customer-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("m-log-in.php");
    	exit;
}

//Get User Data
$id_user = $couzoo->GetUser();

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1.5)" />
<meta name="viewport" content="target-densitydpi=device-dpi" />
<title>CouZoo Mobile</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<!--FOR FORM-->
<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script src="js/mobile-menu.js" type="text/javascript"></script>

<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' />
    
</head>

<body>

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">My Coupons</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account--
<!--END TOP BAR & MENU-->

<?php
$c_pur = mysql_query("SELECT * FROM CouZoo_Coupons AS coup 
				   LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				   LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
				   WHERE my.id_user = '$id_user' AND my.status = '0'");
$i=0;
while ($c = mysql_fetch_array($c_pur)):

$pur_date = new DateTime($c['pdate']);
$pdate = $pur_date->format("m/d/y");
$valid_date = new DateTime($c['exp_date']);
$vdate = $valid_date->format("m/d/y");
?>
            <!--Start Coupon-->
                <div class="m-use-container">
                    <div class="m-use-coupon-container">
                        <div class="m-use-coupon-title"><?=$c['title']?></div>
                        <div class="m-use-content-container">
                            <div class="m-use-image-container">
                              <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['cdate'])?>" />
                            </div>
                            <div class="m-use-button-container">
                                <div class="m-use-coupon-use-coupon">
                                    <div class="use-this-coupon">use this coupon</div>
                                    <a href="m-use-now.php?id=<?=$c['id_coupon']?>"></a>
                                </div><!--end m-use-coupon-use-coupon-->
                            </div><!--end m-use-button-container-->
                        </div><!--end m-use-content-container-->
                        <div class="m-used-purchased-on">Purchased: <span><?=$pdate?></span></div>
                        <div class="m-used-valid-thru">Valid Thru: <span><?=$vdate?></span></div>
                        <br clear="all"/>
                    </div><!--end m-use-coupon-container-->
                </div><!--end m-use-container-->
            <!--END Coupon-->
<?php 
    $i++;
    endwhile;

    if ($i < 1)
    {
  	echo '<div class="m-use-container"><div class="m-use-coupon-container"><center>You currently do not have any unused coupons. Go out and find some!</center></div></div>';
    }
?>

</body>
</html>
