<?php
require_once("includes/config.php");
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START MERCH REG PAGE ADD-ONS -->

<link rel="STYLESHEET" type="text/css" href="css/login-page.css" />

<!-- END MERCH REG PAGE ADD-ONS -->


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

<div id='login_page'>
<form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset>
<legend>Merchant Registration</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='merchant' id='merchant' value='yes' />

<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

<div class='container'>
    <label for='fname' >First Name:</label><br/>
    <input type='text' name='fname' id='fname' value='<?php echo $couzoo->SafeDisplay('fname') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='lname' >Last Name:</label><br/>
    <input type='text' name='lname' id='lname' value='<?php echo $couzoo->SafeDisplay('lname') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='phone' >Phone:</label><br/>
    <input type='text' name='phone' id='phone' value='<?php echo $couzoo->SafeDisplay('phone') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='email' >E-mail:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $couzoo->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <label for='confirm_email' >Confirm E-mail:</label><br/>
    <input type='text' name='confirm_email' id='confirm_email' value='<?php echo $couzoo->SafeDisplay('confirm_email') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <label for='confirm_password' >Confirm Password:</label><br/>
    <input type='password' name='confirm_password' id='confirm_password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='bname' >Business Name:</label><br/>
    <input type='text' name='bname' id='bname' value='<?php echo $couzoo->SafeDisplay('bname') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='website' >Website:</label><br/>
    <input type='text' name='website' id='website' value='<?php echo $couzoo->SafeDisplay('website') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='address' >Business Street Address:</label><br/>
    <input type='text' name='address' id='address' value='<?php echo $couzoo->SafeDisplay('address') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='city' >Business City:</label><br/>
    <input type='text' name='city' id='city' value='<?php echo $couzoo->SafeDisplay('city') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='state' >Business State:</label><br/>
                            <select name="state" class="myclass">
			 <option value="">--select business state--</option>
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
                        </select><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='zip' >Business Zip:</label><br/>
    <input type='text' name='zip' id='zip' value='<?php echo $couzoo->SafeDisplay('zip') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='btype' >Type of Business:</label><br/>
                        <select name="btype">
                        	<option value="">select type of business</option><br />
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
                        </select><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>

<div class='container'>
	<div class="submit-btn"></div>
	<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
</div>
<div class='short_explanation'><a href='login-merchant.php'>Merchant Login</a>
<a href='register-customer.php' style='float: right'>Customer Sign-up</a></div><br>
</fieldset>
</form>

</div>

</body>
</html>

<script>
$('.submit-btn').click(function() {
	$('#login_form').submit();
});
</script>