<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1)" />
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:1.5)" />
<meta name="viewport" content="target-densitydpi=device-dpi" />
<title>Create a Coupon</title>
<style type="text/css">
body, html {
	height: 100%;
	margin: 0px;
	background-image:url(http://www.mymettle.com/couzoo/beta/images/page-bg.jpg);
	background-repeat:repeat;
	font-family:Arial, Helvetica, sans-serif;
}

* {margin:0; padding:0; font:12px Verdana,Arial}
#acc {width:99.8%; list-style:none; color:#603912; margin:0 auto;}
.acc h3 {border:1px solid #f26625; padding:1.65%; padding-bottom:1.75%; font-weight:bold; margin-top:2.2%; cursor:pointer; font-size:3.85em; font-weight:100; letter-spacing:-.03em; background-color:#FFF;}
.acc h3.selected {border-bottom:none; background-color:#f26625; color:#fff;}
.acc .acc-section {overflow:hidden; background:#fff; }
.acc .acc-content {width:99.8%; padding:1%; border:1px solid #f26625; border-top:none; background:#fff; margin-top:-1px; height:auto;}

.acc .acc-content p{font-size:3.2em;}


#nested {width:99.8%; list-style:none; color:#603912; margin:0 auto;}
#nested h3 {border:none; padding:1.65%; padding-bottom:1.75%; font-weight:bold; margin-top:2.2%; cursor:pointer; font-size:3.2em; font-weight:100; letter-spacing:-.03em; background-color:#FFF;}
#nested h3.acc-selected {background-color:#FFF2E6;padding-bottom:1.75%;}
#nested .acc-section {margin-top:-2%; width:99.8%; background-color:transparent;}
#nested .acc-content {width:99.8%; padding-left:4%; border:none; margin-top:0%; overflow:hidden; background-color:#fdf7f2;}

input[type=checkbox] {
	visibility: hidden;
}
.checkboxMobile {
	width: 40px;
	height: 40px;
	background: #CCC;
	margin:4.5% 0;
	border-radius: 25%;
	position: relative;
	-webkit-box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
	box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
}
.checkboxMobile label {
	width: 30px;
	height: 30px;
	border-radius: 25%;
	-webkit-transition: all .5s ease;
	-moz-transition: all .5s ease;
	-o-transition: all .5s ease;
	-ms-transition: all .5s ease;
	transition: all .5s ease;
	cursor: pointer;
	position: absolute;
	top: 5px;
	left: 5px;
	z-index: 1;
	background: #CCC;
	-webkit-box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
	box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
	overflow:visible;
}

.checkboxMobile input[type=checkbox]:checked + label {
	background: #f26625;
}
.checkboxMobile label div {
	margin-left:1.2em;
	margin-top:-.2em;
	font-size:3.2em;
	width:550px;
	}
.step-copy{
	font-size:3.2em;
}
.mark-down-step-container{
	width:100%;
	margin-top:4%;
	background-color:#CCFFFF;
}
.mark-down-type-container{
	margin:2%;
	width:44%;
	float:left;
	background-color:#00FFFF;
}
</style>
</head>
<body>
<div id="advancedCall">
<form id="form1" action="" name="advancedCall">
<ul class="acc" id="acc">
	<li>
		<h3>1. Select Coupon Category</h3>
		<div class="acc-section">
			<div class="acc-content">
            <p>Select the catagory or industry your coupon represents. Select as many as apply.</p>
                <ul class="acc" id="nested">                	
					<li>
						<h3>Food & Drink</h3>
						<div class="acc-section">
							<div class="acc-content">
                            	<div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="restaurant" id="industy-restaurant"><label for="industy-restaurant" class="label"><div>Restaurants</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="bar" id="industy-bar"><label for="industy-bar" class="label"><div style="width:550px;">Bars & Nightlife</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-food-drink" id="industy-all-food-drink"><label for="industy-all-food-drink" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>
					<li>
						<h3>Beauty</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="message" id="industy-message"><label for="industy-message" class="label"><div>Message</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="facial" id="industy-facial"><label for="industy-facial" class="label"><div style="width:550px;">Facial</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="nail-care" id="industy-nail-care"><label for="industy-nail-care" class="label"><div>Nail Care</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="tanning" id="industy-tanning"><label for="industy-tanning" class="label"><div>Tanning</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="hair" id="industy-hair"><label for="industy-hair" class="label"><div style="width:550px;">Hair</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="waxing" id="industy-waxing"><label for="industy-waxing" class="label"><div>Waxing</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="spa" id="industy-spa"><label for="industy-spa" class="label"><div>Spa</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="teeth-whitening" id="industy-teeth-whitening"><label for="industy-teeth-whitening" class="label"><div style="width:550px;">Teeth Whitening</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-beauty" id="industy-all-beauty"><label for="industy-all-beauty" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>
					<li>
						<h3>Fitness</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="yoga-pilates" id="industy-yoga-pilates"><label for="industy-yoga-pilates" class="label"><div>Yoga & Pilates</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="gym" id="industy-gym"><label for="industy-gym" class="label"><div>Gyms</div></label>                                 
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="boot-camp" id="industy-boot-camp"><label for="industy-boot-camp" class="label"><div style="width:550px;">Fitness Boot Camps</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="martial-arts" id="industy-martial-arts"><label for="industy-martial-arts" class="label"><div>Martial Arts</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="fitness-classes" id="industy-fitness-classes"><label for="industy-fitness-classes" class="label"><div>Fitness Classes</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="hair" id="industy-personal-training"><label for="industy-personal-training" class="label"><div style="width:550px;">Personal Training</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-fitness" id="industy-all-fitness"><label for="industy-all-fitness" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>
                    <li>
						<h3>Medical</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="vision-eye-care" id="industy-vision-eye-care"><label for="industy-vision-eye-care" class="label"><div style="width:550px;">Vision & Eye Care</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="dental" id="industy-dental"><label for="industy-dental" class="label"><div>Dental</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="chiropractor" id="industy-chiropractor"><label for="industy-chiropractor" class="label"><div>Chiropractor</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="hair" id="industy-skin-care"><label for="industy-skin-care" class="label"><div style="width:550px;">Skin Care</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-medical" id="industy-all-medical"><label for="industy-all-medical" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>
					<li>
						<h3>Activities</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="vision-museums" id="industy-museums"><label for="industy-museums" class="label"><div style="width:550px;">Museums</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="wine-tasting" id="industy-wine-tasting"><label for="industy-wine-tasting" class="label"><div>Wine Tasting</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="tour" id="industy-tour"><label for="industy-tour" class="label"><div>Tour</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="comedy-clubs" id="industy-comedy-clubs"><label for="industy-comedy-clubs" class="label"><div style="width:550px;">Comedy Clubs</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-shows" id="industy-shows"><label for="industy-shows" class="label"><div>Shows</div></label>                                 
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="wine-life-skill-classes" id="industy-life-skill-classes"><label for="industy-life-skill-classes" class="label"><div>Life Skill Classes</div></label>                                 </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="golf" id="industy-golf"><label for="industy-golf" class="label"><div>Golf</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="comedy-bowling" id="industy-bowling"><label for="industy-bowling" class="label"><div style="width:550px;">Bowling</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="sky-diving" id="industy-sky-diving"><label for="industy-sky-diving" class="label"><div>Sky Diving</div></label>                                 
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="outdoor-adventure" id="industy-outdoor-adventure"><label for="industy-outdoor-adventure" class="label"><div style="width:550px;">Outdoor Adventure</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-activities" id="industy-all-activities"><label for="industy-all-activities" class="label"><div>All</div></label>                                 
                                </div
							></div>
						</div>
					</li>
					<li>
						<h3>Retail & Services</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="vision-home-services" id="industy-home-services"><label for="industy-home-services" class="label"><div style="width:550px;">Home Services</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="clothing" id="industy-clothing"><label for="industy-clothing" class="label"><div>Clothing</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="automotive" id="industy-automotive"><label for="industy-automotive" class="label"><div>Automotive</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="photography" id="industy-photography"><label for="industy-photography" class="label"><div style="width:550px;">Photography</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-retail-services" id="industy-all-retail-services"><label for="industy-all-retail-services" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>
                    <li>
						<h3>Other</h3>
						<div class="acc-section">
							<div class="acc-content">
								<div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="vision-weddings" id="industy-weddings"><label for="industy-weddings" class="label"><div style="width:550px;">Weddings</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="pregnancy" id="industy-pregnancy"><label for="industy-pregnancy" class="label"><div>Pregnancy</div></label>                                 
                                </div>
                                <div class="checkboxMobile">								
                                    <input type="checkbox" name="industry" value="baby" id="industy-baby"><label for="industy-baby" class="label"><div>Babies</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="children" id="industy-children"><label for="industy-children" class="label"><div style="width:550px;">Children</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="gay-lesbian" id="industy-gay-lesbian"><label for="industy-gay-lesbian" class="label"><div style="width:550px;">Gay & Lesbian</div></label>
                                </div>
                                <div class="checkboxMobile">
                                    <input type="checkbox" name="industry" value="all-retail-services" id="industy-all-retail-services"><label for="industy-all-retail-services" class="label"><div>All</div></label>                                 
                                </div>
							</div>
						</div>
					</li>               
				</ul><br clear="all"/> 
			</div>
		</div>
        <br clear="all"/>
	</li>
    <li>
		<h3>2. Set Coupon Sale Value</h3>
		<div class="acc-section">
		   <div class="acc-content">
           <p>What is the retail price and sale price of the produact or service being featured in this coupon?</p>
            
           <div class="mark-down-step-container">
             	
                <span class="step-copy">Display mark down by:</span>
                <br clear="all"/> 
          
               <div class="mark-down-type-container">
                    <input type="radio" value="1" class="required"  id="step1-dollars" name="toggler" style="border:none;"/>
                    <label for="step1-dollars"><span class="step-copy">Dollars off ($)</span></label>
               </div>
               
               <div class="mark-down-type-container">
                    <input type="radio" value="2" class="required"  id="step1-percent" name="toggler" style="border:none;"/>
                    <label for="step1-percent"><span class="step-copy">Percent off (%)</span></label>
               </div>
        	</div>
          
            <br clear="all"/>
            
            <div style="height:auto;">
            
            <!--Start Dollar amount section-->
            <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="blk-1">
            <p class="step-copy">
                <div style="width:260px; float:left; margin-right:20px;">
                    <span class="step-field-title-box">Retail Value: $&nbsp;</span><input type="number" name="retail-price" id="retail-price" class="required apretail" value="" style="width:80px;"/>
                </div>
                
                <div style="width:260px; float:left;">        
                    <span class="step-field-title-box">Price with Coupon: $&nbsp;</span><input type="number" name="sale-price" id="sale-price" class="required apsale"  value="" style="width:80px; margin-left:1px;"/>
                </div>
            </p>
            </div>
            <!--End Dollar amount section-->
            
            <!--Start Percent amount section-->
            <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="blk-2">
                <p class="step-copy">
                    <div style="width:260px; float:left; margin-right:20px;">
                        <span class="step-field-title-box">Percent Off: &nbsp;</span><input type="number" name="percent-off" id="percent-off" class="required appercentoff" value="" style="width:80px;"/>&nbsp;<font color="#603912">%</font>
                    </div>
                    <div style="width:320px; float:left;">        
                        <span class="step-field-title-box">Minimum Purchase: $&nbsp;</span><input type="number" name="minimum-purchase" id="minimum-purchase" class="required apminpurch" value="" style="width:80px; margin-left:1px;"/>
                    </div>
                </p>
            </div>
            <!--End Percent amount section-->        
            
          </div>
          <br clear="all"/>
            
            
			</div>
		</div>
	</li>
	<li>
		<h3>3. Create Coupon Title</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>
    <li>
		<h3>4. Select Coupon Image</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>
    <li>
		<h3>5. Create Coupon Description</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li> 
    <li>
		<h3>6. Set Coupon Sale Dates & Limit</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>
    <li>
		<h3>7. Select Coupon Valid Dates</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>
    <li>
		<h3>8. Create Coupon Restrictions</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>
    <li>
		<h3>9. Create Search Key Words</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li> 
    <li>
		<h3>10. Select Feature Coupon Ad Options</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li> 
    <li>
		<h3>Publish</h3>
		<div class="acc-section">
			<div class="acc-content">
			</div>
		</div>
	</li>     
</ul>
</form>
</div>
<script type="text/javascript" src="http://mymettle.com/couzoo/beta/js/script.js"></script>

<script type="text/javascript">
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","h3",1,-1, 'selected');

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","h3",1,-1,"acc-selected");
</script>

</body>
</html>