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

$user = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '".$id_user."'"));

$jdate = new DateTime($user['joined_date']);
$formatted_jdate = $jdate->format("n/j/Y");

$liveNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."' AND status = 'live'"));
$expNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."' AND status = 'ended'"));
$totalNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '".$id_user."'"));

$promo_applied = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Promo_Log WHERE id_user = '".$id_user."'"));

if ($promo_applied > 0):
?>

<script>
$( document ).ready(function() {
	var msg = '<font color="green">A promo code has been applied to your merchant account. You are free to add as many coupons as you want!</font>';
	$('#slideTwo').html(msg);
	$('#promo-hide-coup').html(msg);
	$('#err-publish').html('<font color="green">Click to confirm ad</font>');
	$('#promo_code_form').val('1');
});
</script>

<?php endif; ?>

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
    
    <!--Expand and collapse div-->  
    <script type="text/javascript" src="js/expander.js"></script> 


<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' />

</head>

<body>
<div class="page-overlay"></div>

<!-- START Modal Content "change email" -->
<div class="close-change-location-modal3">close</div>
<div class="change-locaton-container3"style="margin-top:15%;">
    <div class="change-locaton-inner-container">
        <h2>Update Email</h2>
            <div id="m-advancedCall3">
                <input class="" type="text" name="" value="new email" />
                <br />
                <input class="" type="text" name="" value="confirm new email" />
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">update</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<!-- START Modal Content "change password" -->
<div class="close-change-location-modal4">close</div>
<div class="change-locaton-container4"style="margin-top:10%;">
    <div class="change-locaton-inner-container">
        <h2>Update Password</h2>
            <div id="m-advancedCall4">
            	<input class="" type="text" name="" value="current password" />
                <br />
                <input class="" type="text" name="" value="new password" />
                <br />
                <input class="" type="text" name="" value="confirm new password" />
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">update</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<!-- START Modal Content "Add Contact" -->
<div class="close-change-location-modal2">close</div>
<div class="change-locaton-container2"style="margin-top:15%;">
    <div class="change-locaton-inner-container">
        <h2>Add a Contact</h2>
            <div id="m-advancedCall2">
                <input class="" type="text" name="" value="contact name" />
                <br />
                <input class="" type="text" name="" value="contact email" />
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">add contact</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<!-- START Modal Content -->
<div class="close-change-location-modal" style="top:85%;">close</div>
<div class="change-locaton-container"style="margin-top:10%;">
    <div class="change-locaton-inner-container">
        <h2>Add a Card</h2>
            <div id="m-advancedCall">
                <input class="" type="text" name="" value="name on card" />
                <br />
                <input class="" type="text" name="" value="card number" />
                <br />
                <input style="width:49%; float:left;" class="" type="text" name="" value="exp date" />
                <input style="width:49%; float:right;" class="" type="text" name="" value="3-digit code" />
        	</div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div class="use-this-coupon">add card</div>
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
    
    <div class="m-use-page-title">My Account</div>
    
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

    <div class="m-user-general-info-container">
    	<a href="" class="m-user-use-coupon box-trigger" data-activates="first" style="color:#fff;">Create a<br/>Coupon</a>
		<div class="m-user-name"><?=$user['bname']?></div>
        <div class="m-user-address"><?=$user['address']?><br/>
        <?=$user['city']?>, <?=$user['state']?> <?=$user['zip']?><br/>
        <?=$user['phone']?><br/>
        <a href="http://<?=$user['website']?>" target="_blank"><?=$user['website']?></a></div>
        <div class="m-user-email">Email: <span><?=$user['email']?></span></div>
        <div class="edit-info-link-container"><a class="edit-info edit-email-click" href="#">edit email</a></div>
        <div class="m-user-password">Password: <span>******</span></div>
        <div class="edit-info-link-container"><a class="edit-info edit-pass-click" href="#">edit password</a></div>
        <div class="m-user-credit-card" style="margin-top:8%;">
        	<span class="toggler" id="toggler-slideOne" style="font-weight:bold;">
            Contact Info        
            <span class="expandSlider">
            	<img src="m-images/div-open.jpg" width="38" height="38" />
            </span>
            <span class="collapseSlider">
            	<img src="m-images/div-close.jpg" width="38" height="38" />
            </span>
       		</span>
            <div class="slider" id="slideOne">
            	<div class="add-card-link-container"><a class="add-card add-contact-click" href="#">add a contact</a></div>
                <form>
                	<div class="m-info-row">
                    <input type="radio" id="r1" class="radio1" name="merchant-contact" CHECKED  />
                    <label for="r1"><span>Jim Bob Jones</span></label> &nbsp; <a href="">X</a> 
                    <br clear="all"/>
                    <label for="r1" style="margin-left:80px;"><span>jbjones@merch-domain.com</span></label>      
                    </div>    
                    <div class="m-info-row">         
                    <input type="radio" id="r2" class="radio1" name="merchant-contact" />
                    <label for="r2"><span>Joe Schmoe</span> </label> &nbsp; <a href="">X</a>
                    <br clear="all"/>
                    <label for="r2" style="margin-left:80px;"><span>joeschmoe@merch-domain.com</span></label>   
                    </div>
                </form>
                </div><!--End Slider-->
        </div><!--End m-user-credit-card-->
        
        <div class="m-user-credit-card">
        	<span class="toggler" id="toggler-slideTwo" style="font-weight:bold;">
            Billing Info        
            <span class="expandSlider">
            	<img src="m-images/div-open.jpg" width="38" height="38" />
            </span>
            <span class="collapseSlider">
            	<img src="m-images/div-close.jpg" width="38" height="38" />
            </span>
       		</span>
            <div class="slider" id="slideTwo">
                <div class="add-card-link-container"><a class="add-card add-card-click" href="#">add a card</a></div>
                <form>
                	<div class="m-info-row">
                    <input type="radio" id="r1b" class="radio2" name="customer-billing-preference" CHECKED  /><label for="r1b"><span>Visa</span> <span>**** **** **** 1234</span></label> &nbsp; <a href="">X</a>       
                    </div>    
                    <div class="m-info-row">         
                    <input type="radio" id="r2b" class="radio2" name="customer-billing-preference" /><label for="r2b"><span>Visa</span> <span>**** **** **** 5678</span> </label> &nbsp; <a href="">X</a>
                    </div>
                </form>
             </div><!--End Slider-->
        </div><!--End m-user-credit-card-->
        
        
    </div><!--end m-user-general-infor-container-->
    
    <div class="merch-account-demo-list">
        <ul>
            <li><span>Member Since:</span> <?=$formatted_jdate?></li>
            <li><span>Profile Views:</span> <?=$user['profile_views']?></li>
            <li><span>Total Live Coupons:</span> <?=$liveNum?></li>
            <li><span>Total Expired Coupons:</span> <?=$expNum?></li>
            <li><span>Total Coupons Created:</span> <?=$totalNum?></li>
        </ul>
    </div>
    
    <div class="m-view-merch-profile" style="text-align:left;"><a href="merchant/<?=$user['link']?>" target="_blank">View Profile Page</a></div>
    <div class="m-view-merch-profile" style="text-align:left;"><a href="m-edit-merch-profile.php">Edit Profile Page</a></div>
</div><!--End Container-->
<script type="text/javascript"/><!--scroll to CAC on click-->
	$('.box-trigger').mouseup(function(){
			setTimeout(func, 1200);
				function func() {
					$("html, body").animate({ scrollTop: 700 }, 600);
				return false;
			}
	});
</script>

<script type="text/javascript" src="js/jquery.content.changer.js"></script>
<script type="text/javascript">
$(function() {
	$('#box').contentChanger({
		triggerClassName: 'box-trigger',
		triggerScope: 'body'
	});
});
</script>

<script type="text/javascript">
		$(".edit-email-click").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container3").fadeIn('slow');
				$(".close-change-location-modal3").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container3").fadeOut('slow');	
			$(".close-change-location-modal3").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal3").click(function(){
			$(".change-locaton-container3").fadeOut('slow');	
			$(".close-change-location-modal3").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
	});			
</script>
<script type="text/javascript">
		$(".edit-pass-click").click(function(){
			$(".page-overlay").fadeIn('slow');
			setTimeout(func, 400);
			function func() {
            	$(".change-locaton-container4").fadeIn('slow');
				$(".close-change-location-modal4").fadeIn('slow');
			}
        });
		
		$(".page-overlay").click(function(){
			$(".change-locaton-container4").fadeOut('slow');	
			$(".close-change-location-modal4").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
        });
		
		$(".close-change-location-modal4").click(function(){
			$(".change-locaton-container4").fadeOut('slow');	
			$(".close-change-location-modal4").fadeOut('slow');	
			setTimeout(func, 600);
			function func() {
            	$(".page-overlay").fadeOut('slow');	
			}
	});			
</script>
<script type="text/javascript">
		$(".add-card-click").click(function(){
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
		$(".add-contact-click").click(function(){
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
</body>
</html>
