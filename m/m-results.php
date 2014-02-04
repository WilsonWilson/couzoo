<?php
// include mobile header
include ("m-header.php");

if (isset($_POST['location']))
{
    $keywords = trim($_POST['search']);
    $distance = trim($_POST['distance']);
    $time = trim($_POST['time']);
    $sales = trim($_POST['sales']);
}
else 
{
    $keywords = trim($_GET['search']);
    $distance = trim($_GET['distance']);
    $time = trim($_GET['time']);
    $sales = trim($_GET['sales']);
}

//Set up search
$search = "coup.status = 'live'";
$sort_by = "distance, removal_date";
$order = "ASC";

//Get keywords for search terms
if ($keywords) {
	$kws = explode(" ", strtolower($keywords));
	foreach ($kws as $kw) {
		if (strlen(trim($kw)) > 0) {
		    $search .= " AND (lower(memb.city) LIKE '%$kw%' OR memb.zip = '$kw' OR lower(coup.title) LIKE '%$kw%' OR lower(coup.categories) LIKE '%$kw%' OR lower(coup.description) LIKE '%$kw%' OR lower(coup.keywords) LIKE '%$kw%')";
		}
	}
}

if ($distance || $time || $sales) { $filter = "HAVING distance"; }
if ($distance) { $filter .= " AND distance <= $distance"; }
if ($time) { $filter .= " AND days <= $time"; }
if ($sales) { $search .= " AND sales <= $sales"; }

$coup = mysql_query("SELECT *, $sqlDist AS distance, DATEDIFF(removal_date, now()) AS days FROM CouZoo_Coupons AS coup 
				   LEFT JOIN CouZoo_Members AS memb ON (coup.id_user = memb.id_user)
				   WHERE ".$search." ".$filter." ORDER BY ".$sort_by." ".$order." ");

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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<!--FOR FORM-->
<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
<script src="js/query.formHighlighterSettings.js" type="text/javascript"></script>
<script src="js/mobile-menu.js" type="text/javascript"></script>


<link type='text/css' href='css/login.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/mobile.css' rel='stylesheet' media='screen' />
    
</head>

<body>

<div class="page-overlay"></div>

<!-- START Modal Content "change email" -->
<div class="close-change-location-modal">close</div>
<div class="change-locaton-container">
    <div class="change-locaton-inner-container">
    <h2>Change Location</h2>
        <div id="m-advancedCall2">
                <form method="POST" id="change_location" name="location">
		      <input type="hidden" name="location" value="true">
		      <input type="hidden" name="search" value="<?=$keywords?>">
		      <input type="hidden" name="distance" value="<?=$distance?>">
		      <input type="hidden" name="time" value="<?=$time?>">
		      <input type="hidden" name="sales" value="<?=$sales?>">
                    <input class="changeLocationField" type="text" name="address" placeholder="enter zip code or city name" />					
                </form>
                <br />
        </div>
        <div class="m-find-button-contianer">
            <div class="m-change-location-button">
               <a href="#"> <div id="change_loc" class="use-this-coupon">change location</div></a>
            </div>
        </div><!--end use now button container-->
    </div>
</div><!--END Change Location Container-->
<!-- END Modal Content -->

<!-- START Modal Content "change email" -->
<div class="close-change-location-modal2">close</div>
<div class="change-locaton-container2"style="margin-top:10%;">
    <div class="change-locaton-inner-container">
        <h2>Filter Results</h2>
            <div id="m-advancedCall">
 <form method="GET" id="search_options" name="search">
 <input type="hidden" name="search" value="<?=$keywords?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="12">
  <tr>
    <td class="filter-title" style="font-size:3.2em;">Distance</td>
    <td>
    <select name="distance" style="width:100%;">
                          <option value="">Any Distance</option><br />                        
                          <option value=".5" <?php if ($distance == ".5") { echo "SELECTED"; } ?>>1/2 mile or less</option><br />
                          <option value="1" <?php if ($distance == "1") { echo "SELECTED"; } ?>>1 mile or less</option><br />
                          <option value="3" <?php if ($distance == "3") { echo "SELECTED"; } ?>>3 miles or less</option><br />
                          <option value="5" <?php if ($distance == "5") { echo "SELECTED"; } ?>>5 miles or less</option><br />
                          <option value="10" <?php if ($distance == "10") { echo "SELECTED"; } ?>>10 miles or less</option><br />
                          <option value="20" <?php if ($distance == "20") { echo "SELECTED"; } ?>>20 miles or less</option><br />                                                                        
                          <option value="50" <?php if ($distance == "50") { echo "SELECTED"; } ?>>50 miles or less</option><br />                       
    </select>
    </td>
  </tr>
  <tr>
    <td class="filter-title" style="font-size:3.2em;">Time Left</td>
    <td>
    <select name="time" style="width:100%;">
                          <option value="">Any Day</option><br />                        
                          <option value="1" <?php if ($time == "1") { echo "SELECTED"; } ?>>1 Day or less</option><br />
                          <option value="3" <?php if ($time == "3") { echo "SELECTED"; } ?>>3 Days or less</option><br />
                          <option value="5" <?php if ($time == "5") { echo "SELECTED"; } ?>>5 Days or less</option><br />
                          <option value="15" <?php if ($time == "15") { echo "SELECTED"; } ?>>15 Days or less</option><br />
                          <option value="30" <?php if ($time == "30") { echo "SELECTED"; } ?>>30 Days or less</option><br />                                                                      
    </select>
    </td>
  </tr>
  <tr>
    <td class="filter-title" style="font-size:3.2em;">Sales Left</td>
    <td>
    <select name="sales" style="width:100%;">
                          <option value="">Sales: </option><br />
                          <option value="1" <?php if ($sales == "1") { echo "SELECTED"; } ?>>10 or less</option><br />
                          <option value="2" <?php if ($sales == "2") { echo "SELECTED"; } ?>>25 or less</option><br />
                          <option value="3" <?php if ($sales == "3") { echo "SELECTED"; } ?>>50 or less</option><br />
                          <option value="4" <?php if ($sales == "4") { echo "SELECTED"; } ?>>100 or less</option><br />
                          <option value="5" <?php if ($sales == "5") { echo "SELECTED"; } ?>>250 Days or less</option><br />                                                                        
                          <option value="6" <?php if ($sales == "6") { echo "SELECTED"; } ?>>More than 250</option><br />
    </select>
    </td>
  </tr>
</table>
                
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div id="filter_results" class="use-this-coupon">filter results</div>
               </a>
            </div>
        </div><!--end use now button container-->
    </div><!--end change-locaton-inner-container-->
</div><!--END Change Location Container-->
<!-- END Modal Content -->

</form>

<!-- START Modal Content "change email" -->
<div class="close-change-location-modal3">close</div>
<div class="change-locaton-container3"style="margin-top:15%;">
    <div class="change-locaton-inner-container">
        <h2>Search Coupons</h2>
            <div id="m-advancedCall3">
		 <form action="" method="GET" id="keyword_search" name="kw_search">
		    <input type="hidden" name="distance" value="<?=$distance?>">
		    <input type="hidden" name="time" value="<?=$time?>">
		    <input type="hidden" name="sales" value="<?=$sales?>">
                  <input type="text" name="search" <?=$keywords ? "value='".$keywords."'" : "placeholder='what are you looking for'";?>" />
		 </form>
            </div>        
        
        <br clear="all"/>
    
        <div class="m-use-now-button-contianer">
            <div class="m-use-now-button" style="width:100%;">
               <a href="#">
                <div id="search_btn" class="use-this-coupon">search</div>
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
    
    <div class="m-use-page-title"><?=$keywords?></div>
    
    <div class="m-home-btn-container">
        <div id="home-btn">
       		<a href="index.php"><img src="m-images/m-home.png" /></a>
        </div>
    </div>
</div>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include("m-mobile-menu.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account--
<!--END TOP BAR & MENU-->

<div class="container">

<?php
$i=0;
while ($c = mysql_fetch_array($coup)):

$distance = round($c['distance'], 2);
$unit = "miles";

$now = date('Y-m-d');

$end = strtotime($c['removal_date']);
$nowsec = time();
$rdays = $end - $nowsec;
$daysleftR = ceil($rdays/86400);

if ($daysleftR > 1) { $daypluralR = "Days"; } else { $daypluralR = "Day"; }
?>

            <!--Start Coupon-->
            <div class="m-result-container">
                <a href="m-coupon.php?id=<?=$c['id_coupon']?>">
                <div class="m-result-coupon-container">
                    <div class="m-result-coupon-title"><?=$c['title']?></div>
                    <div class="m-result-content-container">
                    
                    <div class="m-result-image-container">
                          <img src="../../uploads/coupons/<?=$c['id_coupon']?>.jpg?<?=strtotime($c['cdate'])?>" />
                        </div>
                    
                  <div class="m-results-price-box-container price-box-<?=$c['price']?>-dollar">
                            <div class="m-results-price">
                            $<?=$c['price']?>
                            </div>
                        </div><!--end m-use-button-container-->
                        
                        <div class="m-more-arrow"><img src="m-images/m-results-arrow.png" width="47" height="150" /></div>
                    </div><!--end m-use-content-container-->
                    
                    <div class="m-results-expires-on">Removed in: 
                        <span class='ends-in-numbers'><?=$daysleftR?> <?=$daypluralR?></span>
                        

<?php
if ($c['max_purchases'] == "1")
    {
        echo "&nbsp;or&nbsp;<span class='ends-in-numbers'>".$c['max_purchases_num']." Sales</span>";
    }
?>
                    </div><!--end m-reuslts-expires-on-->
                    
                    <div class="m-results-distance">Distance: <span class="distance-number"><?=$distance?> <?=$unit?></span></div>
                    
                    <br clear="all"/>
                </div><!--end m-results-coupon-container-->
                </a>
            </div><!--end m-results-container-->
            <!--END Coupon-->
<?php 
    $i++;
    endwhile;

    if ($i < 1)
    {
  	echo '<div class="m-use-container"><div class="m-use-coupon-container"><center>We could not find any coupons with this search criteria. Please broaden your search!</center></div></div>';
    }
?>


<div class="bottom-nav-fixed-push"></div>
</div><!--End Container-->

<!--Start Bottom nav-->
<div class="bottom-nav-fixed">
    <div class="bottom-nav-container">
        <a class="search-btn" href="#"><img src="m-images/search-icon.png" /></a>
        <a class="view-my-account-btn" href="#"><span style="color:#FFF; font-size:3em;">Filter Results</span></a>
        <a class="change-location-btn" href="#"><span style="color:#FFF; font-size:3em;">Change Location</span></a>
    </div><!--End bottom-nav-container-->
</div><!--End bottom nav-->

<script type="text/javascript">
		$(".search-btn").click(function(){
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
		$(".view-my-account-btn").click(function(){
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
<script type="text/javascript"><!--Toggle MErche Center Home Button-->
		$(".change-location-btn").click(function(){
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
		
		
		$('.changeLocationField').keydown(function(){
			$('.page-overlay').css('height', '110%');
	});		
</script>

<script>
$('#change_loc').click(function() {
	$('#change_location').submit();
});

$('#filter_results').click(function() {
	$('#search_options').submit();
});

$('#search_btn').click(function() {
	$('#keyword_search').submit();
});

$('form').submit(function(){
    	$(this).children('input[value=""]').prop('disabled', 'disabled');
    	$('select').children('option[value=""]').prop('disabled', 'disabled');
});

</script>
</body>
</html>
