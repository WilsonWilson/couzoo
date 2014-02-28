<?php
// include mobile header
include ("m-header.php");
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

<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' /> 

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>


<!--FOR FORM-->
<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.asyncslider.min.js"></script>
<!-- Slide Divs -->
<script type="text/javascript">
	$(window).load(function(){
		// Setup Slider
		$(".my_asyncslider").asyncSlider({
			direction: "horizontal",
			minTime: 1200,
			maxTime: 1200,
			easingIn: 'easeInExpo',
			easingOut: 'easeOutExpo',
			prevNextNav: $(".prev_next_nav_env"),
			keyboardNavigate: false,
			slidesNav: $("#asyncslider_links")
		});
		
		// Link to go to slide 3
		$(".go_to_slide_3").click(function(ev){
			ev.preventDefault();
			$(".my_asyncslider").asyncSlider("moveToSlide", 3);
		})
		
		// Link to go to slide 2
		$(".go_to_slide_2").click(function(ev){
			ev.preventDefault();
			$(".my_asyncslider").asyncSlider("moveToSlide", 2);
		});
		
		// Link to go to slide 1
		$(".go_to_slide_1").click(function(ev){
			ev.preventDefault();
			$(".my_asyncslider").asyncSlider("moveToSlide", 1);
		})
	});
</script>
</head>

<body>

<div class="home-container">
    <div class="home-header">
        <div class="brown-stripe"><img src="m-images/cou.jpg" width="214" height="67" /></div>
        <div class="stripe-break"></div>
        <div class="orange-stripe"><img src="m-images/zoo.jpg" width="214" height="67" /></div>
    </div><!--end home header-->
    
    <div class="home-header-push">
        <div class="brown-stripe2"><img src="m-images/cou.jpg" width="1" height="67" /></div>
        <div class="stripe-break"></div>
        <div class="orange-stripe2"><img src="m-images/zoo.jpg" width="1" height="67" /></div>
    </div>

	<ul class="my_asyncslider slide-slide">
		<li id="slide-01">
        <h1 class="better-way">The better way to<br/>do online deals</h1>
			<div class="m-use-button-contianer">
                <div class="m-use-button">
                   <a href="#" class="go_to_slide_2"> <div class="use-this-coupon">customers</div></a>
                </div>
            </div><!--end use now button container-->
            
            
            <div class="search-coupon-section-container">
                <div class="m-find-button-contianer">
                    <div class="m-find-button">
                       <a href="#" class="go_to_slide_3"> <div class="use-this-coupon">business owners</div></a>
                    </div>
                </div><!--end use now button container-->
            </div><!--end search-coupon-section-container-->
		</li>
        
        <li id="slide-02">
        	<h2 class="m-pre-beta-copy">CouZoo is changing the way local online deals are done.</h2>
            <ul class="m-list">
                <li>No more emails</li>
                <li>No more large upfront payment</li> 
                <li>No more shenanigans</li>
            </ul>
			<p class="m-pre-beta-copy">
				Sign up now and become one of the first to access CouZoo.
            </p>
            
            <div class="m-pre-beta-form-container">
            <div class="m-search-container">
            <div id="m-advancedCall">
                <form class="pre-beta-customer-signup-form" id="preBetaCustomer" method="POST" action="/pre-beta-customer.php">
                    <input class="myclass" type="text" style="text-align:center;" name="preBetaCustomerEmail" id="preBetaCustomerEmail" placeholder="enter your email"/>
                    <div id="preBetaCustomerEmailError" class="red"></div>	
                </form>
            </div>
            </div>
            
            <div class="m-find-button-contianer">
                <div class="m-find-button">
                   <a href="#"> <div class="use-this-coupon submit-customer">sign up now</div></a>
                </div>
            </div><!--end use now button container-->
            </div><!--end search-coupon-section-container-->
		</li>
        
		<li id="slide-03">
        	<h2 class="m-pre-beta-copy">Online deals you can afford to run.</h2>
            <ul class="m-list">
            	<li>We don't keep a cut</li>
            	<li>You paid by your customers</li>
                <li>You have complete control</li> 
            </ul>
			<p class="m-pre-beta-copy">
				Complete the form below to find out more.
            </p>
            
            <div class="m-pre-beta-form-container">
            <div class="m-pre-beta-merch-form-container">
            <div id="m-advancedCall2">
                <form class="pre-beta-merchant-signup-form" id="preBetaMerchant" method="POST" action="/pre-beta-merchant.php">
                  <input class="myclass" type="text" style="text-align:center;" name="preBetaMerchName" id="preBetaMerchName" placeholder="business name" />
                  <div id="preBetaMerchNameError" class="red"></div>
                  <input class="myclass" type="text" style="text-align:center;" name="preBetaMerchContact" id="preBetaMerchContact" placeholder="contact name" />
                  <div id="preBetaMerchContactError" class="red"></div>
                  <input class="myclass" type="text" style="text-align:center;" name="preBetaMerchEmail" id="preBetaMerchEmail" placeholder="email" />
                  <div id="preBetaMerchEmailError" class="red"></div>
                  
                  <div class="merch-form-container" style="margin-left:20px;">
                    <p class="m-pre-beta-in-form-copy">Have you ever used an online deal, daily deal or coupon service (i.e. Groupon, Living Social, Amazon Local, etc.)? </p>
                        <div class="m-info-row-inline">
                            <input type="radio" class="used-before-no radio3" name="preBetaUsedBefore" id="preBetaUsedBeforeN" value="no"/><label style="font-size:3em;" for="preBetaUsedBeforeN"><span>no</span></label>       								
                        </div>    
                        <div class="m-info-row-inline">         
                            <input type="radio" class="used-before-yes radio3" name="preBetaUsedBefore" id="preBetaUsedBeforeY" value="yes"/><label style="font-size:3em;" for="preBetaUsedBeforeY"><span>yes</span> </label>
                        </div>
                            <br clear="all"/>
                    
                    <div class="use-before-yes">
                    
                    <input class="myclass" type="text" name="preBetaCompanyBefore" id="preBetaCompanyBefore" style="width:100%;" placeholder="which company did you use?" />
                
                    <p class="m-pre-beta-in-form-copy">Were you happy with the experience? </p>
                
                    <div class="m-info-row-inline">
                        <input type="radio" class="used-before-happy-no radio4" name="preBetaUsedHappy" id="preBetaUsedHappyN" value="no"/><label style="font-size:3em;" for="preBetaUsedHappyN"><span>no</span></label>
                    </div>    
                
                    <div class="m-info-row-inline">         
                        <input type="radio" class="used-before-happy-yes radio4" name="preBetaUsedHappy" id="preBetaUsedHappyY" value="yes"/><label style="font-size:3em;" for="preBetaUsedHappyY"><span>yes</span> </label>
                    </div>
                
                    <br clear="all"/>
                
                    <div class="pre-beta-merch-comment">
                        <textarea class="prebeta-merch-comment" name="preBetaMerchComments" id="preBetaMerchComments">share your thoughts, comments, or questions</textarea>
                    </div>
                 </div>
                </form>
            </div>
            </div>
            <br clear="all"/>
            
            <div class="m-find-button-contianer">
                <div class="m-find-button">
                   <a href="#"> <div class="use-this-coupon submit-merchant">sign up now</div></a>
                </div>
            </div><!--end use now button container-->
            </div><!--end search-coupon-section-container-->
        </li>
	</ul>

<div class="push-home"></div>
</div><!--End Container-->


<script type="text/javascript">
$(function () {
    $('.used-before-no').click(function () {
        $('.use-before-yes').hide('slow');
		$('.pre-beta-merch-comment').hide('slow');
		$('.slide-slide').css("height","1800px");
		$('#slide-03').css("height","1800px");
    });
    $('.used-before-yes').click(function () {
        $('.use-before-yes').show('slow');
		$('.slide-slide').css("height","2275px");
		$('#slide-03').css("height","2275px");
    });
});
</script>

<script type="text/javascript">
	$('.used-before-happy-yes').click(function(){
		$('.slide-slide').css("height","2850px");
		$('#slide-03').css("height","2800px");
		
	});
	$('.used-before-happy-no').click(function(){
		$('.slide-slide').css("height","2850px");
		$('#slide-03').css("height","2850px");
		
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

<script>
$('.submit-customer').click(function() {
	$('#preBetaCustomer').submit();
});

$('.submit-merchant').click(function() {
	$('#preBetaMerchant').submit();
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

<?php if($_GET['valid'] == true):?>
<script>
     alert("We already have your information. We will keep you notified. Thank you for your continued interest!");
</script>
<?php endif;?>

</body>
</html>
