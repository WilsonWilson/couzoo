<?php
// include mobile header
include ("m-header.php");

$redirect = $couzoo->CheckLoginDash("merchant-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("m-log-in.php");
    	exit;
}
elseif($redirect === "customer")
{
    	$couzoo->RedirectToURL("m-my-account.php");
    	exit;
}

//Get User Data
$id_user = $couzoo->GetUser();

if(isset($_POST['id_user']))
{
$user_id = $couzoo->SanitizeForSQL($_POST['id_user']);
$adr = $couzoo->SanitizeForSQL($_POST['address']);
$city = $couzoo->SanitizeForSQL($_POST['city']);
$state = $couzoo->SanitizeForSQL($_POST['state']);
$zip = $couzoo->SanitizeForSQL($_POST['zip']);
$phone = $couzoo->SanitizeForSQL($_POST['phone']);
$website = $couzoo->SanitizeForSQL($_POST['website']);
$description = $_POST['description'];

	$enc_adr = urlencode($adr);
	$enc_city = urlencode($city);
	$enc_state = urlencode($state);
	$enc_zip = urlencode($zip);

	$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$enc_adr."+".$enc_city."+".$enc_state."+".$enc_zip."&sensor=false");
	$loc = json_decode($json);

	$invalid_address = "false";
	$userAdr = "";
	if ($loc->status == 'OK') {
    		foreach ($loc->results[0]->address_components as $address) {
        		if (in_array("street_number", $address->types)) {
            			$userAdr = $address->short_name." ";
        		}
        		if (in_array("route", $address->types)) {
            			$userAdr .= $address->short_name;
        		}
        		if (in_array("locality", $address->types)) {
            			$userCity = $address->short_name;
        		}
        		if (in_array("administrative_area_level_1", $address->types)) {
            			$userState = $address->short_name;
        		}
        		if (in_array("postal_code", $address->types)) {
            			$userZip = $address->short_name;
        		}
    		}
		$userLat = $loc->results[0]->geometry->location->lat;
		$userLong = $loc->results[0]->geometry->location->lng;
	} 
	else { $invalid_address = "true"; }

if ($adr == ""){

	    // Set up associative array
	    $err .= "Please enter your business address.";
}
elseif ($city == ""){
	    $err[] .= "Please enter your business city.";
}elseif ($state == ""){
	    $err[] .= "Please enter your business state.";
}elseif ($zip == ""){
	    $err[] .= "Please enter your business zip code.";
}
elseif ($invalid_address == "true" || !$userAdr){
	    $err[] .= "The address you entered is invalid. Please enter a valid business address.";
}
elseif ($phone == ""){
	    $err[] .= "Please enter your phone number.";
}
elseif (strlen($description) > 700){
	    $err[] .= "The description cannot be longer than 700 characters.";
}

if ($_FILES['prof_img']['tmp_name']) {
	$allowedExts = array("png", "jpg", "jpeg", "gif");							
	$ext = end(explode('.', strtolower($_FILES['prof_img']['name'])));
	if (!in_array($ext, $allowedExts)) {
		$err[] .= "Invalid photo";
	} else {
		require_once("../includes/class.photo.php");

		$img_tmp = $_FILES['prof_img']['tmp_name'];
		$path = "../uploads/merchants/".$user_id.".jpg";

      		$image = new Photo();
      		$image->load($img_tmp);
      		$image->resize(500,300);
		$image->save($path);
	}
}

$c_edit_qry = mysql_query("UPDATE CouZoo_Members SET address = '$userAdr', city = '$userCity', state = '$userState', zip = '$userZip',
				phone = '$phone', website = '$website', description = '$description', latitude = '$userLat', longitude = '$userLong', image = '".$user_id.".jpg'
				WHERE id_user = '$user_id'");

$success = true;
}

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));

$jdate = new DateTime($user['joined_date']);
$formatted_jdate = $jdate->format("n/j/Y");

$liveNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."' AND status = 'live'"));
$expNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."' AND status = 'ended'"));
$totalNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."'"));
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

<!--FADE OUT on scroll-->
<script type="text/javascript">
	$(window).scroll(function(){
		  if($(window).scrollTop()>12){
			 $("#theDiv").fadeOut();
		  }else{
			 $("#theDiv").fadeIn();
		  }
		});
</script>


</head>

<body>

<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Company Profile</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START EDIT FIELDS -->
<!-- END EDIT FIELDS -->


<!--END TOP BAR & MENU-->

<div class="container">

<!--Start Coupon-->
<div class="m-use-container">
    	<div class="m-merch-profile-page-title-container">
		<?php if($err): foreach($err as $e):?>
		    <center><font color="red"><?=$e?></font></center>
		<?php endforeach; elseif($success == true):?>
		    <center><font color="green">Merchant Profile Updated!</font></center>
		<?php endif;?>
        	<h1><?=$user['bname']?></h1>
        </div>
</div><!--end m-use-coupon-container-->
                
    <div class="m-coupon-image-container">
      <img src="../../uploads/merchants/<?=$user['id_user']?>.jpg?<?=strtotime($user['last_update'])?>" />
    </div>
 
    <div class="m-blurb">
	<?=$user['description']?>
    </div><!--End m-Blurb-->
    
	<div class="merch-profile-demo-list">
        <ul>
            <li><span>Member Since:</span> <?=$formatted_jdate?></li>
            <li><span>Profile Views:</span> <?=$user['profile_views']?></li>
            <li><span>Total Live Coupons:</span> <?=$liveNum?></li>
            <li><span>Total Expired Coupons:</span> <?=$expNum?></li>
            <li><span>Total Coupons Created:</span> <?=$totalNum?></li>
        </ul>
    </div>

	<div class="m-map-container">
		<iframe style="width:100%;height:600px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?z=12&t=m&q=loc:<?=$user['latitude']?>+<?=$user['longitude']?>&output=svembed&layer=c"></iframe>
    </div>

	<div id="m-address-container">
        <div id="address-box">
        <span class="m-company-name"><?=$user['bname']?></span><br/>
            <span class="street"><?=$user['address']?></span>
        </div>
        <div id="address-box">
            <span class="city"><?=$user['city']?></span>, <span class="state"><?=$user['state']?></span> <span class="zip"><?=$user['zip']?></span>
        </div><!--End address-box-->
        <div class="company-phone"><?=$user['phone']?></div>
        <div class="company-website"><a href="http://<?=$user['website']?>" target="_blank" class="company-website"><?=$user['website']?></a></div>     
    </div><!--End address-contianer-->
   
<br clear="all"/>


    <div class="edit-profile-fixed-button">
        Edit<br />Profile
    </div>


<div id="target"></div>
<div class="merch-profile-edit-form" style="display:none;"><!--Start Hidden Div-->
<div class="m-merch-profile-page-title-container">
        	<h1>Edit Company Profile</h1>
        </div>
<div class="m-sign-up-form-container">
<div id="m-advancedCall">
    <form id="edit_merchant" enctype="multipart/form-data" action="" method="POST">
       <input type="hidden" value="<?=$id_user?>" id="id_user" name="id_user">
    	<input type="file" name="prof_img" id="prof_img">
        <br />
        <textarea name="description" class="m-textarea" style="font-family:Verdana, Geneva, sans-serif; font-size:2.8em;"><?=$user['description']?></textarea>
        
        <br />
        <input class="myclass" type="text" name="address" value="<?=$user['address']?>" />
        <br />
        <input class="myclass" type="text" name="city" value="<?=$user['city']?>" />
        <br />
        <select name="state" class="myclass m-merch-signup" style="width:49%; height:168px;">
			 <option value="">&nbsp; &nbsp; &nbsp; state</option>
                      <option value="AL" <?=$user['state'] == 'AL' ? "SELECTED" : "";?>>Alabama</option>
                      <option value="AK" <?=$user['state'] == 'AK' ? "SELECTED" : "";?>>Alaska</option>
                      <option value="AZ" <?=$user['state'] == 'AZ' ? "SELECTED" : "";?>>Arizona</option>
                      <option value="AR" <?=$user['state'] == 'AR' ? "SELECTED" : "";?>>Arkansas </option>
                      <option value="CA" <?=$user['state'] == 'CA' ? "SELECTED" : "";?>>California</option>
                      <option value="CO" <?=$user['state'] == 'CO' ? "SELECTED" : "";?>>Colorado</option>
                      <option value="CT" <?=$user['state'] == 'CT' ? "SELECTED" : "";?>>Connecticut </option>
                      <option value="DE" <?=$user['state'] == 'DE' ? "SELECTED" : "";?>>Delaware</option>
                      <option value="FL" <?=$user['state'] == 'FL' ? "SELECTED" : "";?>>Florida </option>
                      <option value="GA" <?=$user['state'] == 'GA' ? "SELECTED" : "";?>>Georgia </option>
                      <option value="HA" <?=$user['state'] == 'HA' ? "SELECTED" : "";?>>Hawaii </option>
                      <option value="ID" <?=$user['state'] == 'ID' ? "SELECTED" : "";?>>Idaho</option>
                      <option value="IL" <?=$user['state'] == 'IL' ? "SELECTED" : "";?>>Illinois</option>
                      <option value="IN" <?=$user['state'] == 'IN' ? "SELECTED" : "";?>>Indiana</option>
                      <option value="IA" <?=$user['state'] == 'IA' ? "SELECTED" : "";?>>Iowa</option>
                      <option value="KS" <?=$user['state'] == 'KS' ? "SELECTED" : "";?>>Kansas</option>
                      <option value="KY" <?=$user['state'] == 'KY' ? "SELECTED" : "";?>>Kentucky </option>
                      <option value="LA" <?=$user['state'] == 'LA' ? "SELECTED" : "";?>>Louisiana </option>
                      <option value="ME" <?=$user['state'] == 'ME' ? "SELECTED" : "";?>>Maine</option>
                      <option value="MD" <?=$user['state'] == 'MD' ? "SELECTED" : "";?>>Maryland </option>
                      <option value="MA" <?=$user['state'] == 'MA' ? "SELECTED" : "";?>>Massachusetts</option>
                      <option value="MI" <?=$user['state'] == 'MI' ? "SELECTED" : "";?>>Michigan</option>
                      <option value="MN" <?=$user['state'] == 'MN' ? "SELECTED" : "";?>>Minnesota </option>
                      <option value="MS" <?=$user['state'] == 'MS' ? "SELECTED" : "";?>>Mississippi</option>
                      <option value="MO" <?=$user['state'] == 'MO' ? "SELECTED" : "";?>>Missouri </option>
                      <option value="MT" <?=$user['state'] == 'MT' ? "SELECTED" : "";?>>Montana </option>
                      <option value="NE" <?=$user['state'] == 'NE' ? "SELECTED" : "";?>>Nebraska </option>
                      <option value="NV" <?=$user['state'] == 'NV' ? "SELECTED" : "";?>>Nevada</option>
                      <option value="NH" <?=$user['state'] == 'NH' ? "SELECTED" : "";?>>New Hampshire</option>
                      <option value="NJ" <?=$user['state'] == 'NJ' ? "SELECTED" : "";?>>New Jersey</option>
                      <option value="NM" <?=$user['state'] == 'NM' ? "SELECTED" : "";?>>New Mexico </option>
                      <option value="NY" <?=$user['state'] == 'NY' ? "SELECTED" : "";?>>New York </option>
                      <option value="NC" <?=$user['state'] == 'NC' ? "SELECTED" : "";?>>North Carolina</option>
                      <option value="ND" <?=$user['state'] == 'ND' ? "SELECTED" : "";?>>North Dakota</option>
                      <option value="OH" <?=$user['state'] == 'OH' ? "SELECTED" : "";?>>Ohio</option>
                      <option value="OK" <?=$user['state'] == 'OK' ? "SELECTED" : "";?>>Oklahoma</option>
                      <option value="OR" <?=$user['state'] == 'OR' ? "SELECTED" : "";?>>Oregon</option>
                      <option value="PA" <?=$user['state'] == 'PA' ? "SELECTED" : "";?>>Pennsylvania </option>
                      <option value="RI" <?=$user['state'] == 'RI' ? "SELECTED" : "";?>>Rhode Island </option>
                      <option value="SC" <?=$user['state'] == 'SC' ? "SELECTED" : "";?>>South Carolina</option>
                      <option value="SD" <?=$user['state'] == 'SD' ? "SELECTED" : "";?>>South Dakota</option>
                      <option value="TN" <?=$user['state'] == 'TN' ? "SELECTED" : "";?>>Tennessee </option>
                      <option value="TX" <?=$user['state'] == 'TX' ? "SELECTED" : "";?>>Texas</option>
                      <option value="UT" <?=$user['state'] == 'UT' ? "SELECTED" : "";?>>Utah</option>
                      <option value="VT" <?=$user['state'] == 'VT' ? "SELECTED" : "";?>>Vermont</option>
                      <option value="VA" <?=$user['state'] == 'VA' ? "SELECTED" : "";?>>Virginia</option>
                      <option value="WA" <?=$user['state'] == 'WA' ? "SELECTED" : "";?>>Washington </option>
                      <option value="WV" <?=$user['state'] == 'WV' ? "SELECTED" : "";?>>West Virginia</option>
                      <option value="WI" <?=$user['state'] == 'WI' ? "SELECTED" : "";?>>Wisconsin</option>
                      <option value="WY" <?=$user['state'] == 'WY' ? "SELECTED" : "";?>>Wyoming</option>
                        </select>
        <input style="width:49%; float:right;" class="myclass" type="number" name="zip" value="<?=$user['zip']?>" />
        
        <input class="myclass" type="number" name="phone" value="<?=$user['phone']?>" />
        <br />
        <input class="myclass" type="text" style="margin-bottom:5%;" name="website" value="<?=$user['website']?>" />
    </form>
</div>
</div>


<div class="m-use-now-button-contianer">
	<div class="m-use-now-button">
       <a href="#">
       	<div id="update-btn" class="use-this-coupon">update</div>
       </a>
    </div>
</div><!--end use now button container-->

<div class="m-or-paypal-container">
	<div class="m-or-paylpal-line m-or-paylpal-line-l"></div>
     or 
     <div class="m-or-paylpal-line m-or-paylpal-line-r"></div>
</div>

<div class="m-log-in-button-contianer" style="margin-top:5%">
        <div class="m-sign-up-button">
           <a href="#" class="cancel-edit"> <div class="use-this-coupon">cancel</div></a>
        </div>
	</div><!--end use now button container-->  
<br clear="all"/>

</div><!--merch-profile-edit-form--


<div class="m-coupon-bottom-fixed">
    <div id="theDiv"><img src="m-images/m-scroll-down-arrow.png" /> <span>scroll for more details</span> <img src="m-images/m-scroll-down-arrow.png" /></div>
</div>


</div><!--End Container-->


<script type="text/javascript">
		$(".edit-profile-fixed-button").click(function(){
			$(".merch-profile-edit-form").fadeIn('slow');
			$(".edit-profile-fixed-button").fadeOut('slow');
			$(document.body).animate({'scrollTop':$('#target').offset().top}, 2000);
        });
	</script>
   <script type="text/javascript">
		$(".cancel-edit").click(function(){
			$(".merch-profile-edit-form").fadeOut('slow');
			$(".edit-profile-fixed-button").fadeIn('slow');
			$(document.body).animate({'scrollTop':$('.m-use-page-title').offset().top}, 600);
        });
</script>

<script>
$('#update-btn').click(function() {
	$('#edit_merchant').submit();
});
</script>

</body>
</html>
