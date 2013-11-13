<?php
require_once("../includes/config.php");
require_once("check-login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Administrator Login</title>
      <link rel="stylesheet" type="text/css" href="css/admin.css" />
      <link rel="stylesheet" href="../css/style.css" type="text/css" /><!--gerneral-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancybox_newer/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="fancybox_newer/source/jquery.fancybox.css?v=2.0.6" media="screen" />


	<script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();
	
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>


<script>
$(function() {
    $( ".promo-date-picker" ).datepicker({
		dateFormat: 'yy-mm-dd',
 		numberOfMonths: 3,
		showButtonPanel: true
    });
});
$(document).on('focus', ".promo-date-picker", function(){
    $(this).datepicker({
		dateFormat: 'yy-mm-dd',
 		numberOfMonths: 3,
		showButtonPanel: true
    });
});
</script>
</head>
<body>

<?php include ("header.php") ?>

<div id="container">

<div id="page-top-push"></div>
<div id="admin-main">
<div id="admin-dash-header-container">

<h2>CouZoo Admin Panel</h2>

<div id="masterStatus"></div>

<div class="admin-nav">
    	<div id="coupons" class="nav-item">Coupons</div> |
	<div id="members" class="nav-item">Members</div> |
	<div id="promo-codes" class="nav-item">Promo Codes</div>
</div>

<div id="admin-dash-header">


<!-- Start Coupon Section -->
<div id="coupon-section" class="sections">

<div id="search-header">
    <h3>Coupons</h3>
</div>

  <div id="center-search">
    <form action="" name="coupon_search" id="coupon_search">
        <input id="coupon_keywords" type="text" name="search" placeholder="search for coupons here" value="<?=$keywords?>" />
        <div class="admin-search-btn"></div>
    </form>
    </div>

<table id="coupon-table" width="100%">
<tr class="header">
	<td>ID</td>
	<td>Listed By</td>
	<td width="250px">Title</td>
	<td width="50px">Price</td>
	<td>Status</td>
	<td>Views</td>
	<td>Date</td>
	<td>Actions</td>
</tr>
<?php
	$qry = mysql_query("SELECT * FROM CouZoo_Coupons as c LEFT JOIN CouZoo_Members m ON (c.id_user = m.id_user)");
	$i=0;
	while ($data = mysql_fetch_array($qry)) {
?>
	<div id="editCoupon_<?=$i?>" class="edit_coupon hide">
		<form id="edit_coupon" action="" method="POST">
		<h2>Edit Coupon</h2>
		<input type="hidden" value="<?=$data['id_coupon']?>" id="id_coupon<?=$i?>" name="id_coupon">
			<ul>
				<li><label>ID:</label> <?=$data['id_coupon']?></li>
				<li><label>Listed By:</label> <?=$data['fname']?> <?=$data['lname']?></li>
				<li><label>Title:</label> <input type="text" id="title<?=$i?>" name="title" value="<?=$data['title']?>"></li>
			</ul>
			<div class="admin-submit-btn"></div>
			<div id="<?=$i?>" class="submit-btn edit-coupon-submit"></div> <span id="editStatus<?=$i?>" class="editStatus"></span>
		</form>
	</div>
<?php
	    	echo "<tr id='coupon_".$i."' class='data'>
			<td>".$data['id_coupon']."</td>
			<td>".$data['fname']." ".$data['lname']."</td>
			<td><div id='c_title".$i."'>".$data['title']."</div></td>
			<td>".$data['price']."</td>
			<td>".ucfirst($data['status'])."</td>
			<td>".$data['views']."</td>
			<td>".$data['date']."</td>
			<td><a href='#editCoupon_".$i."' class='fancybox edit_style' id='edit_coupon' style='text-decoration: none;'>Edit</a> <div class='delete_coupon' id='delCoupon_".$i."'>Delete</div></td>
		      </tr>		
		";
	$i++;
	}
?>
</table>

<div id="edit_coupon_holder"></div>

</div>
<!-- End Coupon Section -->



<!-- Start Promo Code Section -->
<div id="promo-section" class="sections hide">

<div id="search-header">
    <h3>Promo Codes</h3>
</div>

	<div id="add_promo">
		<form action="" name="promo-form" id="promo-form">
			<ul>
				<li><label>Code:</label> <input id="add-promo-code" type="text" name="promo-code" placeholder="enter promo code" /></li>
				<li><label>Maximum uses:</label> <input id="add-promo-uses" type="text" name="promo-uses" placeholder="leave blank for unlimited" /></li>
				<li><label>Date Expires:</label> <input class="promo-date-picker" id="add-promo-date" type="text" name="promo-code" placeholder="leave blank for no expiration" value="" /></li>
			</ul>
			<div class="admin-submit-btn"></div>
			<div id="add-promo-submit" class="submit-btn"></div>
		</form>
	</div>

<br><br>

<table id="promo-table" width="100%">
<tr class="header">
	<td>Promo Code</td>
	<td>Max Uses</td>
	<td>Total Uses</td>
	<td>Uses Left</td>
	<td>Date Expires</td>
	<td>Status (click to change)</td>
	<td>Actions</td>
</tr>
<?php
	$qry = mysql_query("SELECT * FROM CouZoo_Promo_Codes ORDER BY status DESC");
	$i=0;
	while ($data = mysql_fetch_array($qry)) {
?>
	<div id="editPromo_<?=$i?>" class="edit_promo hide">
		<form id="edit_promo" action="" method="POST">
		<h2>Edit Promo Code</h2>
		<input type="hidden" value="<?=$data['id']?>" id="promo_id<?=$i?>" name="promo_id">
			<ul>
				<li><label>Code:</label> <input id="promo-code<?=$i?>" type="text" name="promo-code" placeholder="enter promo code" value="<?=$data['code']?>" /></li>
				<li><label>Maximum uses:</label> <input id="promo-uses<?=$i?>" type="text" name="promo-uses" placeholder="leave blank for unlimited" value="<?=$data['max_uses']?>" /></li>
				<li><label>Date Expires:</label> <input class="promo-date-picker" id="promo-date<?=$i?>" type="text" name="promo-date" placeholder="leave blank for no expiration" value="" value="<?=$data['date_expires']?>" /></li>
			</ul>
			<div class="admin-submit-btn"></div>
			<div id="<?=$i?>" class="submit-btn edit-promo-submit"></div> <span id="editPromoStatus<?=$i?>" class="editPromoStatus"></span>
		</form>
	</div>
<?php
		$max_uses = !$data['max_uses'] ? "Unlimited" : $data['max_uses'];
		$uses_left = !$data['max_uses'] ? "Unlimited" : $data['max_uses'] - $data['total_uses'];
		$date_expires = !strtotime($data['date_expires']) ? "None" : $data['date_expires'];
		$status = $data['status'] == 0 ? "Disabled" : "Enabled";

	    	echo "<tr id='promo_".$i."' class='data'>
			<td><div id='promo_code".$i."'>".$data['code']."</div></td>
			<td><div id='promo_max_uses".$i."'>".$max_uses."</div></td>
			<td><div id='promo_total_uses".$i."'>".$data['total_uses']."</div></td>
			<td><div id='promo_uses_left".$i."'>".$uses_left."</div></td>
			<td><div id='promo_date_expires".$i."'>".$date_expires."</div></td>
			<td><div class='upd_promo_status click-me' id='promo_status".$i."'>".$status."</div></td>
			<td><a href='#editPromo_".$i."' class='fancybox edit_style' id='edit_promo' style='text-decoration: none;'>Edit</a> <div class='delete_promo' id='delPromo_".$i."'>Delete</div></td>
		      </tr>
		";
	$i++;
	}
?>
</table>

<div id="edit_promo_holder"></div>

</div>
<!-- End Promo Code Section -->


</div>
</div>
</div>
</div>

<script>
$('#coupons').on("click", function() {
    $('.sections').fadeOut();
    $('#coupon-section').fadeIn();
});

$('#promo-codes').on("click", function() {
    $('.sections').fadeOut();
    $('#promo-section').fadeIn();
});

$('.admin-search-btn').on("click", function() {
	$('#coupon_search').submit();
});

$(document).on("keyup", '#coupon_keywords', function(e) {
    	if (!$('#masterStatus').data('typing')) {
    		$('#masterStatus').fadeIn(250).css('color', '#f26625').html('Continue to type and the coupons will automatically show up below!');
		$('#masterStatus').data('typing', true);
	}

    	clearTimeout($.data(this, 'timer'));
    	if (e.keyCode == 13)
      		search(true);
    	else
      		$(this).data('timer', setTimeout(search, 500));
});

function search() {
	$('#coupon_search').submit();
}


$(document).on("submit", '#coupon_search', function(e) {
    $('#masterStatus').data('typing', false);
    e.preventDefault();
    var kw = $('#coupon_keywords').val();
      $.ajax({
        type: "POST",
        url: "update.php?q=search_coupon",
    	 dataType: "json",
        data: { keywords: kw },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(c_search){
		if (c_search.success == true) {
			$("#coupon-table").find("tr:gt(0)").remove();
			$(".edit_coupon").remove();
			$('#coupon-table > tbody:last').append(c_search.coupons);
			$('#edit_coupon_holder').html(c_search.coupons_edit);
			$('#masterStatus').fadeIn().html(c_search.message).delay(5000).fadeOut();
		}
		else {             
			$('#masterStatus').fadeIn(250).html(c_search.message); 
		}
        },
        error: function(c_search){
            $('#masterStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
      });
    return false;
});

$(document).on("click", '.edit-coupon-submit', function() {
    var i = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php?q=upd_coupon",
    	 dataType: "json",
        data: { id_coupon: $('#id_coupon' + i).val(), title: $('#title' + i).val() },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(c_edit){
		if (c_edit.success == true) {
            		$('#editStatus' + i).fadeIn(250).html('').fadeOut(250);
			$('#c_title' + i).html(c_edit.title);
	     		$.fancybox.close();
			$('#masterStatus').fadeIn().html(c_edit.message).delay(5000).fadeOut();
		}
		else {        
			$('#masterStatus').fadeOut();       
			$('#editStatus' + i).fadeIn(250).html(c_edit.message); 
		}
        },
        error: function(c_edit){
            $('#editStatus' + i).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$(document).on("click", '.delete_coupon', function() {
    var num = $(this).attr('id');
    var i = num.substr(num.indexOf("_") + 1)
    if (confirm("Are you sure you want to delete this coupon?")) {
      $.ajax({
        type: "POST",
        url: "update.php?q=del_coupon",
    	 dataType: "json",
        data: { id_coupon: $('#id_coupon' + i).val() },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(c_edit){
		if (c_edit.success == true) {
			$('#coupon_' + i).fadeOut().remove();
			$('#masterStatus').fadeIn().html(c_edit.message).delay(5000).fadeOut();
		}
		else {             
			$('#masterStatus').fadeIn(250).html(c_edit.message); 
		}
        },
        error: function(c_edit){
            $('#masterStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
      });
    }
    return false;
});


$(document).on("click", '#add-promo-submit', function() {
    var code = $('#add-promo-code').val();
    var uses = $('#add-promo-uses').val();
    var date = $('#add-promo-date').val();
      $.ajax({
        type: "POST",
        url: "update.php?q=add_promo",
    	 dataType: "json",
        data: { code: code, max_uses: uses, date_expires: date },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(res){
		if (res.success == true) {
			$("#promo-table").find("tr:gt(0)").remove();
			$(".edit_promo").remove();
			$('#promo-table > tbody:last').append(res.promos);
			$('#edit_promo_holder').html(res.promo_edit);
			$('#masterStatus').fadeIn().html(res.message).delay(5000).fadeOut();
			$('#promo-form')[0].reset();
		}
		else {            
			$('#masterStatus').fadeIn(250).html(res.message); 
		}
        },
        error: function(res){
            $('#masterStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
      });
    return false;
});

$(document).on("click", '.edit-promo-submit', function() {
    var i = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php?q=upd_promo",
    	 dataType: "json",
        data: { promo_id: $('#promo_id' + i).val(), code: $('#promo-code' + i).val(), max_uses: $('#promo-uses' + i).val(), date_expires: $('#promo-date' + i).val() },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(res){
		if (res.success == true) {
            		$('#editPromoStatus' + i).fadeIn(250).html('').fadeOut(250);
			$('#promo_code' + i).html(res.code);
			$('#promo_max_uses' + i).html(res.max_uses);
			$('#promo_total_uses' + i).html(res.total_uses);
			$('#promo_uses_left' + i).html(res.uses_left);
			$('#promo_date_expires' + i).html(res.date_expires);
			$('#promo_status' + i).html(res.status);
	     		$.fancybox.close();
			$('#masterStatus').fadeIn().html(res.message).delay(5000).fadeOut();
		}
		else {  
			$('#masterStatus').fadeOut();          
			$('#editPromoStatus' + i).fadeIn(250).html(res.message); 
		}
        },
        error: function(res){
            $('#editPromoStatus' + i).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$(document).on("click", '.upd_promo_status', function() {
    var num = $(this).attr('id');
    var i = num.replace('promo_status','');
      $.ajax({
        type: "POST",
        url: "update.php?q=upd_promo_status",
    	 dataType: "json",
        data: { promo_id: $('#promo_id' + i).val(), status: $('#promo_status' + i).html() },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(res){
		if (res.success == true) {
			$('#promo_status' + i).fadeIn().html(res.status)
			$('#masterStatus').fadeIn().html(res.message).delay(5000).fadeOut();
		}
		else {             
			$('#masterStatus').fadeIn(250).html(res.message); 
		}
        },
        error: function(res){
            $('#masterStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
      });
    return false;
});

$(document).on("click", '.delete_promo', function() {
    var num = $(this).attr('id');
    var i = num.substr(num.indexOf("_") + 1)
    if (confirm("Are you sure you want to delete this promo code?")) {
      $.ajax({
        type: "POST",
        url: "update.php?q=del_promo",
    	 dataType: "json",
        data: { promo_id: $('#promo_id' + i).val() },
        beforeSend: function(){
            $('#masterStatus').fadeIn(250).html('<img src="../images/ajax-loader.gif">');
        },
        success: function(res){
		if (res.success == true) {
			$('#promo_' + i).fadeOut().remove();
			$('#masterStatus').fadeIn().html(res.message).delay(5000).fadeOut();
		}
		else {             
			$('#masterStatus').fadeIn(250).html(res.message); 
		}
        },
        error: function(res){
            $('#masterStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
      });
    }
    return false;
});

</script>

</body>
</html>