<?php
require_once("includes/config.php");
$couzoo->CheckLogin();
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<div id="container">

<div id="page-top-push"></div>

<div id="main-column">



<!--Start Merchant Header-->
<div id="general-page-container">
<div id="general-page-header">

<h1>Contact CouZoo</h1>

<p>
Hi there. It's a pleasure to have you  at CouZoo. We hope you're enjoying your visit. We  think customers and merchants are getting a raw deal when it comes to online coupon buying and selling so we  created an easier, friendlier, and cost effetive way of doing it - CouZoo. Tell us what you think and if you have any ideas that would help make CouZoo a better place tell us those too. We're up for being a better place in any way we can. 
Thanks!</p>
<div style="margin:15px;">
<div id="advancedCall2">
                <form action="" name="homeSearch">
                    <input style="width:332px; margin:0px 10px 0px 2px;" type="text" name="contactCouzoo" value="your email" />
                    <input  style="width:332px;" type="text" name="contactCouzoo" value="your name" /><br />
                    <textarea type="text" value="Enter all coupon restrictions here"></textarea>
                </form>
                <div style="margin:4px 0px 0px 584px;">
                <div class="submit-btn"></div>
                </div>
                <p>Call us any time at 555.555.5555 or shoot us an email at <a href="mailto:people@couzoo.com">people@couzoo.com</a>.</p> 
</div>
</div>
</div><!--END general-page-header-->

</div><!--END general-page-container-->
       

</div><!--END MAIN-COLUMN-->


<div id="side-column"><!--start right side column-->
</div><!--END right side column-->


</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

<!--Help Modals-->
<!--#include virtual="help-create-a-coupon.html" -->
<!--End Help Modals-->


</body>
</html>
