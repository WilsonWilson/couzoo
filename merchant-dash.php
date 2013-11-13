<?php
require_once("includes/config.php");

$redirect = $couzoo->CheckLoginDash("merchant-dash");
if(!$redirect)
{
    	$couzoo->RedirectToURL("login.php");
    	exit;
}
elseif($redirect === "customer")
{
    	$couzoo->RedirectToURL("customer-dash.php");
    	exit;
}

if(isset($_POST['submit_coupon']))
{
   if($couzoo->AddCoupon())
   {
        $couzoo->RedirectToURL("merchant-dash.php");
   }
}

if (isset($_POST['image']) && $_FILES['prof_img']['name']) {
	$allowedExts = array("png", "jpg", "jpeg", "gif");							
	$ext = end(explode('.', strtolower($_FILES['prof_img']['name'])));
	if (!in_array($ext, $allowedExts)) {
		$invalidPhoto = true;
	} else {
		require_once("includes/class.photo.php");

		$u_id = $_POST['id_user'];
		$img_tmp = $_FILES['prof_img']['tmp_name'];
		$path = "uploads/merchants/".$u_id.".jpg";

      		$image = new Photo();
      		$image->load($img_tmp);
      		$image->resize(500,300);
		$image->save($path);

		mysql_query("UPDATE CouZoo_Members SET image = '".$u_id.".jpg' WHERE id_user = '$u_id'");
	}
	$imgSuccess = true;
}
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START MERCH DASH PAGE ADD-ONS -->

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

        
<!--Form Slider-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.4.3.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<!--For div content changer box -->
	<script type="text/javascript" src="js/box/jquery-1.7.min.js"></script>
    

<!--Expand and collapse div-->  
    <script type="text/javascript" src="js/expander.js"></script>

<!-- Numbers script -->  
    <script type="text/javascript" src="js/jquery-num.js"></script>

<!-- Textarea script -->  
<script src="js/jquery.jqEasyCharCounter.min.js" type="text/javascript"></script>

<!--for tooptips -->
<link type="text/css" rel="stylesheet" href="css/Tooltip.css" />
<script type="text/javascript" src="js/Tooltip.js"></script> 

   
	<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    <script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/LXP.js"></script>
    <script type="text/javascript" src="js/browser-select.js"></script>    

<!--[if IE]>
<style type='text/css'>
* html .myButton { display:inline; }  /* hack per IE 6 */
* + html .myButton { display:inline; }  /* hack per IE 7 */
</style>
<![endif]-->	

<!--for auto populate-->   
<script type="text/javascript">
    $(function() {                                       // <== Doc Ready
    $("#featured-item").change(function() {                  // When changed
        $('#featured-item-2').val(this.value);                  // copy it over 
		$('#featured-item-3').val(this.value);                  // copy it over
    });
	 $("#retail-price").change(function() {                  // When changed
        $('#retail-price-2').val(this.value);                  // copy it over
		$('#retail-price-3').val(this.value);                  // copy it over 
    });
	 $("#sale-price").change(function() {                  // When hanged
        $('#sale-price-2').val(this.value);                  // copy it over
		$('#sale-price-3').val(this.value);                  // copy it over
    });
});
</script>
    
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

	<script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=markDown]").click(function() {
                $('.toHide').hide();
                $("#blk-" + $(this).val()).show('slow');
				$("#blk-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script>
    
    <script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=maxPurchases]").click(function() {
                $('.toHide').hide();
                $("#paymaxp-" + $(this).val()).show('slow');
				$("#paymaxp-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script>
    
    <script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=featuredAd]").click(function() {
                $('.toHide').hide();
                $("#adblk-" + $(this).val()).show('slow');
				$("#adblk-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script> 
        
    <script type="text/javascript">//&lt;![CDATA[
        $(window).load(function(){
        $(function() {
            $("[name=paymentForm]").click(function() {
                $('.toHide').hide();
                $("#payblk-" + $(this).val()).show('slow');
				$("#payblk-b-" + $(this).val()).show('slow');
            });
        });
        });//]]&gt; 
    </script>

	<?php $catCheck = "var cbCheck = $('.catagory-box input:checkbox:checked').length; $('#step-1').data('completed', false); if(cbCheck > 0) { $('#err-step-1').html('<img class=\"checkmark\" src=\"images/green-check.png\" width=30 height=25>'); $('#step-1').data('completed', true); } else { $('#err-step-1').html('**Please select a category'); }"; ?>
    
 	<!--Browse view check box, check all function-->
	<script language='JavaScript'>

      $(document).ready(function(){

      //For Food and Drink checkboxes
       $('#checkAll_1').toggle(function(){
         $('#cat_1 input:checkbox').attr('checked','checked');
           $('#checkAll_1').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_1 input:checkbox').removeAttr('checked');
           $('#checkAll_1').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

      //For Beauty checkboxes
       $('#checkAll_2').toggle(function(){
         $('#cat_2 input:checkbox').attr('checked','checked');
           $('#checkAll_2').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_2 input:checkbox').removeAttr('checked');
           $('#checkAll_2').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

	 //For Fitness checkboxes
       $('#checkAll_3').toggle(function(){
         $('#cat_3 input:checkbox').attr('checked','checked');
           $('#checkAll_3').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_3 input:checkbox').removeAttr('checked');
           $('#checkAll_3').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

	//For Medical checkboxes
       $('#checkAll_4').toggle(function(){
         $('#cat_4 input:checkbox').attr('checked','checked');
           $('#checkAll_4').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_4 input:checkbox').removeAttr('checked');
           $('#checkAll_4').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

	 //For Activities Checkboxes
       $('#checkAll_5').toggle(function(){
         $('#cat_5 input:checkbox').attr('checked','checked');
           $('#checkAll_5').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_5 input:checkbox').removeAttr('checked');
           $('#checkAll_5').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

	//For Retail and Services Checkboxes
       $('#checkAll_6').toggle(function(){
         $('#cat_6 input:checkbox').attr('checked','checked');
           $('#checkAll_6').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_6 input:checkbox').removeAttr('checked');
           $('#checkAll_6').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })

	//For Other Checkboxes
       $('#checkAll_7').toggle(function(){
         $('#cat_7 input:checkbox').attr('checked','checked');
           $('#checkAll_7').children('#check-all').html('<span class="check-all-btn" name="checkall">uncheck</span>');
		<?=$catCheck?>
        },function(){
         $('#cat_7 input:checkbox').removeAttr('checked');
           $('#checkAll_7').children('#check-all').html('<span class="check-all-btn" name="checkall">all</span>');
		<?=$catCheck?>
       })
      })
    </script>

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
    

<style type="text/css">
.check-box-md {clear:both; margin:0px 0px 4px 0px;}
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#posting_date" ).datepicker({
minDate: "+0D",
showButtonPanel: true,
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onSelect: function( selectedDate ) {
var date = $.datepicker.formatDate('yy-mm-dd', new Date( selectedDate ));
$( "#posting_date_formatted" ).val( date );
$( "#removal_date" ).datepicker( "option", "minDate", selectedDate );
$('#step-6').data('completed', false);
	var maxNum = $('#maxPurchases_num').val();
	if(!$('#removal_date').datepicker('getDate')) {
       	$('#err-step-6').html('**Please select an ending date');
	} else if($('#maxPurchases').is(':checked') && maxNum.length < 1) {
       	$('#err-step-6').html('**Max. purchases is empty');
	} else {
 		$('#err-step-6').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		$('#step-6').data('completed', true);
	}
}
});

$( "#removal_date" ).datepicker({
maxDate: "+3M",
showButtonPanel: true,
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onSelect: function( selectedDate ) {
var date = $.datepicker.formatDate('yy-mm-dd', new Date( selectedDate ));
$( "#removal_date_formatted" ).val( date );
$( "#posting_date" ).datepicker( "option", "maxDate", selectedDate );
$('#step-6').data('completed', false);
	var maxNum = $('#maxPurchases_num').val();
	if(!$('#posting_date').datepicker('getDate')) {
       	$('#err-step-6').html('**Please select a starting date');
	} else if($('#maxPurchases').is(':checked') && maxNum.length < 1) {
       	$('#err-step-6').html('**Max. purchases is empty');
	} else {
 		$('#err-step-6').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		$('#step-6').data('completed', true);
	}
}
});

$( "#valid_date" ).datepicker({
minDate: "+0D",
showButtonPanel: true,
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onSelect: function( selectedDate ) {
var date = $.datepicker.formatDate('yy-mm-dd', new Date( selectedDate ));
$( "#valid_date_formatted" ).val( date );
$( "#exp_date" ).datepicker( "option", "minDate", selectedDate );
$('#step-7').data('completed', false);
	if(!$('#exp_date').datepicker('getDate')) {
       	$('#err-step-7').html('**Please select the date when the coupon expires');
	} else {
 		$('#err-step-7').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		$('#step-7').data('completed', true);
	}
}
});

$( "#exp_date" ).datepicker({
minDate: "+1D",
showButtonPanel: true,
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onSelect: function( selectedDate ) {
var date = $.datepicker.formatDate('yy-mm-dd', new Date( selectedDate ));
$( "#exp_date_formatted" ).val( date );
$( "#valid_date" ).datepicker( "option", "maxDate", selectedDate );
$('#step-7').data('completed', false);
	if(!$('#valid_date').datepicker('getDate')) {
       	$('#err-step-7').html('**Please select the date when the coupon first becomes valid to use');
	} else {
 		$('#err-step-7').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		$('#step-7').data('completed', true);
	}
}
});

});
</script>

<?php if($imgSuccess == true) { ?>
	<script type="text/javascript">
    	$(document).ready(function() {
        	$("#img-success").fancybox().trigger('click');
    	});
	</script>
<?php } ?>

<!--START OPEN and CLOSE ALL SIDE BUTTON-->
	<?php include ("open-close-all-tab.html") ?>
<!--END OPEN and CLOSE ALL SIDE BUTTON-->

<link rel="stylesheet" href="css/create-coupon.css" type="text/css"/>
<link rel="stylesheet" href="css/cart-styles.css" type="text/css"/>
<link rel="stylesheet" href="css/user-dash.css" type="text/css"/>

<!-- END MERCH DASH PAGE ADD-ONS -->



<?php
//Get User Data
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$qry = mysql_query("SELECT * FROM CouZoo_Members WHERE id_user = '$id_user'");
$row = mysql_fetch_assoc($qry);

	$email = $row['email'];
	$bname = $row['bname'];
	$address = $row['address'];
	$city = $row['city'];
	$state = $row['state'];
	$zip = $row['zip'];
	$phone = $row['phone'];
	$website = $row['website'];
	$cDescription = $row['description'];
	$prof_img = $row['image'];
	$prof_views = $row['profile_views'];
	$link = $row['link'];
	$jdate = $row['joined_date'];
	$last_upd = strtotime($row['last_update']);
	$couponLat = $row['latitude'];
	$couponLong = $row['longitude'];

$jdate = new DateTime($jdate);
$formatted_jdate = $jdate->format("n/j/Y");

$liveNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_user' AND status = 'live'"));
$expNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_user' AND status = 'ended'"));
$totalNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_user'"));

$v = mysql_query("SELECT sum(views) as views FROM CouZoo_Coupons WHERE id_user = '$id_user'");
$res = mysql_fetch_array($v);
$views = $res['views'];

$promo_applied = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Promo_Log WHERE id_user = '$id_user'"));

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


<div id="container">

<div id="page-top-push"></div>

<div id="main-column">

<!--Start Merchant Header-->
<div id="merch-dash-header-container">
<div id="merch-dash-header">

			<div id="editProf" style="display: none;">
			<form id="editProfile_m" action="" method="POST">
			<h2>Edit Profile</h2>
				<input type="hidden" value="<?=$id_user?>" id="id_user" name="id_user">
		<table>
		<tr>
			<td>
				<li><label>Bus. Name:</label> <input type="text" id="bname" name="firstName" value="<?=$bname?>" disabled="disabled"></li>
				<li><label>Address:</label> <input type="text" id="address" name="address" value="<?=$address?>"></li>
				<li><label>City:</label> <input type="text" id="city" name="city" value="<?=$city?>"></li>
				<li><label>State:</label><input type="text" id="state" name="state" value="<?=$state?>"></li>
			</td>
			<td>
				<li><label>Zip Code:</label><input type="text" id="zip" name="zip" value="<?=$zip?>"></li>
				<li><label>Phone:</label> <input type="text" id="phone" name="phone" value="<?=$phone?>"></li>
				<li><label>E-mail:</label> <input type="text" id="email" name="email" value="<?=$email?>"></li>
				<li><label>Webiste:</label> <input type="text" id="website" name="website" value="<?=$website?>"></li>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<li><label>Description:</label> <textarea id="description" name="description" cols="121" rows="4"><?=$cDescription?></textarea></li>
			</td>
		</tr>
		<tr>
			<td>	
				<h2>Change Password</h2>
				<li><label>Current Password:</label> <input type="password" id="old_password" name="old_password" value="<?=$old_pass?>"></li><br>
				<li><label>New <br> Password:</label> <input type="password" id="new_password" name="new_password" value="<?=$new_pass?>"></li><br>
				<li><label>New Password Confirm:</label> <input type="password" id="new_password_confirm" name="new_password_confirm" value="<?=$new_pass_confirm?>"></li>
			</td>
			<td align="center">
				<a href="#editImg" class="fancybox editImg">Change profile image</a>
			</td>
		</tr>
		</table>
			<center><button type="submit">Update</button></center>
			<center><br><span id="editStatus" class="editStatus"></span></center>
			</form>
                    	</div>


			<div id="editImg" style="display: none;">
			<form id="editImg" enctype="multipart/form-data" action="" method="POST">
			<h2>Edit Profile Image</h2>
			<br>
				<input type="hidden" value="<?=$id_user?>" id="id_user" name="id_user">
				<input type="file" name="prof_img" id="prof_img">
			<br>
			<center><button type="submit" name="image">Update</button></center>
			</form>
                    	</div>


			<div id="img-success" style="display: none;">
			<font size="4">
				<?php if($invalidPhoto == true) { echo "<font color='red'>Invalid photo type! <br><br><br> Please upload only JPEG, JPG, GIF, or PNG images."; }
				      else { echo "<font color='green'>Success! <br><br><br> Your profile image has been updated."; }
				?>
			</font></font>
                    	</div>


<h1><?=$bname;?></h1>
<a href="#editProf" class="edit fancybox">edit</a>

<div id="row-box">

<div class="column-box">
<?=$address;?><br />
<?=$city;?>, <?=$state;?> <?=$zip;?><br />
<?=$phone?><br />
<a href=""><?=$email?></a><br />
<a href=""><?=$website?></a>
</div><!--END column-box-->

<div class="column-box">
<span id="stat-name">user name:</span> <a href=""><?=$email?></a><br />
<span id="stat-name">password:</span> *********<br /><br />



</div><!--END column-box-->

<div class="column-box column-box-last">
<span id="stat-name">Coupons sold:</span> 0<br />
<span id="stat-name">Coupons redeemed:</span> 0<br />
<span id="stat-name">Coupon views:</span> <?=$views?><br />
<span id="stat-name">Coupon page views:</span> 0<br />
<span id="stat-name">Profile views:</span> <?=$prof_views?><br />
<span id="stat-name">Total sales:</span> $0.00<br />

</div><!--END column-box-->
<br clear="all"/>

</div><!--END row-box-->

<div id="row-box">

<h2>Contact Info

<span class="toggler" id="toggler-slideOne">
	<span class="expandSlider"><img src="images/div-open.jpg" width="14" height="14" /></span><span class="collapseSlider"><img src="images/div-close.jpg" width="14" height="14" /></span>
</span>

</h2>

<div class="slider" id="slideOne">
<p class="step-copy" style="margin:0px 0px 10px 0px">Who would you like to be your primary contact?</p>
<br clear="all"/>

<form>
<div id="info-row">

<?php
$qry = mysql_query("SELECT * FROM CouZoo_Contacts WHERE id_user = '$id_user' ORDER BY primary_c DESC, id_contact");
$result = ($qry);

while ($row = mysql_fetch_assoc($result)) {

	$c_id = $row['id_contact'];
	$c_name = $row['name'];
	$c_phone = $row['phone'];
	$c_email = $row['email'];
	$c_primary = $row['primary_c'];
?>

<input type="radio" name="id_contact" id="id_contact" value="<?=$c_id?>" <?php if($c_primary == "1") { echo "CHECKED"; } ?>  />
<span class="primary-title"><?=$c_name?></span>
<span class="primary-secondary-item"><?=$c_phone?></span>
<span class="primary-secondary-item"><?=$c_email?></span>
<span id="updateCStatus" class="updateCStatus"></span>

<br>

<?php
}
?>

</div><!--END info-row-->
</form>

<br clear="all"/>

			<div id="addContact" style="display: none;">
			<form id="addContact" action="" method="POST">
			<h2>Add Another Contact</h2>
				<input type="hidden" value="<?=$id_user?>" id="id_user" name="id_user">
		<table>
		<tr>
			<td>
				<li><label>Name:</label> <input type="text" id="cname" name="cname"></li>
				<li><label>Phone:</label> <input type="text" id="cphone" name="cphone"></li>
				<li><label>E-mail:</label> <input type="text" id="cemail" name="cemail"></li>
				<li><label>Primary:</label></li> 
				<label>Yes</label><input type="radio" id="cprimary" name="cprimary" value="1"> &nbsp; &nbsp;
				<label>No</label><input type="radio" id="cprimary" name="cprimary" value="0" CHECKED>
			</td>
		</tr>
		</table><br>
			<center><button type="submit">Add</button></center>
			<center><br><span id="addCStatus" class="addCStatus"></span></center>
			</form>
                    	</div>

<a href="#addContact" class="fancybox change" >add another contact</a>
<br clear="all"/><br clear="all"/>
</div><!--END Contact expander-->



<h2>Billing Info

<span class="toggler" id="toggler-slideTwo">
	<span class="expandSlider"><img src="images/div-open.jpg" width="14" height="14" /></span><span class="collapseSlider"><img src="images/div-close.jpg" width="14" height="14" /></span>
</span>

</h2>

<div class="slider" id="slideTwo">

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
<?php } ?>

   <div id="payment-left-column">
             <p id="no-card-added" class="step-copy" style="margin-bottom:10px; <?=$total_cc > 0 ? "display: none;" : "";?>">
                You have not yet entered a credit card to be used with your CouZoo Merchant Account. There is a $25 per month subscription fee, which allows you to create and post as many coupons as you wish to CouZoo.com. You may cancel at any time.
             </p>
             <a href="#add-card" id="card-text" class="fancybox change" style="font-size:14px;"><?=!$total_cc ? "Add a Credit Card" : "Add Another Credit Card";?></a>  &nbsp; |  &nbsp; <a href="javascript:;" style="font-size:14px;" onmousedown="slidedown('payment-right-column');">Use a Promo Code</a>
        </div>

    <div id="payment-right-column" style="display:none; overflow:hidden; height:128px; width:100%;">
        <br clear="all"/>
        <div style="margin:10px 0px 0px 0px; color:#603912; float:left;" id="payblk-2">
             <div style="width:200px; ">
                <div id="advancedCall2">
                    <form>
                        <input id="promo-code-billing" type="text" value="promo code" style="width:168px; margin-top:-20px; padding-left:0px; text-align:center;" />
                    </form>
                </div>
             </div>
             <div style="width:200px; margin:2px 0px 8px 0px;"><div id="billing" class="apply-promo-btn"></div></div>
             <div style="width:168px; text-align:center;">
                <a href="javascript:;" style="font-size:12px;" onmousedown="slideup('payment-right-column');">I don't have a promo code</a>
             </div>
        </div>
        
        <div style="margin:10px 0px; float:left; width:400px;">
             <p id="promo-msg-billing" class="step-copy" style="color:#f26625"></p>  
        </div>
     </div>

<?php if ($total_cc > 0) { ?>
	<div id="sub-renew-info">    
        	<br clear="all"/>
        	<p class="step-copy" style="margin:10px 0px 10px 0px">
            		You are subscribed with the selected credit card above to create unlimited coupons.<br/> 
            		Would you like to auto-renew at the end of each billing period?</p>
        	<br clear="all"/>
        	<form>
            		<input type="radio" name="customer-subscribe-auto-renew" value="yes" CHECKED  />&nbsp;yes  &nbsp;&nbsp;&nbsp;
            		<input type="radio" name="customer-subscribe-auto-renew" value="no" />&nbsp;no
        	</form>
	</div>
<?php } ?>
    
<br clear="all"/>


</div> <!--END Billing Expander-->

</div><!--END row-box-->

</div><!--END merch-dash-header -->


<!--START LXP -->
<div id="le-tabs" class="example3 oldlook animSpeed-200 direction-horizontal  autoOrder-false autoplayInterval-0">
			
			<div id="le-tabs_tab_container">
				<a href="#content-1" id="first_tab" class="tab-1x3 box-trigger" data-activates="defualt">view coupons</a>
				<a href="#content-2" class="tab-2x3 box-trigger" data-activates="forth">create a coupon</a>
                		<a href="#content-3" class="tab-3x3 box-trigger" data-activates="seventh">manage profile</a>
            		</div>
			
			<div id="le-tabs_content_container">
				<div id="le-tabs_content_inner">

					<div id="content-1" class="le-tabs_content merchant-1-height">
						
                        <div id="tab-1-top-x3"></div>
                      
					      <div id="box-instructions">
                            
                                <a href="javascript:void(0);" class="live-coupon-btn box-trigger" data-activates="defualt"></a>
                                <a href="javascript:void(0);" class="expired-coupon-btn box-trigger" data-activates="second"></a>
                               <a href="javascript:void(0);" class="saved-coupon-btn box-trigger" data-activates="third"></a>
                                <br clear="all"/>
                              
                              <div id="box2">
                                <div class="changeable defualt"></div>
                                <div class="changeable second"></div>
                                <div class="changeable third"></div>
                              </div>
                          
                          </div>
                                      
                    </div><!--End Box 1-->
                                       


                    <div id="content-2" class="le-tabs_content merchant-2b-height">
                        <div id="tab-2-top-x3"></div>
                    
                    	 <div id="box-instructions">
                                
                                <a href="javascript:void(0);" class="create-1-coupon-btn box-trigger" data-activates="forth"></a>
                               
                               <!-- Double and Triple Coupons (add later)
                               <a href="javascript:void(0);" class="create-2-coupon-btn box-trigger" data-activates="fifth"></a>
                                <a href="javascript:void(0);" class="create-3-coupon-btn box-trigger" data-activates="sixth"></a> -->
                                <br clear="all"/>
                                
                              	<div id="box3">
                                    <div class="changeable defualt2"></div>
                                    <div class="changeable forth"></div>
                                    <div class="changeable fifth"></div>
                                    <div class="changeable sixth"></div>
                              	</div>
                              
        				</div>
                   </div><!--End Box 2-->
                                       
                    
                    <div id="content-3" class="le-tabs_content merchant-3b-height">
                        <div id="tab-3-top-x3"></div>
                            <div>
                              <h2 class="aqua-header">Below is your company profile.
                               &nbsp; &nbsp; <a class="normal-link" href="<?=$link?>" target="_blank">View live</a>
                                &nbsp; &nbsp; <a class="normal-link fancybox" href="#editProf" >Edit profile</a>
                              </h2>                    
                            </div>
                   </div><!--End Box 2-->                    
                                        
                   
                    <br clear="all"/><br clear="all"/>
                                    
                   </div>
          </div>
          </div>
          
</div><!--END merch-dash-container-->         
<br clear="all"/>

<div id="box" >
    <div class="changeable empty">
            <div></div>
    </div>

<!-- Start Live Coupons -->
            <?php include ("coupons-live.php") ?>
<!-- End Live Coupons -->

<!-- Start Expired Coupons -->
            <?php include ("coupons-expired.php") ?>
<!-- End Expired Coupons -->

<!-- Start Pending/Saved Coupons -->
            <?php include ("coupons-pending.php") ?>
<!-- End Pending/Saved Coupons -->
    
    
<!--Start merch Profile section-->
    <div class="changeable seventh">
  		<br clear="all"/>
        <!--Start Merchant Header-->
                        <div id="merch-dash-header-container">
                        <div id="merch-dash-header">
                        
                        <h1><?=$bname?></h1>
                        
                        <div class="merch-profile-live-container">
                        <div class="merch-profile-live-copy">coupons<br/>live</div>
                        <div class="merch-profile-live-box">
                        <div class="merch-profile-live-number"><?=$liveNum?></div>
                        </div><!--End merch-profile-live-box-->
                        </div><!--End merch-profile-live-container-->
                        
                        <div class="merch-profile-left-column">

                        <div class="merch-profile-image">
				<a href="#editImg" class="fancybox editImg"><img src="uploads/merchants/<?=$prof_img?>?<?=$last_upd?>" title="Click to change your profile image" /></a>
                        </div><!--END merch-profile-image-->
                        
                        <div class="merch-profile-left-copy">
                        <div class="merch-profile-address"><?=$address?><br />
                        <?=$city?>, <?=$state?> <?=$zip?></div>
                        <div class="merch-profile-phone"><?=$phone?></div>
                        <div class="merch-profile-url"><a href="http://<?=$website?>"><?=$website?></a></div>
                        <div class="merch-profile-email"><a href=""><?=$email?></a></div>
                        </div>
                        
                        <div class="merch-profile-left-copy">
                        <div class="merch-profile-member-since">member since:&nbsp;<span><?=$formatted_jdate?></span></div>
                        <div class="merch-profile-live-coupons-2">total live coupons:&nbsp;<span><?=$liveNum?></span></div>
                        <div class="merch-profile-expired-coupons">total expired coupons:&nbsp;<span><?=$expNum?></span></div>
                        <div class="merch-profile-total-coupons">total coupons:&nbsp;<span><?=$totalNum?></span></div>
                        </div>
                        <br clear="all"/>
                        </div><!--END merch-profile-left-column-->
                        
                        <div class="merch-profile-right-column">
				<?php
					if (!$cDescription) { echo "Your company has not filled out a company description yet. <br><br> Fill it out now by editing your profile!"; }
					else { echo $cDescription; }
				?>
                        </div><!--END merch-profile-right-column-->
                        
                        
                        <br clear="all"/>
                        
                        
                        
                        </div><!--END merch-dash-header -->
                        </div><!--END merch-dash-header-container -->

    </div>
<!--Start merch Profile section-->

<!-- Start create a single coupon -->
	<?php include "add-coupon-single.php" ?>
<!-- End create a single coupon -->


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


<!--Help Modals-->
<!--#include virtual="help-create-a-coupon.html" -->
<!--End Help Modals-->



<!--For Accordion coupons pods-->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript"><!--normal, for live section-->
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc", "h3", 0,-1, 'selected');

var expiredAccordion=new TINY.accordion.slider("expiredAccordion");
expiredAccordion.init("accx", "h3", 0,-1, 'selected');

var savedAccordion=new TINY.accordion.slider("savedAccordion");
savedAccordion.init("accs", "h3", 0,-1, 'selected');

var createAccordion=new TINY.accordion.slider("createAccordion");
createAccordion.init("acccreate", "h3", 1,-1, 'selected');

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
    
	<script type="text/javascript">
    $(function() {
        $('#box3').contentChanger({
            triggerClassName: 'box-trigger',
            triggerScope: 'body'
        });
    });
    </script>
   
    <script type="text/javascript">
    $(function() {
        $('#box4').contentChanger({
            triggerClassName: 'box-trigger',
            triggerScope: 'body'
        });
    });
    </script>
<!--END For div content changer box (must be just above body closing tag-->

<script type="text/javascript">

$('.apply-promo-btn').click(function() {
    var id = $(this).attr('id');
    var code = $('#promo-code-' + id).val();
    $.ajax({
        type: "POST",
        url: "update_card.php?q=check_promo",
    	 dataType: "json",
        data: { payer_id: <?=$id_user?>, code: code },
        beforeSend: function(){
            $('#promo-msg-' + id).fadeIn(250).html('<img src="images/ajax-loader.gif">');
        },
        success: function(res){
	     if (res.success == true) {
		  $('#promo_code_form').val('1');
	         $('#slideTwo').html(res.message);
	         $('#promo-hide-coup').html(res.message);
	     } else {
		  $('#promo-msg-' + id).html(res.message);
	     }
        },
        error: function(res){
            $('#promo-msg-' + id).html("An error occurred");
        }
    });
    return false;
});

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
			$('#sub-renew-info').fadeOut();
			$('#no-card-added').fadeIn();
			$('#card-text').html('Add a Credit Card').fadeIn();
		}
        },
        error: function(res){
            alert('There was a problem removing your credit card'); 
        }
    });
    return false;
});

$('#editProfile_m').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user').attr('value'), bname: $('#bname').attr('value'), address: $('#address').attr('value'), city: $('#city').attr('value'),
		state: $('#state').attr('value'), zip: $('#zip').attr('value'), phone: $('#phone').attr('value'), email: $('#email').attr('value'), 
		website: $('#website').attr('value'), description: $('#description').attr('value'),
		old_password: $('#old_password').attr('value'), new_password: $('#new_password').attr('value'), new_password_confirm: $('#new_password_confirm').attr('value'),
		type: 'Edit-Profile-Merch' },
        beforeSend: function(){
            $('#editStatus').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(m_edit){
		if (m_edit.success == true) {
            		$('#editStatus').fadeIn(250).html(m_edit.message);
	     		window.setTimeout('location.reload()', 1500);
		}
		else {             
			$('#editStatus').fadeIn(250).html(m_edit.message); 
		}
        },
        error: function(m_edit){
            $('#editStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('#addContact').submit(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user').attr('value'), cname: $('#cname').attr('value'), cphone: $('#cphone').attr('value'), cemail: $('#cemail').attr('value'), cprimary: $("input[name='cprimary']:checked").val(), type: 'Add-Contact' },
        beforeSend: function(){
            $('#addCStatus').fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(c_add){
		if (c_add.success == true) {
            		$('#addCStatus').fadeIn(250).html(c_add.message);
	     		window.setTimeout('location.reload()', 1500);
		}
		else {             
			$('#addCStatus').fadeIn(250).html(c_add.message); 
		}
        },
        error: function(c_add){
            $('#addCStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$("input:radio[name='id_contact']").change(function() {
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: $('#id_user').attr('value'), id_contact: $("input[name='id_contact']:checked").val(), type: 'Update-Contact' },
        beforeSend: function(){
            $('#updateCStatus').fadeIn(250).css('color', '#f26625').html('<img src="images/loader.gif" height="16" width="16">');
        },
        success: function(c_upd){
		if (c_upd.success == true) {
            		$('#updateCStatus').fadeIn(250).html(c_upd.message);
		}
		else {             
			$('#updateCStatus').fadeIn(250).html(c_upd.message); 
		}
        },
        error: function(c_upd){
            $('#updateCStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>

</body>
</html>