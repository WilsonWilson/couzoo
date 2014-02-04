<?php
require_once("includes/config.php");
require_once("includes/location.php");

$couzoo->CheckLogin();

$id_coupon = mysql_real_escape_string($_GET['id']);
$valid = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_coupon = '$id_coupon'"));

if (!$valid) { header('Location: results.php'); }

$views = mysql_query("UPDATE CouZoo_Coupons SET views = views + 1 WHERE id_coupon = '$id_coupon'");
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START VIEW COUPON PAGE ADD-ONS -->


        <!--[if IE 9]>
		<style type="text/css">
		#le-tabs.oldlook #le-tabs_tab_container a.X-tab{background-image:url(images/X-tab.png); background-repeat:no-repeat; color:#603912; margin:0px 1px 0px 1px;}
        </style>
		<![endif]-->
        
        <!--[if lte IE 8]>
		<link rel="stylesheet" href="css/ie9-or-less.css" type="text/css" />
		<![endif]-->
        
	<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    <script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/LXP.js"></script>
    <script type="text/javascript" src="js/sticky-search.js"></script>  
    
    
    <!-- CSS changes for if Mac OS (mainly in tabbed slider navigation)-->    
    <script src="js/if-mac.js" type="text/javascript"></script>    
    

    
<!--START Large Add Script-->
<script type="text/javascript" src="js/jquery.content.changer.js"></script>
<script type="text/javascript">
$(function() {
	$('#divindiv').contentChanger({
		animationDuration: 400
	});
	$('#divindiv2').contentChanger({
		animationDuration: 400
	});
	$('#divindiv3').contentChanger({
		animationDuration: 400
	});
	$('#divindiv4').contentChanger({
		animationDuration: 400
	});
});
</script>


<script type="text/javascript">
		document.documentElement.className += " js-enabled";
</script>
<!--END Large Add Script-->

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

    <script type="text/javascript">
		$(document).ready(function(){
		$("#expanderHead").click(function(){
		$("#expanderContent").slideToggle();
		if ($("#expanderSign").text() == "Filter Results"){
			$("#expanderSign").html("Close Filters")
		}
		else {
			$("#expanderSign").text("Filter Results")
			}
		});
	});
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

	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>

<div id="overlay" style="display:none"></div>

<!-- END VIEW COUPON PAGE ADD-ONS -->

<div id="container">
<div id="page-top-push"></div>
<div id="main-column">

<div id="merch-dash-header">

<?php
//View coupon
$couzoo->DBLogin();
$id_user = $couzoo->GetUser();

$coupon = mysql_fetch_array(mysql_query("SELECT *, CouZoo_Coupons.description AS coupon_desc FROM CouZoo_Coupons, CouZoo_Members WHERE CouZoo_Coupons.id_coupon = '$id_coupon' AND CouZoo_Coupons.id_user = CouZoo_Members.id_user"));

// Grab the datbase data and outputs the information on the page - Grabs the coupon info first
$title = $coupon['title'];
$price = $coupon['price'];
$posting_date = $coupon['posting_date'];
$removal_date = $coupon['removal_date'];
$max_purchases = $coupon['max_purchases'];
$max_purchases_num = $coupon['max_purchases_num'];
$valid_date = $coupon['valid_date'];
$exp_date = $coupon['exp_date'];
$coupontrictions = $coupon['coupontrictions'];
$description = $coupon['coupon_desc'];
$couponLat = $coupon['latitude'];
$couponLong = $coupon['longitude'];

$dist = $couzoo->getDistance($userLong, $userLat, $couponLong, $couponLat);
$distance = round($dist, 2);
$unit = "miles";

// Grab the datbase data and outputs the information on the page - Grab the company info next
$phone = $coupon['phone'];
$website = $coupon['website'];
$address = $coupon['address'];
$city = $coupon['city'];
$state = $coupon['state'];
$zip = $coupon['zip'];
$link = $coupon['link'];

$i=0;

include ("coupon.php");
?>

</div>

<!--below script is for accordion coupons-->
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript">
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","h3",0,0, 'selected');
</script>
<!--End Coupons-->

</div><!--end main-column-->

<!--start right side column-->
<div id="side-column">

<!--START Side AD-->
	<?php include ("coupons-side.php"); ?>
<!--END side AD-->

</div><!--END right side column-->

</div><!--end container-->
<br clear="all"/>


<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

</body>
</html>