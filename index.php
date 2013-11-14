<?php
require_once("includes/config.php");
require_once("includes/location.php");

$couzoo->CheckLogin();
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


	<!--Browse view check box, check all function-->
	<script language='JavaScript'>
      //For Food and Drink checkboxes
	  checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
    }

      //For Beauty checkboxes
	  checked = false;
      function checkedAll2 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform2').elements.length; i++) {
	  document.getElementById('myform2').elements[i].checked = checked;
	}
    }
	
	 //For Fitness checkboxes
	  checked = false;
      function checkedAll3 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform3').elements.length; i++) {
	  document.getElementById('myform3').elements[i].checked = checked;
	}
    }
	
	//For Medical checkboxes
	  checked = false;
      function checkedAll4 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform4').elements.length; i++) {
	  document.getElementById('myform4').elements[i].checked = checked;
	}
    }
	
	 //For Activities Checkboxes
	  checked = false;
      function checkedAll5 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform5').elements.length; i++) {
	  document.getElementById('myform5').elements[i].checked = checked;
	}
    }
	
	//For Retail and Services Checkboxes
	  checked = false;
      function checkedAll6 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform6').elements.length; i++) {
	  document.getElementById('myform6').elements[i].checked = checked;
	}
    }
	
	//For Other Checkboxes
	  checked = false;
      function checkedAll7 () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform7').elements.length; i++) {
	  document.getElementById('myform7').elements[i].checked = checked;
	}
    }
    </script>

<!--Range Slider-->
    <link type="text/css" href="css/range-slider/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<script src="js/range-slider/jquery.ui.core.js"></script>
	<script src="js/range-slider/jquery.ui.widget.js"></script>
	<script src="js/range-slider/jquery.ui.mouse.js"></script>
	<script src="js/range-slider/jquery.ui.slider.js"></script>
	<link rel="stylesheet" href="css/range-slider/demos.css">
	<style>
	#demo-frame > div.demo { padding: 10px !important; };
	</style>
	<script>
	$(function() {
		$( "#coupon-price" ).slider({
			range: true,
			min: 1,
			max: 5,
			values: [ 1, 5 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#coupon-price" ).slider( "values", 0 ) +
			" - $" + $( "#coupon-price" ).slider( "values", 1 ) );
			
		$( "#savings-amount" ).slider({
			range: true,
			min: 1,
			max: 100,
			values: [ 1, 100 ],
			slide: function( event, ui ) {
				$( "#amount2" ).val(  ui.values[ 0 ]+"% - "   + ui.values[ 1 ]+ "%" );
			}
		});
		$( "#amount2" ).val(  $( "#savings-amount" ).slider( "values", 0 )+ "% - " +
			 $( "#savings-amount" ).slider( "values", 1 )+"%"  );
	});
	</script>
<!--End Range Slider-->

	<div id="editLocation" style="display: none;">
		<form action="" method="POST">
		<h1>Change Your Location:</h1>
			<input onClick="this.value=''" type="text" name="address" value="Enter Address">
			<input onClick="this.value=''" type="text" name="zip" value="Enter Zip Code">
			<button type="submit" name="location" value="Update">Update</button>
		</form>
	</div>

<!-- END HOME PAGE ADD-ONS -->



<div id="container-home-slide">

<!--<div id="home-top-push"></div>-->
	
<ul class="my_asyncslider" id="slider_2">
		<li id="slide-01" style="height:374px;">
        
           <div id="home-search-container">
           <div id="home-title">Coupons for $1 to $5</div>
           
           <div id="home-search-section">
           <div id="advancedCall">
                <form action="results" name="search" id="homeFilter">
                    <input class="myclass" type="text" name="search" placeholder="Search for coupons near <?=$userLocation?>" /><br />
             </div>
             <div id="home-search-footnote-box">
             <div id="footnote"><strong>example:</strong>  "Sushi  Andersonville" or "Spa  60640" <a style="float: right; padding-right: 25px;" href="#editLocation" class="edit fancybox">change location</a></div>
             </div><!--end home search foot note box-->
             <div id="home-zoo-view-box"><a href="#" class="go_to_slide_zooview">filter view</a></div>
             <div id="home-search-button-box" class="home-search-btn"></div>
	      <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>

             </div><!--END Home Search section-->
          </div><!--End home Search-Container-->
            
          <div id="home-copy-container">
            With CouZoo TEst you can find tons of great, local coupons for only $1 to $5. Or subscribe and get as many as you want for just $10 a month. 
              <br />
              <br />
            It's easy - just search and save. 
<br clear="all"/>
            <div id="home-social-share-box">
                <div id="home-social-share-icon"><a href="http://twitter.com"><img src="images/home-twitter.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="http://facebook.com"><img src="images/home-facebook.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="https://plus.google.com/"><img src="images/home-google-plus.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="mailto:"><img src="images/home-email.png" width="56" height="56" border="0"/></a></div>
            </div>
          </div><!--End home-copy-container-->
           
    	</li>
     
		<li id="slide-02"  style="height:669px;">
        	<div id="home-browse-view-container">      

                <div id="home-browse-column-one">
                	<div id="catagory-title"><h1>Location</h1></div>
                        <div id="advancedCallBrowse">
                                <input class="myclass" type="text" name="" placeholder="enter location here" /><br />
                        </div>
                        <span id="footnote">(zip code / neighborhood / town / city)</span>
                    <br /><br /><br />

                    <div id="catagory-title"><h1>Distance</h1></div>
                    	<br />
                         <div class="browse-dropdown-order">
                         <select name="distance">
                          <option value="">Any Distance</option><br />                        
                          <option value=".5">1/2 mile or less</option><br />
                          <option value="1">1 mile or less</option><br />
                          <option value="3">3 miles or less</option><br />
                          <option value="5">5 miles or less</option><br />
                          <option value="10">10 miles or less</option><br />
                          <option value="20">20 miles or less</option><br />                                                                        
                          <option value="50">50 miles or less</option><br />                        
                        </select>
                        </div>
					<br /><br /><br />
			                    
                    <div id="catagory-title"><h1>Time Left</h1></div>
                   		 <br />
                         <div class="browse-dropdown-order">
                         <select name="time">
                          <option value="">Any Day</option><br />
                          <option value="1">1 Day or less</option><br />
                          <option value="3">3 Days or less</option><br />
                          <option value="5">5 Days or less</option><br />
                          <option value="15">15 Days or less</option><br />
                          <option value="30">30 Days or less</option><br />                                                                        
                        </select>
                        </div>

                    <br /><br /><br />

                    <div id="catagory-title"><h1>Sales Left</h1></div>
                     <br />
                         <div class="browse-dropdown-order">
                         <select name="sales">
                          <option value="">Sales: </option><br />
                          <option value="10">10 or less</option><br />
                          <option value="25">25 or less</option><br />
                          <option value="50">50 or less</option><br />
                          <option value="100">100 or less</option><br />
                          <option value="250">250 Days or less</option><br />                                                                        
                          <option>More than 250</option><br />
                        </select>
                        </div>
                    
                    <br /><br /><br />

                    <div id="catagory-title"><h1>Coupon Price</h1>
                        <p style="line-height:18px; margin-bottom:4px;"><label for="amount"></label>
                        <input type="text" id="amount" style="border:0; color:#f26625; font-weight:bold;" />
                        </p>
                        <div id="coupon-price"></div>
                    </div>
                    
                    <br clear="all"/><br /><br />

                    <div id="catagory-title"><h1>Savings</h1>
                        <p style="line-height:18px; margin-bottom:4px;"><label for="amount2"></label>
                        <input type="text" id="amount2" style="border:0; color:#f26625; font-weight:bold;" />
                        </p>
                        <div id="savings-amount"></div>
                    </div>      
            </div><!--END Column One-->
                <div id="home-browse-column-two">
	               
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll();'><h1>Food & Drink</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="Restauants"/>&nbsp;<label for="Restauants">Restauants</label><br />
                      <input type="checkbox" id="Bar"/>&nbsp;<label for="Bar">Bars & Nightlife</label>
                    </div>
                    
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll2();'><h1>Beauty</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll2();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="Message"/>&nbsp;<label for="Message">Message</label><br />
                      <input type="checkbox" id="Facial"/>&nbsp;<label for="Facial">Facial</label><br />
                      <input type="checkbox" id="NailCare"/>&nbsp;<label for="NailCare">Nail Care</label><br />
                      <input type="checkbox" id="Tanning"/>&nbsp;<label for="Tanning">Tanning</label><br />
                      <input type="checkbox" id="Hair"/>&nbsp;<label for="Hair">Hair</label><br />
                      <input type="checkbox" id="Waxing"/>&nbsp;<label for="Waxing">Waxing</label><br />
			          <input type="checkbox" id="Spa"/>&nbsp;<label for="Spa">Spa</label><br />
                      <input type="checkbox" id="TeethWhitening"/>&nbsp;<label for="TeethWhitening">Teeth Whitening</label>
                    </div>
                    
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll3();'><h1>Fitness</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll3();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="YogaPilates"/>&nbsp;<label for="YogaPilates">Yoga & Pilates</label><br />
                      <input type="checkbox" id="Gym"/>&nbsp;<label for="Gym">Gym</label><br />
                      <input type="checkbox" id="BootCamp"/>&nbsp;<label for="BootCamp">Boot Camp</label><br />
                      <input type="checkbox" id="MartialArts"/>&nbsp;<label for="MartialArts">Martial Arts</label><br />
			          <input type="checkbox" id="Classes"/>&nbsp;<label for="Classes">Classes</label><br />
                      <input type="checkbox" id="PersonalTraining"/>&nbsp;<label for="PersonalTraining">Personal Training</label>
                    </div>
                    
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll4();'><h1>Medical</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll4();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="vision"/>&nbsp;<label for="vision">Vision & Eye Care</label><br />
                      <input type="checkbox" id="Dental"/>&nbsp;<label for="Dental">Dental</label><br />
                      <input type="checkbox" id="Chiropractor"/>&nbsp;<label for="Chiropractor">Chiropractor</label><br />
                      <input type="checkbox" id="Skin"/>&nbsp;<label for="Skin">Skin Care</label>
                    </div>
              
                </div><!--END Column Two-->
                
            
                <div id="home-browse-column-three">
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll5();'><h1>Activities</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll5();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="Museums"/>&nbsp;<label for="Museums">Museums</label><br />
                      <input type="checkbox" id="WineTasting"/>&nbsp;<label for="WineTasting">Wine Tasting</label><br />
                      <input type="checkbox" id="Tours"/>&nbsp;<label for="Tours">Tours</label><br />
                      <input type="checkbox" id="ComedyClubs"/>&nbsp;<label for="ComedyClubs">Comedy Clubs</label><br />
                      <input type="checkbox" id="Shows"/>&nbsp;<label for="Shows">Shows</label><br />
                      <input type="checkbox" id="LifeSkillClasses"/>&nbsp;<label for="LifeSkillClasses">Life Skill Classes</label><br />
                      <input type="checkbox" id="Golf"/>&nbsp;<label for="Golf">Golf</label><br />
                      <input type="checkbox" id="Bowling"/>&nbsp;<label for="Bowling">Bowling</label><br />
                      <input type="checkbox" id="SkyDiving"/>&nbsp;<label for="Sky Diving">SkyDiving</label><br/>                      
                      <input type="checkbox" id="OutdoorAdventure"/>&nbsp;<label for="Outdoor Adventure">Outdoor Adventure</label>
					</div>
                    
                    <div id="catagory-top">
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll6();'><h1>Retail & Services</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll6();'>all</span></div>
                    </div><!--END catagory top-->
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="HomeServices"/>&nbsp;<label for="HomeServices">Home Services</label><br />
                      <input type="checkbox" id="Clothing"/>&nbsp;<label for="Clothing">Clothing</label><br />
                      <input type="checkbox" id="Automotive"/>&nbsp;<label for="Automotive">Automotive</label><br />
                      <input type="checkbox" id="Photography"/>&nbsp;<label for="Photography">Photography</label>
                    </div>
                    
                        <div id="catagory-title">
                        <span class="check-all-title" name='checkall' onclick='checkedAll7();'><h1>Other</h1></span>
                        </div>               
                        <div id="check-all"><span class="check-all-btn" name='checkall' onclick='checkedAll7();'>all</span></div>
                    <br clear="all"/>
                    <div class="catagory-box">
                      <input type="checkbox" id="Wedding"/>&nbsp;<label for="Wedding">Wedding</label><br />
                      <input type="checkbox" id="Wedding"/>&nbsp;<label for="Wedding">Pregnancy</label><br />
                      <input type="checkbox" id="Baby"/>&nbsp;<label for="Baby">Baby</label><br />
                      <input type="checkbox" id="SkChildrenin"/>&nbsp;<label for="Skin">Children</label><br />
                      <input type="checkbox" id="Gay"/>&nbsp;<label for="Gay">Gay</label><br />
                      <input type="checkbox" id="Travel"/>&nbsp;<label for="Travel">Travel</label>
                    </div>	
                    
                    <div class="catagory-box">
                    <input type="checkbox" id="EverythingElse"/>&nbsp;<label for="EverythingElse">Everything Else</label>
                    </div>
                </div><!--END Column Three-->
            
          	<br clear="all"/>
            
            
          
            
            <div id="home-browse-bottom">
            
            <div id="home-zoo-view-box"><a href="#" class="go_to_slide_search">search view</a></div>
            
            <div id="home-social-share-box" style="float:left; width:260px; margin-top:10px;">
                <div id="home-social-share-icon"><a href="http://twitter.com"><img src="images/home-twitter.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="http://facebook.com"><img src="images/home-facebook.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="https://plus.google.com/"><img src="images/home-google-plus.png" width="56" height="56" border="0"/></a></div>
                <div id="home-social-share-icon"><a href="mailto:"><img src="images/home-email.png" width="56" height="56" border="0"/></a></div>
              </div>
            
            <div class="browse-bottom-button-right">            
	            <div id="home-search-button-box" class="home-search-btn"></div>
            </div>
           
            </div><!--END home browse bottom-->
            
            </div>
			
        </li>

 
<div class="push"></div>
               
</ul>

<div class="push"></div>


	
</div><!--end container-home-slide-->

<!--START FOOTER-->
	<?php include "footer.php"; ?>
<!--END FOOTER-->

</body>
</html>


<script type="text/javascript">
$('.home-search-btn').click(function() {
	$('#homeFilter').submit();
});

$('form').submit(function(){
    	$(this).children('input[value=""]').attr('disabled', 'disabled');
    	$('select').children('option[value=""]').attr('disabled', 'disabled');
});
</script>