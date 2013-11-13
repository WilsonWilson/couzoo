<?php
require_once("includes/config.php");
require_once("includes/location.php");

$couzoo->CheckLogin();

$link = mysql_real_escape_string($_GET['bname']);

$bus = mysql_query("SELECT * FROM CouZoo_Members WHERE link = '$link' AND merchant = 'yes'");
$res = mysql_fetch_array($bus);
$valid = mysql_num_rows($bus);

if (!$valid) { header('Location: results.php'); }

$id_merchant = $res['id_user'];

$views = mysql_query("UPDATE CouZoo_Members SET profile_views = profile_views + 1 WHERE id_user = '$id_merchant'");
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php") ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START VIEW MERCH PAGE ADD-ONS -->

<!--[if IE]>
<style type='text/css'>
* html .myButton { display:inline; }  /* hack per IE 6 */
* + html .myButton { display:inline; }  /* hack per IE 7 */
</style>
<![endif]-->	

    <!--Form Highlighter plugin-->
    <script src="js/jquery.formHighlighter.js" type="text/javascript"></script>

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

<!--START OPEN and CLOSE ALL SIDE BUTTON-->
<?php include ("open-close-all-tab.html") ?>
<!--END OPEN and CLOSE ALL SIDE BUTTON-->

<link rel="stylesheet" href="css/create-coupon.css" type="text/css"/>

<!-- END VIEW MERCH PAGE ADD-ONS -->


<div id="container">

<div id="page-top-push"></div>

<div id="main-column">

<!--Start Merchant Header-->
<div id="merch-dash-header-container">
<div id="merch-dash-header">

<?php
//Get Coupon Data
$couzoo->DBLogin();

$qry = "SELECT * FROM CouZoo_Members WHERE id_user = '$id_merchant'";
$result = mysql_query($qry);
$row = mysql_fetch_assoc($result);

	$bname = $row['bname'];
	$address = $row['address'];
	$city = $row['city'];
	$state = $row['state'];
	$zip = $row['zip'];
	$phone = $row['phone'];
	$website = $row['website'];
	$cDescription = $row['description'];
	$prof_img = $row['image'];
	$email = $row['email'];
	$prof_views = $row['profile_views'];
	$link = $row['link'];
	$jdate = $row['joined_date'];
	$last_upd = strtotime($row['last_update']);

$jdate = new DateTime($jdate);
$formatted_jdate = $jdate->format("n/j/Y");

$liveNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_merchant' AND status = 'live'"));
$expNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_merchant' AND status = 'ended'"));
$totalNum = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Coupons WHERE id_user = '$id_merchant'"));

if (!$cDescription) { $cDescription = "This company has not filled out a company description yet."; }

?>

<h1><?=$bname?></h1>

<div class="merch-profile-live-container">
<div class="merch-profile-live-copy">coupons<br/>live</div>
<div class="merch-profile-live-box">
<div class="merch-profile-live-number"><?=$liveNum?></div>
</div><!--End merch-profile-live-box-->
</div><!--End merch-profile-live-container-->

<div class="merch-profile-left-column">
<div class="merch-profile-image">
  <img src="uploads/merchants/<?=$prof_img?>?<?=$last_upd?>" />
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
<div class="merch-profile-member-since">profile views:&nbsp;<span><?=$prof_views?></span></div>
<div class="merch-profile-live-coupons-2">total live coupons:&nbsp;<span><?=$liveNum?></span></div>
<div class="merch-profile-expired-coupons">total expired coupons:&nbsp;<span><?=$expNum?></span></div>
<div class="merch-profile-total-coupons">total coupons:&nbsp;<span><?=$totalNum?></span></div>
</div>
<br clear="all"/>
</div><!--END merch-profile-left-column-->

<div class="merch-profile-right-column">
	<?=$cDescription?>
</div><!--END merch-profile-right-column-->


<br clear="all"/>



</div><!--END merch-dash-header -->
</div><!--END merch-dash-header-container -->


<div class="merch-profile-select-box">

						<div style="margin:10px;"><div style="float:left;"><span class="step-copy" style="padding-top:18px; margin:-2px 0px 0px 10px; color:#f26625">Show:</span></label></span>
                        <div class="merch-profile-show">
                        <select>
                          <option>All Live Coupons</option><br />
                          <option>All Expired Coupons</option><br />
                          <option>All Coupons</option><br />
                        </select>
                        </div>
                        </div>
                        </div>                        
                        
                        <div class="merch-profile-select-spacer"></div>
                        
                        <div style="margin:10px;"><div style="float:left;"><span class="step-copy" style="padding-top:18px; margin:-2px 0px 0px 10px; color:#f26625">Order by:</span></label></span>
                        <div class="merch-profile-order">
                        <select>
                          <option>Time Left</option><br />
                          <option>Distance</option><br />
                          <option>Coupon Price</option><br />
                          <option>Sale Price</option><br />
                        </select>
                        </div>
                        </div>
                        </div>
                        
                        <div class="merch-profile-select-spacer"></div>                        
                        
                        <div style="margin:10px;"><div style="float:left;"><span class="step-copy" style="padding-top:18px; margin:-2px 0px 0px 10px; color:#f26625">Display:</span></label></span>
                        <div class="merch-profile-display">
                        <select>
                          <option>5</option><br />
                          <option>10</option><br />
                          <option>20</option><br />
                        </select>
                        </div>
                        </div>
                        </div>
                        
</div><!--merch-profile-select-box-->
    
<!-- Start Expired Coupons -->
            <?php include ("coupons-view-merchant.php") ?>
<!-- End Expired Coupons -->

<br clear="all"/>

</div><!--END MAIN-COLUMN-->


<div id="side-column"><!--start right side column-->
</div><!--END right side column-->

<div class="push-box"></div><!--Required for Chrome and Safari to format tabbed box over footer properly-->
<div class="push"></div><!--Required for Chrome and Safari to format all content over footer properly-->
</div><!--end container-->

<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php") ?>
<!--END FOOTER-->

<!--For Accordion coupons pods-->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript"><!--normal, for live section-->
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc", "h3", 0,-1, 'selected');

var expiredAccordion=new TINY.accordion.slider("expiredAccordion");
expiredAccordion.init("accx", "h3", 0,-1, 'selected');

var savedAccordion=new TINY.accordion.slider("savedAccordion");
savedAccordion.init("accs", "h3", 0,-1, 'selected');
</script>

<!--End Accordion coupons pods-->


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
<!--END For div content changer box (must be just above body closing tag-->     
</body>
</html>
