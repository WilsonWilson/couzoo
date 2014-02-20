<?php
require_once("includes/config.php");
require_once("includes/location.php");

$couzoo->CheckLogin();
?>
<style type="text/css">
.sign-in-nav-container{visibility:hidden !important;}
#footer-column{visibility:hidden !important;}
</style>
<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<div id="container-home-slide">

<div id="home-top-push"></div>
	
<ul class="my_asyncslider" id="slider_2">
		<li id="slide-01" style="height:auto;">
        
           
           <div id="main-column welcome-main-column">
                <div class="welcome-customer-container-head">
                    <h1>A better way to do online deals</h1>
                    <h2>CouZoo is changing the way local online deals are done.</h2>
                    <p>We are making the online deal process easier and more affordable for both customers and merchants. We are making a better site, for a better experience, that's fair for everyone. </p>
                    <div class="form-container">
                    	<div id="advancedCall">
                            <img src="images/shopper.jpg" width="75" height="75" border="0" align="left" style="margin-right:15px;"/>
                            
                                <h2>Customers</h2>
                                <p>Sign up now and become one of the first to access CouZoo.</p>
                             
                            <form class="pre-beta-customer-signup-form" id="preBetaCustomer" method="POST" action="pre-beta-customer.php">
                              <input class="myclass" type="text" name="preBetaCustomerEmail" id="preBetaCustomerEmail" placeholder="email" />
                            	<div class="welcome-signup-nav-container">
                                  <input type="image" src="images/customer-submt.jpg" name="submit" style="width:288px; margin:0px; padding:0px;" value="SEND">
                                </div>
                                <div id="preBetaCustomerEmailError" class="red"></div>
                           	</form>
                          <div class="break-line"></div>
                            <img src="images/roberts-deli.png" width="173" height="113" border="0" align="left" style="margin-top:6px;"/>
                            <div class="merch-copy-container">
                                <a href="#" class="go_to_slide_zooview" style="text-decoration:none;">
                                	<h2>Merchants and Business Owners</h2>
                                     <p>
                                     Are you interested in promoting your business with an online deal service
                                     that's easier to use, gives you more control, and leaves a lot more money in your pocket?<br />
                                     If so, click here to learn more.<br />
                                     <img src="images/if-so-arrow.jpg" class="if-so-arrow"/>
                                     </p>
                                 </a>
                                <div class="welcome-merch-signup-nav-container">
                                    <ul class="welcome-merch-signup-nav">
                                        <li><a href="" class="go_to_slide_zooview">merchant info</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end welcome-customer-container-head-->
            
            <div id="welcome-social-share-box">
                <div id="home-social-share-icon"><a href="http://twitter.com"><img src="images/home-twitter.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="http://facebook.com"><img src="images/home-facebook.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="https://plus.google.com/"><img src="images/home-google-plus.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="mailto:"><img src="images/home-email.png" width="56" height="56" border="0"/></a></div>
            </div>
          </div><!--END MAIN-COLUMN-->
           
    	</li>
     
		<li id="slide-02" style="min-height:620px; height:auto;">
            <div id="welcome-merch-view-container">
             <div id="main-column welcome-main-column">
                <div class="welcome-customer-container-head">
                    <h1>Online deals you can afford to run</h1>
                    <h2>With CouZoo run online deals without giving up a cut of your sales.</h2>
                    <p>You're already taking a big hit by offering customers a great deal, why should you pay more on top of that? With CouZoo you can post online deals and recieve the full payment from the customer, at the point of purchase. For more information about CouZoo or to become a merchant on CouZoo please fill out the simple form below</p>
                    <div class="form-container">
                    	<div id="advancedCallBrowse">
                            <form class="pre-beta-merchant-signup-form" id="preBetaMerchant" method="POST" action="pre-beta-merchant.php">
                             <div class="merch-form-container">
                                  <input class="myclass" type="text" name="preBetaMerchName" id="preBetaMerchName" placeholder="business name" />
                                  <div id="preBetaMerchNameError" class="red"></div>
                                  <input class="myclass" type="text" name="preBetaMerchContact" id="preBetaMerchContact" placeholder="contact name" />
                                  <div id="preBetaMerchContactError" class="red"></div>
                                  <input class="myclass" type="text" name="preBetaMerchEmail" id="preBetaMerchEmail" placeholder="email" />
                                  <div id="preBetaMerchEmailError" class="red"></div>
                              </div><!--end merch-form-container-->
                              <div class="merch-form-container" style="margin-left:20px;">
                              	<p>Have you ever used an online deal, daily deal or coupon service (i.e. Groupon, Living Social, Amazon Local, etc.)? </p>
                                    <div class="info-row">
                                        <input type="radio" class="radio1 used-before-no" name="preBetaUsedBefore" id="preBetaUsedBeforeN" value="no"/><label for="preBetaUsedBeforeN"><span>no</span></label>       								</div>    
                                    <div class="info-row">         
                                        <input type="radio" class="radio1 used-before-yes" name="preBetaUsedBefore" id="preBetaUsedBeforeY" value="yes"/><label for="preBetaUsedBeforeY"><span>yes</span> </label>
                                    </div>
                                    <br clear="all"/>
                                 <div class="use-before-yes">
                                 	<input class="myclass" type="text" name="preBetaCompanyBefore" id="preBetaCompanyBefore" placeholder="which company did you use?" />
                                 	<p>Were you happy with the experience? </p>
                                    <div class="info-row">
                                        <input type="radio" class="radio1 used-before-happy-no" name="preBetaUsedHappy" id="preBetaUsedHappyN" value="no"/><label for="preBetaUsedHappyN"><span>no</span></label>
                                    </div>    
                                    <div class="info-row">         
                                        <input type="radio" class="radio1 used-before-happy-yes" name="preBetaUsedHappy" id="preBetaUsedHappyY" value="yes"/><label for="preBetaUsedHappyY"><span>yes</span> </label>
                                    </div>
                                    <br clear="all"/>
                                    <div class="pre-beta-merch-comment">
                                    	<textarea class="prebeta-merch-comment" name="preBetaMerchComments" id="preBetaMerchComments">share your thoughts, comments, or questions</textarea>
                                    </div>
                                 </div>
                                
                              </div><!--end merch-form-container--><br clear="all"/>
                               
                               <div class="break-line"></div>
                               
                               <div id="home-zoo-view-box"><a href="#" class="go_to_slide_search">Customer info</a></div>
                               
                               <div class="welcome-signup-nav-container">
                                  <input type="image" src="images/merchant-submt.jpg" name="submit" style="width:288px; margin:0px; padding:0px;" value="SEND">
                                </div>
                           	</form>
                          
                        </div>
                    </div>
                </div><!--end welcome-customer-container-head-->
            
                <div id="welcome-social-share-box">
                    <div id="home-social-share-icon"><a href="http://twitter.com"><img src="images/home-twitter.png" width="56" height="56" border="0"/></a></div>
                    <div id="home-social-share-icon"><a href="http://facebook.com"><img src="images/home-facebook.png" width="56" height="56" border="0"/></a></div>
                    <div id="home-social-share-icon"><a href="https://plus.google.com/"><img src="images/home-google-plus.png" width="56" height="56" border="0"/></a></div>
                    <div id="home-social-share-icon"><a href="mailto:"><img src="images/home-email.png" width="56" height="56" border="0"/></a></div>
                </div>
              </div><!--END MAIN-COLUMN-->
			</div>
            
        </li>

 
<div class="push"></div>
               
</ul>

<div class="push"></div>


	
</div><!--end container-home-slide-->

<!--START FOOTER-->
	<?php include "footer.php"; ?>
<!--END FOOTER-->

<script type="text/javascript">
$(function () {
    $('.used-before-no').click(function () {
        $('.use-before-yes').hide('slow');
    });
    $('.used-before-yes').click(function () {
        $('.use-before-yes').show('slow');
    });
});
</script>

<script type="text/javascript">
	$('.used-before-happy-yes').click(function(){
		$('#slider_2').css("height","750px");
		$('#slide-02').css("height","750px");
		
	});
	$('.used-before-happy-no').click(function(){
		$('#slider_2').css("height","750px");
		$('#slide-02').css("height","750px");
		
	});
</script>

<script type="text/javascript">
$(function () {
    $('.used-before-happy-no').click(function () {
        $('.pre-beta-merch-comment').show('slow');
    });
    $('.used-before-happy-yes').click(function () {
        $('.pre-beta-merch-comment').show('slow');
    });
});
</script>

<script type="text/javascript">
$('.home-search-btn').click(function() {
	$('#homeFilter').submit();
});

$('form').submit(function(){
    	$(this).children('input[value=""]').attr('disabled', 'disabled');
    	$('select').children('option[value=""]').attr('disabled', 'disabled');
});
</script>


<!--Validation for Forms-->
<script type="text/javascript">
	window.onload = init;
	
	function init() {
	   // Attach "onsubmit" handler
	   document.getElementById("preBetaCustomer").onsubmit = validateForm;
	   document.getElementById("preBetaMerchant").onsubmit = validateForm2;
	}
	
	function validateForm() {
	return (isValidEmail("preBetaCustomerEmail", "Please enter a valid email")
		);
	}
	
	function validateForm2() {
		return (isNotEmpty("preBetaMerchName", "Please enter your business name")
		&& isNotEmpty("preBetaMerchContact", "Please enter a person to contact")
		&& isValidEmail("preBetaMerchEmail", "Please enter a valid email")
		);
	}
	
	function isNotEmpty(inputId, errorMsg) {
	   var inputElement = document.getElementById(inputId);
	   var errorElement = document.getElementById(inputId + "Error");
	   var inputValue = inputElement.value.trim();
	   var isValid = (inputValue.length != 0);  // boolean
	   showMessage(isValid, inputElement, errorMsg, errorElement);
	   return isValid;
	}
	 
	function showMessage(isValid, inputElement, errorMsg, errorElement) {
	   if (!isValid) {
		  // Put up error message on errorElement or via alert()
		  if (errorElement != null) {
			 errorElement.innerHTML = errorMsg;
		  } else {
			 alert(errorMsg);
		  }
		  // Change "class" of inputElement, so that CSS displays differently
		  if (inputElement != null) {
			 inputElement.className = "error";
			 inputElement.focus();
		  }
	   } else {
		  // Reset to normal display
		  if (errorElement != null) {
			 errorElement.innerHTML = "";
		  }
		  if (inputElement != null) {
			 inputElement.className = "";
		  }
	   }
	}
	 
	function isValidEmail(inputId, errorMsg) {
	   var inputElement = document.getElementById(inputId);
	   var errorElement = document.getElementById(inputId + "Error");
	   var inputValue = inputElement.value;
	   var atPos = inputValue.indexOf("@");
	   var dotPos = inputValue.lastIndexOf(".");
	   var isValid = (atPos > 0) && (dotPos > atPos + 1) && (inputValue.length > dotPos + 2);
	   showMessage(isValid, inputElement, errorMsg, errorElement);
	   return isValid;
	}
	
	// The "onclick" handler for the "reset" button to clear the display
	function clearDisplay() {
	   var elms = document.getElementsByTagName("*");  // all tags
	   for (var i = 0; i < elms.length; i++) {
		  if ((elms[i].id).match(/Error$/)) {  // no endsWith() in JS?
			 elms[i].innerHTML = "";
		  }
		  if (elms[i].className == "error") {  // assume only one class
			 elms[i].className = "";
		  }
	   }
	   // Set initial focus
	   document.getElementById("name").focus();
	}

</script>

</body>
</html>