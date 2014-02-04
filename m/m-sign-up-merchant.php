<?php
// include mobile header
include ("m-header.php");
$id_user = "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" href="css/ldpi.css" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1)" href="css/mdpi.css" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1.5)" href="css/hdpi.css" />
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

<!-- START Modal Content -->
<div class="page-overlay"></div>
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container">
    <div class="change-locaton-inner-container">
    <h2>Privacy Statement</h2>
    <p class="modal-p">All your info is safe with us. We don't share anything with anybody. Our payments are also processed and protected through PayPal so you can shop with confidence, knowing your financial information is secure no matter how you choose to pay.</p>     
    </div>
</div><!--END Change Location Container-->
<!-- END Modal Content -->


<!-- START Modal Content "change email" -->
<div class="close-change-location-modal2">close</div>
<div class="change-locaton-container2"style="margin-top:15%;">
    <div class="change-locaton-inner-container">
        <h2>Merchant Sign-In</h2>
            <div id="m-advancedCall2">
                <input class="" type="text" name="" value="email" />
                <br />
                <input class="" type="text" name="" value="password" />
            </div>
	    </form>      
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">sign in</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->



<div class="m-nav-header">
    <div class="m-menu-btn">
    	<div id="expanderHead" style="cursor:pointer;">
        	<span id="expanderSign"><img src="m-images/m-menu-1.png" /></span>
        </div>
    </div>
    
    <div class="m-use-page-title">Merchant Sign Up</div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="m-merchant-center.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-merch-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account--
<!--END TOP BAR & MENU-->

<div class="container">



<?php
if(isset($_POST['submitted']))
{
	$adr = urlencode($_POST['address']);
	$zip = urlencode($_POST['zip']);

	$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$adr."+".$zip."&sensor=false");
	$loc = json_decode($json);

	if ($loc->status == 'OK') {

    		foreach ($loc->results[0]->address_components as $address) {
        		if (in_array("street_number", $address->types)) {
            			$official_adr = $address->long_name;
        		}
        		if (in_array("route", $address->types)) {
            			$official_adr .= $address->long_name;
        		}
        		if (in_array("locality", $address->types)) {
            			$_POST['city'] = $address->long_name;
        		}
        		if (in_array("administrative_area_level_1", $address->types)) {
            			$_POST['state'] = $address->short_name;
        		}
    		}
		
		$_POST['address'] = $official_adr;
		$_POST['lat'] = $loc->results[0]->geometry->location->lat;
		$_POST['long'] = $loc->results[0]->geometry->location->lng;
	}

	if($couzoo->RegisterMerchant())
   	{
		echo "<div class='center-reg'> Thank you for registering with CouZoo. Please complete your registration by confirming your account.<br>
			An e-mail has been sent to you with further instructions.</div>";
		die;
   	}
}
?>



<div class="m-sign-up-intro">Please complete the form below to create a merchant account.</div>
<!--<div class="m-sign-up-im-a-merch"><a href="#">Learn<br/>more</a></div>-->

<div class="m-sign-up-form-container">
<div id="m-advancedCall">
	   <form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
	         <input type='hidden' name='submitted' id='submitted' value='1'/>
		  <input type='hidden' name='merchant' id='merchant' value='yes' />

	<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

        <input class="myclass" type="text" name='fname' id='fname' value='<?php echo $couzoo->SafeDisplay('fname') ?>' maxlength="50" placeholder="contact's first name" />					
        <br />
        <input class="myclass" type="text" name='lname' id='lname' value='<?php echo $couzoo->SafeDisplay('lname') ?>' maxlength="50" placeholder="contact's last name" />
        <br />
        <input class="myclass" style="margin-bottom:5%;" type="text" name='bname' id='bname' value='<?php echo $couzoo->SafeDisplay('bname') ?>' maxlength="50" placeholder="enter business name" />
        <br />
        <input class="myclass" type="text" name='email' id='email' value='<?php echo $couzoo->SafeDisplay('email') ?>' maxlength="50" placeholder="business email" />
        <br />
        <input class="myclass" type="text" style="margin-bottom:5%;" name='confirm_email' id='confirm_email' value='<?php echo $couzoo->SafeDisplay('confirm_email') ?>' maxlength="50" placeholder="confirm business email" />
        <br />
        <input style="width:49%; float:left;" class="myclass" type='password' name='password' id='password' maxlength="50" placeholder="password" />
        <input style="width:49%; float:right; margin-bottom:5%;" class="myclass" type='password' name='confirm_password' id='confirm_password' maxlength="50" placeholder="confirm password" />
        <br />
        <input class="myclass" type="number" name='phone' id='phone' value='<?php echo $couzoo->SafeDisplay('phone') ?>' maxlength="50" placeholder="business phone" />
        <br />
        <input class="myclass" type="text" style="margin-bottom:5%;" name='website' id='website' value='<?php echo $couzoo->SafeDisplay('website') ?>' maxlength="50"placeholder="enter business website" />
        <br />
        <input class="myclass" type="text" name='address' id='address' value='<?php echo $couzoo->SafeDisplay('address') ?>' maxlength="50" placeholder="enter business street" />
        <br />
        <input class="myclass" type="text" name='city' id='city' value='<?php echo $couzoo->SafeDisplay('city') ?>' maxlength="50" placeholder="enter business city" />
        <br />
        <select name="state" class="myclass m-merch-signup" style="width:49%; height:168px;">
			 <option value="">&nbsp; &nbsp; &nbsp; state</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas </option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut </option>
                      <option value="DE">Delaware</option>
                      <option value="FL">Florida </option>
                      <option value="GA">Georgia </option>
                      <option value="HA">Hawaii </option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky </option>
                      <option value="LA">Louisiana </option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland </option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota </option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri </option>
                      <option value="MT">Montana </option>
                      <option value="NE">Nebraska </option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico </option>
                      <option value="NY">New York </option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania </option>
                      <option value="RI">Rhode Island </option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee </option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington </option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                        </select>
        <input style="width:49%; float:right; margin-bottom:5%;" class="myclass" type="number" name='zip' id='zip' value='<?php echo $couzoo->SafeDisplay('zip') ?>' maxlength="50" placeholder="zip" />
        <br />
        <select name="btype" style="width:100%; height:168px;">
                <option value="">&nbsp; &nbsp; &nbsp; select type of business</option><br />
                <option value=""></option><br />
                <option value="all_fad">All Food & Drink</option><br />
                <option value="restaurants">Restaurants</option><br />
                <option value="bars">Bars & Nightlife</option><br />
                <option value="other_fad">Other Food & Drink</option><br />
                <option value=""></option><br />
                <option value="all_beauty">All Beauty</option><br />
                <option value="massage">Massage</option><br />
                <option value="facial"> Facial</option><br />
                <option value="nailcare">Nail Care</option><br />
                <option value="tanning">Tanning</option><br />
                <option value="hair">Hair</option><br />
                <option value="waxing">Waxing</option><br />
                <option value="spa">Spa</option><br />
                <option value="teethwhitening">Teeth Whitening</option><br />
                <option value="other_beauty">Other Beauty</option><br />
                <option value=""></option><br />
                <option value="all_fitness">All Fitness</option><br />
                <option value="yoga">Yoga & Pilates</option><br />
                <option value="gym">Gym</option><br />
                <option value="bootcamp">Boot Camp</option><br />
                <option value="martialarts">Martial Arts</option><br />
                <option value="classes">Classes</option><br />
                <option value="personaltraining">Personal Training</option><br />
                <option value="other_fitness">Other Fitness</option><br />
                <option value=""></option><br />
                <option value="all_medical">All Medical</option><br />
                <option value="vision">Vision & Eye Care</option><br />
                <option value="dental">Dental</option><br />
                <option value="chiropractor">Chiropractor</option><br />
                <option value="skincare">Skin Care</option><br />
                <option value="other_medical">Other Medical</option><br />
                <option value=""></option><br />
                <option value="all_activities"> All Activities</option><br />
                <option value="museums"> Museums</option><br />
                <option value="wine">Wine Tasting</option><br />
                <option value="tours">Tours</option><br />
                <option value="comedy">Comedy Clubs</option><br />
                <option value="shows"> Shows</option><br />
                <option value="lifeskill">Life Skill Classes</option><br />
                <option value="golf"> Golf</option><br />
                <option value="bowling">Bowling</option><br />
                <option value="skydiving">SkyDiving</option><br />
                <option value="outdoor">Outdoor Adventure</option><br />
                <option value="other_activities"> Other Activities</option><br />
                <option value=""></option><br />
                <option value="all_retail"> General Retail & Services</option><br />
                <option value="homeservices">Home Services</option><br />
                <option value="clothing">Clothing</option><br />
                <option value="automotive">Automotive</option><br />
                <option value="photography"> Photography</option><br />
                <option value="other_retail">Other Retail and/or Service</option><br />
                <option value=""></option><br />
                <option value="all_family">All Family and Life</option><br />
                <option value="wedding">Wedding</option><br />
                <option value="pregnancy">Pregnancy</option><br />
                <option value="baby">Baby</option><br />
                <option value="children">Children</option><br />
                <option value=""></option><br />
                <option value="gay">Gay</option><br />
                <option value=""></option><br />
                <option value="travel">Travel</option><br />
                <option value=""></option><br />
                <option value="other">Other</option><br />
                        </select>

		<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
    </form>
</div>
</div>
<br clear="all"/>
<div class="m-log-in-button-contianer">
	<div class="m-log-in-button">
       <a href="#"> <div class="use-this-coupon">sign up</div></a>
    </div>
</div><!--end use now button container-->
<div class="m-forgot-pass"><a class="privacy-statement-link" href="#">privacy statement</a></div>
<br />
<div class="m-forgot-pass"><a class="merch-sign-in-click" href="#">already a member, sign-in</a></div>
<div style="height:50px;"></div>
</div><!--End Container-->

<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".privacy-statement-link").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container").fadeIn('slow');
				$(".close-change-location-modal").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container").fadeOut('slow');	
			$(".close-change-location-modal").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal").click(function(){
			$(".change-locaton-container").fadeOut('slow');	
			$(".close-change-location-modal").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
</script>

<script type="text/javascript">
		$(".merch-sign-in-click").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container2").fadeIn('slow');
				$(".close-change-location-modal2").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container2").fadeOut('slow');	
			$(".close-change-location-modal2").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal2").click(function(){
			$(".change-locaton-container2").fadeOut('slow');	
			$(".close-change-location-modal2").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
	});			
</script>

<script>
$('.m-log-in-button').click(function() {
	$('#login_form').submit();
});
</script>

</body>
</html>
