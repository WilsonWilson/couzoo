<!--START HEADER & Log-in, Log-out, Register, My Account-->
    <!-- Overlay -->
    <div id="overlay" style="display:none"></div>
	<div id="overlay2" class="go_to_slide_exit" style="display:none"></div>        
        
    <span id="advancedCallLogin">
    
    <div class="sign-in-nav-container">
        
        <div id="sign-in-sign-up-menu">
            <ul>
                <li><a href="#" class="go_to_slide_login showOverlay">Sign In</a></li>
                <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
                <li class="Menu_One"><a href="" class="go_to_slide_sign_up_direct showOverlay">Sign Up</a>
                    <ul class="sign-in-sign-out-dd-container">
                        <li>
                            <ul>
                                <li><a href="" class="TopLevel go_to_slide_c_signup showOverlay">Customer</a></li>
                                <li><a href="" class="TopLevel go_to_slide_m_signup showOverlay">Merchant</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END Sign-In Sign-Up Main Top Nav -->
     
   	
	<ul class="my_asyncslider2" id="slider_1">
	    
            <li id="slide-empty"></li>
            
            <li id="slide-login">
                <div class="slider-content-container-log-in slider-content-shadow-shadow">
                	<div class="sign-in-exit-container"><a href="" class="go_to_slide_exit hideOverlay"><img src="images/close-sign-in-arrow.png"/></a></div>
                	<h3>Sign In <span><!-- or <a href="#" class="go_to_slide_c_signup">sign-up</a></span>--></h3>
                    <form action="login.php" method="post" id="login" name="login">
                        <input type='hidden' name='url' id='url' value='<?=$url?>'/>
                        <input type='hidden' name='submitted' id='submitted' value='1'/>
                           <input class="myclass" type="text" name="email" id="email" value="email" />
                           <input class="myclass" type="password" name="password" id="password" value="password" /> <br>
                           <div style="height:6px;"></div>
						   <div id="login_main" class="login-btn"></div>
						   <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
                     </form>
                     <div class="extra-links">
                        <a href="" class="go_to_slide_sign_up_direct">sign up</a>
                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="" class="go_to_slide_forgot">forgot password</a>
                    </div>
                </div>
            </li>
            <li id="slide-c-sign-up">
                <div class="slider-content-container-sign-up-c slider-content-shadow-shadow">
                	<div class="sign-in-exit-container"><a href="" class="go_to_slide_exit hideOverlay"><img src="images/close-sign-in-arrow.png"/></a></div>
                	<h3>Customer Sign Up <span><!-- or <a href="#" class="go_to_slide_login">sign-in</a></span>--></h3>
                     <form action="register-customer.php" name="customerReg" id="customerReg" method="post">
                        <input type='hidden' name='merchant' id='merchant' value='no'/>
                        <input type='hidden' name='submitted' id='submitted' value='1'/>
		          <input class="myclass" type="text" name="fname" value="enter first name" /><br>
                        <input class="myclass" type="text" name="lname" value="enter last name" /><br><br>
                        <input class="myclass" type="text" name="email" value="enter email" /><br>
                        <input class="myclass" type="text" name="confirm_email" value="confirm email" /><br><br>                       						
                        <input class="myclass" type="password" name="password" value="create password"/><br>
                        <input class="myclass" type="password" name="confirm_password" value="confirm password"/><br />
                              <div style="height:6px;"></div>
						   <div id="cReg" class="register-btn "></div>
						   <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
                     </form>
                     <div class="extra-links">
                        <a href="" class="go_to_slide_login">sign in</a>
                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="" class="go_to_slide_m_signup">merchant sign up</a>
                     </div>
                </div>
            </li>
            <li id="slide-sign-up-direct">
                <div class="slider-content-container-sign-up-direct slider-content-shadow-shadow">
                	<div class="sign-in-exit-container"><a href="" class="go_to_slide_exit hideOverlay"><img src="images/close-sign-in-arrow.png"/></a></div>
                	<h3>Sign Up for CouZoo <span><!-- or <a href="#" class="go_to_slide_c_signup">sign-up</a></span>--></h3>
                    
                    <a href="" class="go_to_slide_sign_up_direct_c"><div class="slide-sign-up-direct-custmer"></div></a>
                    <a href="" class="go_to_slide_sign_up_direct_m"><div class="slide-sign-up-direct-merch"></div></a>                    
                    
                    <div class="extra-links">
                        <a href="" class="go_to_slide_login">sign in</a>
                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="" class="go_to_slide_forgot">forgot password</a>
                    </div>
                </div>
            </li>
            <li id="slide-m-sign-up">
            	<div class="slider-content-container-sign-up-m slider-content-shadow-shadow">
                	<div class="sign-in-exit-container"><a href="" class="go_to_slide_exit hideOverlay"><img src="images/close-sign-in-arrow.png"/></a></div>
                	<h3>Merchant Sign Up <span><!-- or <a href="#" class="go_to_slide_login">sign in</a></span>--></h3>
                       <form action="register-merchant.php" name="merchantReg" id="merchantReg" method="post">
			   <input type='hidden' name='merchant' id='merchant' value='yes'/>
                        <input type='hidden' name='submitted' id='submitted' value='1'/>

                     <div style="float:left">
		          <input class="myclass" type="text" name="fname" value="enter contact's first name" /><br>
                        <input class="myclass" type="text" name="lname" value="enter contact's last name" /><br><br>
                        <input class="myclass" type="text" name="phone" value="enter business phone" /><br><br>
                        <input class="myclass" type="text" name="email" value="enter business email" /><br> 
                        <input class="myclass" type="text" name="confirm_email" value="confirm business email" /><br><br>                       						
                        <input class="myclass" type="password" name="password" value="create password"/><br>
                        <input class="myclass" type="password" name="confirm_password" value="confirm password"/><br />
                     </div>
                     <div style="float:left; margin-left:20px;">
		          <input class="myclass" type="text" name="bname" value="enter business name" /><br><br>
                        <input class="myclass" type="text" name="website" value="enter business website" /><br><br>
                        <input class="myclass" type="text" name="address" value="enter business street address" /><br>
                        <input class="myclass" type="text" name="city" value="enter business city" /><br> 
                        <div class="styled-select">

                        <select name="state" class="myclass">
			 <option value="">select business state</option>
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
                        </div>   <br />
 
                                        						
                        <input class="myclass" type="text" name="zip" value="enter business zip"/><br>
                        
                        <div class="styled-select" style="margin-top:16px">
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
                        </select>
                        </div>
                     </div>
                     
                     <br clear="all"/>
                     
                     <div style="margin:4px 0px 0px 330px;">
                     	<div id="mReg" class="register-btn "></div>
                     </div>              
                  </form>
                    <div class="extra-links">
                        <a href="" class="go_to_slide_login">sign in</a>
                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="" class="go_to_slide_c_signup">customer sign up</a>
                    </div>
                </div>
            </li>
            <li id="slide-forgot">
                <div class="slider-content-container-forgot slider-content-shadow-shadow">
                	<div class="sign-in-exit-container"><a href="" class="go_to_slide_exit hideOverlay"><img src="images/close-sign-in-arrow.png"/></a></div>
                	<h3>Forgot Password <span><!-- or <a href="#" class="go_to_slide_c_signup">sign-up</a></span>--></h3>
                    <form action="" name="customerLogin">
                           <input class="myclass" type="text" name="customerEmail" value="email" />
                           <p id="footnote">We will email you your password info.</p>
						   <div class="forgot-btn"></div>
                     </form>
                     
                     <div class="extra-links">
                        <a href="" class="go_to_slide_login">sign in</a>
                        <!--<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href="" class="go_to_slide_c_signup">sign up</a>-->
                    </div>
                </div>
            </li>
        
	</ul>
</span>
<div id="header">

<div class="header-home-link-container"><a href="./index.php"><div class="header-home-link"></div></a></div>
        
</div>

<!-- START show and hide overlay on sign in open close -->
<script type="text/javascript">
$('.showOverlay').click(function() {
    $('#overlay2').show();
});
    
$('.hideOverlay').click(function() {
    $('#overlay2').hide();
});
$('#overlay2').click(function() {
    $('#overlay2').hide();
});
</script>

<script type="text/javascript">
function show() {
    AB = document.getElementById('slider_1');
    AB.style.visibility = 'visible';
}
setTimeout("show()", 1000);


// Login/Register functions

$('#login_main').click(function() {
	$('#login').submit();
});

$('#cReg').click(function() {
	$('#customerReg').submit();
});

$('#mReg').click(function() {
	$('#merchantReg').submit();
});

</script>
</script>
<!-- END show and hide overlay on sign in open close -->
<!--END HEADER & Log-in, Log-out, Register, My Account-->