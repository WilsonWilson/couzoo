<?php
require_once("includes/config.php");
require_once("includes/location.php");

$couzoo->CheckLogin();

$keywords = trim($_GET['search']);
$sort = trim($_GET['sort']);
$distance = trim($_GET['distance']);
$time = trim($_GET['time']);
$sales = trim($_GET['sales']);
$price = trim($_GET['price']);
$savings = trim($_GET['savings']);

?>
<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START RESULTS PAGE ADD-ONS -->


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
    
<!--For log-in (customer/merchant login/sign up) changer-->
    <script src="js/log-in-changer.js"></script>   


<div id="overlay" style="display:none"></div>

<!-- END RESULTS PAGE ADD-ONS -->


<div id="container">

<div id="page-top-push"></div>

<div id="main-column">

<!--Start search box-->
<div id="search-box-title">
<div id="search-results-title">Search Results
	<a href="results">clear all filters</a>
</div>  
<!--START STICKY-->
<div id="stickyheader">
  <div id="advancedCall">
    <form action="" name="pageSearch" id="filter">
        <input class="myclass" type="text" name="search" placeholder="search for coupons here" value="<?=$keywords?>" />
        <div class="search-btn"></div>
	 <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
        
        <div style="float:left; margin:-44px 0px 0px 475px; position:relative; z-index:999;">
        	
            	<div id="refine-box">
                	<h4 id="expanderHead" style="cursor:pointer;">
						<span id="expanderSign">Filter Results</span>
					</h4>
				</div>

                <div class="results-order"  style="float:right; position:relative; z-index:999;">
                    <select name="sort" id="sortCoupons">
                      <option value="" style="font-weight:bold;">Order by:</option><br />  
                      <option value="0" <?php if ($sort == "0") { echo "SELECTED"; } ?>>Best Match</option><br />  
                      <option value="removal_date" <?php if ($sort == "removal_date") { echo "SELECTED"; } ?>>Time Left</option><br />
                      <option value="distance" <?php if ($sort == "distance") { echo "SELECTED"; } ?>>Distance</option><br />
                      <option value="savings" <?php if ($sort == "savings") { echo "SELECTED"; } ?>>Savings</option><br />
                      <option value="price" <?php if ($sort == "price") { echo "SELECTED"; } ?>>Coupon Price</option><br />
                    </select>
                </div>
                
                
                
        </div>
            
  </div>
  <br clear="all"/>
  <div id="expanderContent" style="display:none; position:relative; z-index:999;">


<table width="600" border="0" cellspacing="0" style="text-align:left; margin:15px;">
  <tr>
    <th scope="col" width="235" style="text-align:left;" valign="top">
    			<div id="catagory-title"><h1>Location</h1></div><br />
                    <div id="advancedCallBrowse">
                                <input class="myclass" type="text" placeholder="enter location here" value="<?=$userLocation?>" /><br />
                    </div>
                <span id="footnote">(zip code / neighborhood / town / city)</span>
    </th>
                        
                        
    <th scope="col" style="padding-left:30px;" width="220" valign="top">
    <div id="catagory-title"><h1>Distance</h1></div>
                    	<br />
                         <div class="browse-dropdown-order">
                         <select name="distance">
                          <option value="">Any Distance</option><br />                        
                          <option value=".5" <?php if ($distance == ".5") { echo "SELECTED"; } ?>>1/2 mile or less</option><br />
                          <option value="1" <?php if ($distance == "1") { echo "SELECTED"; } ?>>1 mile or less</option><br />
                          <option value="3" <?php if ($distance == "3") { echo "SELECTED"; } ?>>3 miles or less</option><br />
                          <option value="5" <?php if ($distance == "5") { echo "SELECTED"; } ?>>5 miles or less</option><br />
                          <option value="10" <?php if ($distance == "10") { echo "SELECTED"; } ?>>10 miles or less</option><br />
                          <option value="20" <?php if ($distance == "20") { echo "SELECTED"; } ?>>20 miles or less</option><br />                                                                        
                          <option value="50" <?php if ($distance == "50") { echo "SELECTED"; } ?>>50 miles or less</option><br />                        
                        </select>
                        </div>
					<br /><br /><br />
			                    
                    <div id="catagory-title"><h1>Time Left</h1></div>
                   		 <br />
                         <div class="browse-dropdown-order">
                         <select name="time">
                          <option value="">Any Day</option><br />                        
                          <option value="1" <?php if ($time == "1") { echo "SELECTED"; } ?>>1 Day or less</option><br />
                          <option value="3" <?php if ($time == "3") { echo "SELECTED"; } ?>>3 Days or less</option><br />
                          <option value="5" <?php if ($time == "5") { echo "SELECTED"; } ?>>5 Days or less</option><br />
                          <option value="15" <?php if ($time == "15") { echo "SELECTED"; } ?>>15 Days or less</option><br />
                          <option value="30" <?php if ($time == "30") { echo "SELECTED"; } ?>>30 Days or less</option><br />                                                                        
                        </select>
                        </div>

                    <br /><br /><br />

                    <div id="catagory-title"><h1>Sales Left</h1></div>
                     <br />
                         <div class="browse-dropdown-order">
                         <select name="sales">
                          <option value="">Sales: </option><br />
                          <option value="1" <?php if ($sales == "1") { echo "SELECTED"; } ?>>10 or less</option><br />
                          <option value="2" <?php if ($sales == "2") { echo "SELECTED"; } ?>>25 or less</option><br />
                          <option value="3" <?php if ($sales == "3") { echo "SELECTED"; } ?>>50 or less</option><br />
                          <option value="4" <?php if ($sales == "4") { echo "SELECTED"; } ?>>100 or less</option><br />
                          <option value="5" <?php if ($sales == "5") { echo "SELECTED"; } ?>>250 Days or less</option><br />                                                                        
                          <option value="6" <?php if ($sales == "6") { echo "SELECTED"; } ?>>More than 250</option><br />
                        </select>
                        </div>
    </th>
    
     <th scope="col" style="padding-left:30px;" width="220" valign="top">
   					<div id="catagory-title"><h1>Coupon Price</h1>
                        <p style="line-height:18px; margin-bottom:4px;"><label for="amount"></label>
                        <input type="text" name="price" id="amount" value="<?=$price?>" style="border:0; color:#f26625; font-weight:bold;" />
                        </p>
                        <div id="coupon-price"></div>
                    </div>
                    
                    <br clear="all"/><br /><br />

                    <div id="catagory-title"><h1>Savings</h1>
                        <p style="line-height:18px; margin-bottom:4px;"><label for="amount2"></label>
                        <input type="text" name="savings" id="amount2" value="<?=$savings?>" style="border:0; color:#f26625; font-weight:bold;" />
                        </p>
                        <div id="savings-amount"></div>
                    </div>
    </th>

  </tr>
</table>

</form>
           
</div>  
</div>
<!--END STICKY-->

</div>
<!--END search box-->

<?php
//Set up search
$search = "CouZoo_Coupons.id_user = CouZoo_Members.id_user AND CouZoo_Coupons.status = 'live'";
$sort_by = "distance, removal_date";
$order = "ASC";

//Get keywords for search terms
if ($keywords) {
	$kws = explode(" ", strtolower($keywords));
	foreach ($kws as $kw) {
		if (strlen(trim($kw)) > 0) {
		    $search .= " AND (lower(CouZoo_Coupons.title) LIKE '%$kw%' OR lower(CouZoo_Coupons.categories) LIKE '%$kw%' OR lower(CouZoo_Coupons.description) LIKE '%$kw%' OR lower(CouZoo_Coupons.keywords) LIKE '%$kw%')";
		}
	}
}

//Order the data
if ($sort) {
	$sort_by = $sort;
}

//Specify sort order
if ($sort == "savings") {
	$order = "DESC";
}

if ($distance || $time || $sales) { $filter = "HAVING distance"; }
if ($distance) { $filter .= " AND distance <= $distance"; }
if ($time) { $filter .= " AND days <= $time"; }
if ($sales) { $search .= " AND sales <= $sales"; }

?>     
       
<!--START large-ad-container-->
	<?php
		$checkLarge = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Ads_Large WHERE status = 'live'"));
		if ($checkLarge) { include ("large-ad.php"); }
	?>
<!--END large-ad-container-->
          

<!--Start pods-->
	<?php include("coupons-result.php"); ?>
<!--END pods-->

<!--below script is for accordion coupons-->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","h3",0,-1, 'selected');
</script>
<!--End Coupons-->



</div><!--END MAIN-COLUMN-->



<!--start right side column-->
<div id="side-column">

<!--START Side AD-->
	<?php
		$checkSide = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Ads_Side WHERE status = 'live'"));
		if ($checkSide) { include ("coupons-side.php"); }
	?>
<!--END side AD-->

<!--START LXP -->
	<?php include ("lxp.php"); ?>
<!--END LXP -->


</div><!--END right side column-->


</div><!--end container-->
<br clear="all"/>


<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->


<!--START OPEN and CLOSE ALL SIDE BUTTON-->
	<?php include ("open-close-all-tab.html"); ?>
<!--END OPEN and CLOSE ALL SIDE BUTTON-->


<!--START OPEN and CLOSE ALL SIDE BUTTON-->
	<?php include ("includes/mini-cart.php"); ?>
<!--END OPEN and CLOSE ALL SIDE BUTTON-->


</body>
</html>

<script type="text/javascript">

$('#sortCoupons').change(function() {
         $(this).closest('form').trigger('submit');
});

$('form').submit(function(){
    	$(this).children('input[value=""]').prop('disabled', 'disabled');
    	$('select').children('option[value=""]').prop('disabled', 'disabled');
});

$('.search-btn').click(function() {
	$('#filter').submit();
});

</script>