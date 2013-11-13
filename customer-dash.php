<?php
require_once("includes/config.php");
require_once("includes/location.php");

$redirect = $couzoo->CheckLoginDash("customer-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("login.php");
    	exit;
}
elseif($redirect === "merchant")
{
    	$couzoo->RedirectToURL("merchant-dash.php");
    	exit;
}
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START CUST DASH PAGE ADD-ONS -->

	<link rel="stylesheet" href="css/user-dash.css" type="text/css"/>

        <!--[if IE 9]>
		<style type="text/css">
		#le-tabs.oldlook #le-tabs_tab_container a.X-tab{background-image:url(images/X-tab.png); background-repeat:no-repeat; color:#603912; margin:0px 1px 0px 1px;}
        #merch-dash-header-container #le-tabs.oldlook #le-tabs_tab_container a.tab-2{width:180px; height:52px; padding-top:8px; margin:0px; background-color:#fff;border:#603912 3px solid; -moz-border-radius: 12px; border-radius: 12px; margin:0px 1px 0px 0px; text-align:center; color:#603912;}
        </style>
		<![endif]-->
        
        <!--[if lte IE 8]>
		<link rel="stylesheet" href="css/ie9-or-less.css" type="text/css" />
		<![endif]-->
        
    <!-- CSS changes for if Mac OS (mainly in tabbed slider navigation)-->    
    <script type="text/javascript" src="js/if-mac.js"></script>        
        
 <!--For Create a Calendar-->
    <script type="text/javascript" src="calendar/js/jquery-ui-1.7.3.custom.min.js"></script>
    <script type="text/javascript" src="calendar/js/hover.js"></script>          
        
        
<!--Form Slider-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.4.3.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<!--For div content changer box -->
	<script type="text/javascript" src="js/box/jquery-1.7.min.js"></script>
<!--END div content changer box -->
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    <script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/LXP.js"></script>
    <script type="text/javascript" src="js/browser-select.js"></script> 


<!--Expand and collapse div-->  
    <script type="text/javascript" src="js/expander.js"></script> 
        
     <!--For Create a coupon-->


<!--[if IE]>
<style type='text/css'>
* html .myButton { display:inline; }  /* hack per IE 6 */
* + html .myButton { display:inline; }  /* hack per IE 7 */
</style>
<![endif]-->	



    
    <!--Form Highlighter plugin-->
    <script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    
    <!--Demo examples-->
    <script type="text/javascript">
        $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 1.0);
            }
            function demoFocus(element) {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 0.5);
            }
        }); 
    </script>
    

    
    <!--End create a coupon-->

	<!-- Add fancyBox main JS and CSS files -->
	<?php include ("fancybox.html"); ?>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.0.6" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});
			
		});
	</script>
       
       	<!--Start radio button show hide divs-->
	<script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=toggler]").click(function() {
                $('.toHide').hide();
                $("#blk-" + $(this).val()).show('slow');
				$("#blk-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script> 
   
  
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

<!--START OPEN and CLOSE ALL SIDE BUTTON-->
	<?php include ("open-close-all-tab.html"); ?>
<!--END OPEN and CLOSE ALL SIDE BUTTON-->


<!-- END CUST DASH PAGE ADD-ONS -->


<div id="container">

<div id="page-top-push"></div>

<div id="main-column">

<?php
//Get User Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = "SELECT * FROM CouZoo_Members WHERE id_user = '$id_user'";
$result = mysql_query($qry);
$row = mysql_fetch_assoc($result);

	$fname = $row['fname'];
	$lname = $row['lname'];
	$name = $fname ."&nbsp;". $lname;
	$email = $row['email'];
	$phone = $row['phone'];
	$pur_coup = $row['purchased_coupons'];

	$usedNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_My_Coupons WHERE id_user = '$id_user' AND status = '1'"));
	$watchingNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user'"));
?>

<!--Start Merchant Header-->
<div id="merch-dash-header-container">
<div id="merch-dash-header">

			<div id="editProf" style="display: none;">
			<form id="editProfile_c" action="" method="POST">
			<h2>Edit Profile</h2>
				<input type="hidden" value="<?=$id_user?>" id="id_user" name="id_user">
			<ul>
				<li><label>First Name:</label> <input type="text" id="fname" name="firstName" value="<?=$fname?>"></li>
				<li><label>Last Name:</label> <input type="text" id="lname" name="lname" value="<?=$lname?>"></li>
				<li><label>E-mail:</label> <input type="text" id="email" name="email" value="<?=$email?>"></li>
				<li><label>Phone:</label> <input type="text" id="phone" name="phone" value="<?=$phone?>"></li>
			<h2>Change Password</h2>
				<li><label>Current Password:</label> <input type="password" id="old_password" name="old_password" value="<?=$old_pass?>"></li><br>
				<li><label>New <br> Password:</label> <input type="password" id="new_password" name="new_password" value="<?=$new_pass?>"></li><br>
				<li><label>Confirm New <br> Password:</label> <input type="password" id="new_password_confirm" name="new_password_confirm" value="<?=$new_pass_confirm?>"></li><br>
			</ul>
			<button type="submit">Update</button> <span id="editStatus" class="editStatus"></span>
			</form>
                    	</div>

<h1><?=$name;?></h1>
<a href="#editProf" class="edit fancybox">edit</a>

<div id="row-box">

<div class="column-box">
<?=$phone?><br />
<a href=""><?=$email?></a>
</div><!--END column-box-->

<div class="column-box">
<span id="stat-name">user name:</span> <?=$email?><br />
<span id="stat-name">password:</span> *********<br /><br />

</div><!--END column-box-->

<div class="column-box column-box-last">
<span id="stat-name">Coupons Purchased:</span> <?=$pur_coup?><br />
<span id="stat-name">Coupons Used:</span> <?=$usedNum?><br />
<span id="stat-name">Coupons Watching:</span> <?=$watchingNum?><br />

</div><!--END column-box-->


</div><!--END row-box-->


<div id="row-box-last">

<h2>Billing Info
<span class="toggler" id="toggler-slideOne">
	<span class="expandSlider"><img src="images/div-open.jpg" width="14" height="14" /></span><span class="collapseSlider"><img src="images/div-close.jpg" width="14" height="14" /></span>
</span>
</h2>

<div class="slider" id="slideOne">

<!--<p class="step-copy" style="margin:0px 0px 10px 0px">You are subscribed to unlimited coupons. 
Would you like to auto-renew each month?&nbsp;&nbsp;&nbsp;
<form>
<input type="radio" name="customer-subscribe-auto-renew" value="yes" CHECKED  />yes  &nbsp;&nbsp;&nbsp;
<input type="radio" name="customer-subscribe-auto-renew" value="no" />no
</form>
</p>-->

<br clear="all"/>

<?php
       $qry = mysql_query("SELECT * FROM CouZoo_Cards WHERE payer_id = '$id_user'");
	$total_cc = mysql_num_rows($qry);
	if ($total_cc) {
?>
               <div id="cart-check-out-table-header" class="card-headers">
		     <div class="card-name">Saved Cards</div>
                   <div class="card-type">Card Type</div>
                   <div class="card-number">Card Number</div>
               </div><!--end table header-->
<?php
	} while ($cc = mysql_fetch_array($qry)) {
		if ($cc['type'] == 'amex') { $cc_type = "American Express"; } else { $cc_type = ucfirst($cc['type']); }
?>
               <div id="cart-check-out-table-row" class="<?=$cc['id']?>">
		     <input type="radio" id="cc_id" name="cc_id" value="<?=$cc['id']?>">
                   <div class="card-name"><?=$cc['fname']?> <?=$cc['lname']?></div>
                   <div class="card-type"><?=$cc_type?></div>
                   <div class="card-number"><?=$cc['number']?></div>
		     <div id="<?=$cc['id']?>" class="card-delete"><img src="/images/red-x.png" width="15"></img></div>
               </div><!--end table header-->

<?php } if (!$total_cc) { ?> 
               <div id="cart-check-out-table-row">
                   <div class="radio-button"><a href="#add-card" class="fancybox change" >add a credit card</a></div>
               </div>
<?php } else { ?>  
               <div id="cart-check-out-table-row">
                   <div class="radio-button"><a href="#add-card" class="fancybox change" >add another credit card</a></div>
               </div>
<?php } ?>

</div> <!--END expanding section-->

</div><!--END row-box-->

</div><!--END merch-dash-header -->


<!--START LXP -->
<div id="le-tabs" class="example3 oldlook animSpeed-200 direction-horizontal  autoOrder-false autoplayInterval-0">
			
<div id="le-tabs_tab_container">
				<a href="#content-1" id="first_tab" class="tab-1x4 box-trigger tab_recommended" data-activates="defualt">recommended</a>
				<a href="#content-2" class="tab-2x4 box-trigger tab_unused" data-activates="first">my coupons</a>
                		<a href="#content-3" class="tab-3x4 box-trigger tab_pref"  data-activates="empty">my preferences</a>
				<a href="#content-4" class="tab-4x4 box-trigger"  data-activates="empty">give feedback</a>
                
			</div>
			
			<div id="le-tabs_content_container">
				<div id="le-tabs_content_inner">

					<div id="content-1" class="le-tabs_content">
					<div id="tab-1-top-x4"></div>
                        <div>
                    	  <h2 class="recommended-header">Below are coupons we think you may like.</h2>                    
                        </div>
                   </div>



					<div id="content-2" class="le-tabs_content">
   						<div id="tab-2-top-x4"></div>
						
   						<div id="box-instructions">
                            
                            <a href="javascript:void(0);" class="recommended-coupon-btn box-trigger tab_recommended" data-activates="defualt"></a>
                            <a href="javascript:void(0);" class="unused-coupon-btn box-trigger tab_unused" data-activates="first"></a>
                            <a href="javascript:void(0);" class="watching-coupon-btn box-trigger tab_watching" data-activates="second"></a>
                            <a href="javascript:void(0);" class="redeemed-coupon-btn box-trigger tab_redeemed" data-activates="third"></a>
                            <br clear="all"/>
                          
                          <div id="box2">
                            <div class="changeable defualt"></div>
                            <div class="changeable first"></div>
                            <div class="changeable second"></div>
                            <div class="changeable third"></div>
                          </div>
                        </div>

                    </div><!--ED tab 2 content-->

<!-- Not used -- attempt for dynamic coupons for each section

<script>
$('.tab_recommended').click(function() {
    //alert('rec');
});
$('.tab_unused').click(function() {
    $.ajax({
        type: "POST",
        url: "update_get.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', type: 'Unused' },
        beforeSend: function(){
            alert('works');
        },
        success: function(data){
		$.each(data.items, function(i, item) {
    		   $('#accuu').append(data.items[i]);
		});
        },
        error: function(data){
            $('#test').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
$('.tab_watching').click(function() {
    alert('watch');
});
$('.tab_redeemed').click(function() {
    alert('redeemed');
});
$('.tab_pref').click(function() {
    alert('pref');
});
</script>

-->
                    
                    
                    <div id="content-3" class="le-tabs_content">
                    	<div id="tab-3-top-x4"></div>
                        <!--Start Preferences CONTENT-->

						<div style="margin:5px 15px 25px 15px;">
                        <span class="step-copy">Please select what best fits the coupon you are most interested in to better help us recommend coupons for you under the "<font style="color:#f26625; font-size:16px;">recommended</font>" tab above.<br />
 Thanks,<br />
 CouZoo.</span>
                        </div>
                        <br clear="all"/>

                        <div id="customer-pref-container">
                           
                            <div id="customer-pref-column-one">
                                    <div id="catagory-title"><h1>Location</h1></div>
                            
                            
                           <div id="advancedCallBrowse">
                               <form action="" name="homeSearch">
                                <input class="myclass" type="text" name="brownseSearch" value="enter location here" /><br />
                               </form>
                    </div>
                                      
                                <span id="footnote">(zip code / neighborhood / town / city)</span>
                            <br /><br /><br />
        
                            <div id="catagory-title"><h1>Distance</h1></div>
                                <br />
                                 <div class="browse-dropdown-order">
                                 <select>
                                  <option>1/2 mile or less</option><br />
                                  <option>1 mile or less</option><br />
                                  <option>3 miles or less</option><br />
                                  <option>5 miles or less</option><br />
                                  <option>10 miles or less</option><br />
                                  <option>20 miles or less</option><br />                                                                        
                                  <option>50 miles or less</option><br />                        
                                  <option>Any Distance</option><br />                        
                                </select>
                                </div>
                            <br /><br /><br />
                                        
                            <div id="catagory-title"><h1>Time Left</h1></div>
                                 <br />
                                 <div class="browse-dropdown-order">
                                 <select>
                                  <option>1 Day or less</option><br />
                                  <option>3 Days or less</option><br />
                                  <option>5 Days or less</option><br />
                                  <option>15 Days or less</option><br />
                                  <option>30 Days or less</option><br />                                                                        
                                  <option>More than 30 days</option><br />
                                </select>
                                </div>
        
                            <br /><br /><br />
        
                            <div id="catagory-title"><h1>Sales Left</h1></div>
                             <br />
                                 <div class="browse-dropdown-order">
                                 <select>
                                  <option>10 or less</option><br />
                                  <option>25 or less</option><br />
                                  <option>50 or less</option><br />
                                  <option>100 or less</option><br />
                                  <option>250 Days or less</option><br />                                                                        
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
                    
                    
                            <div id="customer-pref-column-two">
                                    <form id="myform">
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
                            </form>
                            
                            
                            <form id="myform2">
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
                            </form>
                            
                            
                            
                            <form id="myform3">
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
                            </form>
                            
                            
                            
                            <form id="myform4">
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
                            </form>                    
                            </div><!--END Column Two-->
                        
                            <div id="customer-pref-column-three">
                             <form id="myform5">
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
                             </form>
                            
                             <form id="myform6">
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
                            </form>
                            
                             <form id="myform7">             
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
                            </form>
                            
                             <form id="myform8">
                                <div class="catagory-box">
                                <input type="checkbox" id="EverythingElse"/>&nbsp;<label for="EverythingElse">Everything Else</label>
                                </div>
                             </form>
                            </div><!--END Column Three-->
                 <br clear="all"/> 
						</div><!--END customer-pref-container-->
                        <br clear="all"/>                        
                       <!--END Preferences Content-->
               </div> 
                    
           
           
           			<div id="content-4" class="le-tabs_content">
   						<div id="tab-4-top-x4"></div>
                        <!--START Feedback-->
                        <div style="margin:5px 15px 25px 15px;">
                        <span class="step-copy">Please tell us what's on your mind. We'd love to hear what you think of our business, website, a coupon you bought or a place where you used a coupon. Got a great idea to improve our site, please tell us. We want to be better. Thanks.</span>
                        </div>
                        <br clear="all"/>

                        <div style="margin:15px;"><div style="float:left; margin-right:5px"><input type="radio" value="1" class="required"  id="feedback-1" name="prepurchase" /></div> <div><label for="feedback-1"><span class="step-copy">About a coupon I used and/or business I used it with.</span></label></div></div>
                        <br clear="all"/>
                        <div style="margin:15px;"><div style="float:left; margin-right:5px"><input type="radio" value="1" class="required"  id="feedback-2" name="prepurchase" /></div> <div><label for="feedback-2"><span class="step-copy">The CouZoo website</span></label></div></div>
                        <br clear="all"/>
                        <div style="margin:15px;"><div style="float:left; margin-right:5px"><input type="radio" value="1" class="required"  id="feedback-3" name="prepurchase" /></div> <div><label for="feedback-3"><span class="step-copy">The CouZoo business</span></label></div></div>
                        <br clear="all"/>
                        <div style="margin:15px;"><div style="float:left; margin-right:5px"><input type="radio" value="1" class="required"  id="feedback-4" name="prepurchase" /></div> <div><label for="feedback-4"><span class="step-copy">Other Questions or feedback</span></label></div></div>
                        <br clear="all"/>
                                                
                        <div style="margin:10px;">
                        
                         <div id="advancedCall">
						   <form style="" id="form1" action="" name="advancedCall">
                        	<textarea cols="94" rows="9" value="Enter your feedback here"></textarea>
                           </form>
                         </div>
                         
                        <div style="margin:4px 1px;" class="submit-btn"></div>
                        
                        <div style="float:right; margin:-26px 26px 0px 0px;"><a href="mailto:feedback@couzoo.com">feedback@couzoo.com</a></div>
                        
                      </div>
				</div>
			</div>
          </div>
          </div>
          
</div><!--END customer-dash-container-->   
      
<br clear="all"/>

<div id="box" >
    
    <div class="changeable defualt" >
      <ul class="acc" id="acc">
        <?php include "pod-example-2-dollar.html" ?>
      </ul>
	</div>

    <div class="changeable first" >
    	<div id="header-bg" class="header-live"><h2>Below are all coupons you have purchased but not yet used.</h2></div>
      <ul class="acc" id="accuu">
<?php
$qry = mysql_query("SELECT *, $sqlDist AS distance, coup.description AS coupon_desc, DATEDIFF(removal_date, now()) AS days FROM CouZoo_Coupons AS coup 
					LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
					LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
					WHERE my.id_user = '$id_user' AND my.status = '0' LIMIT 1");
//$qry = mysql_query("SELECT * FROM CouZoo_Coupons AS coup LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) WHERE my.id_user = '$id_user'");
while ($res = mysql_fetch_array($qry)) {

	// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
	$id_coupon = $res['id_coupon'];
	$title = $res['title'];
	$price = $res['price'];
	$posting_date = $res['posting_date'];
	$removal_date = $res['removal_date'];
	$max_purchases = $res['max_purchases'];
	$max_purchases_num = $res['max_purchases_num'];
	$valid_date = $res['valid_date'];
	$exp_date = $res['exp_date'];
	$restrictions = $res['restrictions'];
	$description = $res['coupon_desc'];
	$couponLat = $res['latitude'];
	$couponLong = $res['longitude'];

	$distance = round($res['distance'], 2);
	$unit = "miles";

	// Grab the datbase data and outputs the information on the page - Grab the company info next
	$phone = $res['phone'];
	$website = $res['website'];
	$address = $res['address'];
	$city = $res['city'];
	$state = $res['state'];
	$zip = $res['zip'];
	$link = $res['link'];

	$purchased = true;
	include ("coupon.php");
}
?>

      </ul>
	</div>

<!-- Not used -- attempt for dynamic coupons for each section

<script type="text/javascript">
$('.markUsed').click(function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Mark Used' },
        beforeSend: function(){
            $('#usedStatus_' + cid).fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#usedStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
        },
        error: function(data){
            $('#usedStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>

-->

<!-- Start Watching Coupons -->
	<?php include ("coupons-watching.php") ?>
<!-- End Watching Coupons -->

    <div class="changeable third">
        <div id="header-bg" class="header-saved"><h2>Below are all coupons you have purchased and used.</h2></div>
      <ul class="acc" id="accu">
<?php
$qry = mysql_query("SELECT *, $sqlDist AS distance, coup.description AS coupon_desc, DATEDIFF(removal_date, now()) AS days FROM CouZoo_Coupons AS coup 
					LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
					LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) 
					WHERE my.id_user = '$id_user' AND my.status = '1'");
//$qry = mysql_query("SELECT * FROM CouZoo_Coupons AS coup LEFT JOIN CouZoo_My_Coupons AS my ON (coup.id_coupon = my.id_coupon) WHERE my.id_user = '$id_user'");
while ($res = mysql_fetch_array($qry)) {

	// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
	$id_coupon = $res['id_coupon'];
	$title = $res['title'];
	$price = $res['price'];
	$posting_date = $res['posting_date'];
	$removal_date = $res['removal_date'];
	$max_purchases = $res['max_purchases'];
	$max_purchases_num = $res['max_purchases_num'];
	$valid_date = $res['valid_date'];
	$exp_date = $res['exp_date'];
	$restrictions = $res['restrictions'];
	$description = $res['coupon_desc'];
	$couponLat = $res['latitude'];
	$couponLong = $res['longitude'];

	$distance = round($res['distance'], 2);
	$unit = "miles";

	// Grab the datbase data and outputs the information on the page - Grab the company info next
	$phone = $res['phone'];
	$website = $res['website'];
	$address = $res['address'];
	$city = $res['city'];
	$state = $res['state'];
	$zip = $res['zip'];
	$link = $res['link'];

	$used = true;
	include ("coupon.php");
}
?>
      </ul>
    </div>


</div>



</div><!--END MAIN-COLUMN-->




<div id="side-column"><!--start right side column-->

</div><!--END right side column-->
<div class="push-box"></div>
<div class="push"></div>
</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include "footer.php"; ?>
<!--END FOOTER-->

<!--For Accordion coupons pods-->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript"><!--normal, for live section-->
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc", "h3", 0,-1, 'selected');

var unusedAccordion=new TINY.accordion.slider("unusedAccordion");
unusedAccordion.init("accuu", "h3", 0,-1, 'selected');

var expiredAccordion=new TINY.accordion.slider("expiredAccordion");
expiredAccordion.init("accw", "h3", 0,-1, 'selected');

var savedAccordion=new TINY.accordion.slider("savedAccordion");
savedAccordion.init("accu", "h3", 0,-1, 'selected');
</script>

<!--End Accordion coupons pods-->


	<div id="add-card" style="display: none;">
		<form id="add-new-card" action="" method="post">
		<input type="hidden" name="checkout" value="true">
		<input type="hidden" name="coupon_ids" value="<?=$coupon_ids?>">
		<input type="hidden" name="total" value="<?=$tPrice?>">
		<input type="hidden" name="payer_id" value="<?=$id_user?>">

			<h2>Add a New Credit Card</h2>
			
			<ul>
				<li><label>Cardholder's First Name:</label> <input type="text" id="fname" name="new_cc[fname]"></li>
				<li><label>Cardholder's Last Name:</label> <input type="text" id="lname" name="new_cc[lname]"></li>
				<li><label>Card Type:</label>
					<select id="type" name="new_cc[type]"> 
						<option value="visa">Visa</option>
						<option value="mastercard">Mastercard</option>
						<option value="amex">American Express</option>
						<option value="discover">Discover</option>
					</select>
				</li>
				<li><label>Card Number:</label> <input type="text" id="number" name="new_cc[number]"></li>
				<li><label>Expiration Month:</label>
					<select id="exp_month" name="new_cc[exp_month]"> 
						<option value="01" <?=$cur_mon == 1 ? "SELECTED" : "";?> >01</option>
						<option value="02" <?=$cur_mon == 2 ? "SELECTED" : "";?> >02</option>
						<option value="03" <?=$cur_mon == 3 ? "SELECTED" : "";?> >03</option>
						<option value="04" <?=$cur_mon == 4 ? "SELECTED" : "";?> >04</option>
						<option value="05" <?=$cur_mon == 5 ? "SELECTED" : "";?> >05</option>
						<option value="06" <?=$cur_mon == 6 ? "SELECTED" : "";?> >06</option>
						<option value="07" <?=$cur_mon == 7 ? "SELECTED" : "";?> >07</option>
						<option value="08" <?=$cur_mon == 8 ? "SELECTED" : "";?> >08</option>
						<option value="09" <?=$cur_mon == 9 ? "SELECTED" : "";?> >09</option>
						<option value="10" <?=$cur_mon == 10 ? "SELECTED" : "";?> >10</option>
						<option value="11" <?=$cur_mon == 11 ? "SELECTED" : "";?> >11</option>
						<option value="12" <?=$cur_mon == 12 ? "SELECTED" : "";?> >12</option>
					</select>
				</li>
				<li><label>Expiration Year:</label>
					<select id="exp_year" name="new_cc[exp_year]"> 
						<option value="2013" <?=$cur_year == 2013 ? "SELECTED" : "";?> >2013</option>
						<option value="2014" <?=$cur_year == 2014 ? "SELECTED" : "";?> >2014</option>
						<option value="2015" <?=$cur_year == 2015 ? "SELECTED" : "";?> >2015</option>
						<option value="2016" <?=$cur_year == 2016 ? "SELECTED" : "";?> >2016</option>
						<option value="2017" <?=$cur_year == 2017 ? "SELECTED" : "";?> >2017</option>
						<option value="2018" <?=$cur_year == 2018 ? "SELECTED" : "";?> >2018</option>
						<option value="2019" <?=$cur_year == 2019 ? "SELECTED" : "";?> >2019</option>
						<option value="2020" <?=$cur_year == 2020 ? "SELECTED" : "";?> >2020</option>
						<option value="2021" <?=$cur_year == 2021 ? "SELECTED" : "";?> >2021</option>
						<option value="2022" <?=$cur_year == 2022 ? "SELECTED" : "";?> >2022</option>
						<option value="2023" <?=$cur_year == 2023 ? "SELECTED" : "";?> >2023</option>
						<option value="2024" <?=$cur_year == 2024 ? "SELECTED" : "";?> >2024</option>
						<option value="2025" <?=$cur_year == 2025 ? "SELECTED" : "";?> >2025</option>
						<option value="2026" <?=$cur_year == 2026 ? "SELECTED" : "";?> >2026</option>
						<option value="2027" <?=$cur_year == 2027 ? "SELECTED" : "";?> >2027</option>
						<option value="2028" <?=$cur_year == 2028 ? "SELECTED" : "";?> >2028</option>
						<option value="2029" <?=$cur_year == 2029 ? "SELECTED" : "";?> >2029</option>
					</select>
				</li>
				<li><label>Security Code (CVV2):</label> <input type="text" style="width: 100px;" id="cvv" name="new_cc[cvv]"></li>
	            		<li><label><div id="add-cc" class="submit-btn" style="float: left; margin-top: 10px"></div></label></li>
				<li><label><div id="err_add" style='color: red;'></div></label></li>
			</ul>
		</form>
	</div>


<!--For div content changer box (must be just above body closing tag--> 
    <script type="text/javascript" src="js/box/jquery.content.changer.js"></script>
    <script type="text/javascript">
    $(function() {
        $('#box').contentChanger({
            triggerClassName: 'box-trigger',
            triggerScope: 'body'
        });
    });
    </script>
        <script type="text/javascript">
    $(function() {
        $('#box2').contentChanger({
            triggerClassName: 'box-trigger',
            triggerScope: 'body'
        });
    });
    </script>
<!--END For div content changer box (must be just above body closing tag  id="first_tab" class="tab-1 box-trigger"-->   

<script type="text/javascript">
  $("document").ready(function() { 
       document.getElementById('first_tab').click() 
    });
</script>

<script type="text/javascript">

$('#add-cc').click(function() {
	var cc_num = $("#number").val();
	var num = cc_num.replace(/-/g, '');
	var cvv = $("#cvv").val();
	if (!$("#fname").val()) {
		$("#err_add").html("Please enter the cardholder's first name!");	
	} else if (!$("#lname").val()) {
		$("#err_add").html("Please enter the cardholder's last name");
	} else if(!num.match(/^\d+$/) || num.length < 14 || num.length > 18) {
		$("#err_add").html("Please enter a valid credit card number!");	
	} else if(!cvv.match(/^\d+$/) || cvv.length < 3 || cvv.length > 4) {
		$("#err_add").html("Please enter the CVV2 code (back of card)!");		
	} else {
		$("#number").val(num);
		$("#err_add").html('<font color="grey">Processing.. Please wait.</font>');
		add_cc();
	}
});

function add_cc() {
    $.ajax({
        type: "POST",
        url: "update_card.php?q=add_card",
    	 dataType: "json",
        data: $("#add-new-card").serialize(),
        beforeSend: function(){
            $("#err_add").fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(m_edit){
		if (m_edit.success == true) {
            		$("#err_add").fadeIn(250).html(m_edit.message);
	     		window.setTimeout('location.reload()', 1500);
		}
		else {             
			$("#err_add").fadeIn(250).html(m_edit.message); 
		}
        },
        error: function(m_edit){
            $("#err_add").fadeIn(250).css('color', '#ff464a').html('Your credit card could not be verified. Please contact customer support!').delay(2500).fadeOut(250);
        }
    });
    return false;
}

$('.card-delete').click(function() {
    var id_card = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update_card.php?q=del_card",
    	 dataType: "json",
        data: { payer_id: '<?=$id_user?>', id_card: id_card },
        success: function(res){
		if (res.success) {
            		$('.' + id_card).fadeOut();
		}
		else {             
			alert(res.success); 
		}

		if (!res.total) {
			$('.card-headers').fadeOut();
		}
        },
        error: function(res){
            alert('There was a problem removing your credit card'); 
        }
    });
    return false;
});

$('#editProfile_c').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user').attr('value'), fname: $('#fname').attr('value'), lname: $('#lname').attr('value'), email: $('#email').attr('value'),
		phone: $('#phone').attr('value'),
		old_password: $('#old_password').attr('value'), new_password: $('#new_password').attr('value'), new_password_confirm: $('#new_password_confirm').attr('value'),
		type: 'Edit-Profile-Cust' },
        beforeSend: function(){
            $('#editStatus').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(c_edit){
		if (c_edit.success == true) {
            		$('#editStatus').fadeIn(250).html(c_edit.message);
	     		window.setTimeout('location.reload()', 1500);
		}
		else {             
			$('#editStatus').fadeIn(250).html(c_edit.message); 
		}
        },
        error: function(c_edit){
            $('#editStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>
  


</body>
</html>
