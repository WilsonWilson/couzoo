<?php
require_once("includes/config.php");
$couzoo->CheckLogin();
?>

<style type="text/css">
.sign-in-nav-container{visibility:hidden !important;}
#footer-column{visibility:hidden !important;}
</style>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<style type="text/css">
.sign-in-nav-container{visibility:hidden !important;}
#footer-column{visibility:hidden !important;}
</style>

<div id="container">

    <div id="page-top-push"></div>
    
        <div id="main-column">
        
            <div class="welcome-customer-container-head">
                <h1>Thank you!</h1>
                <p>Thank you for expressing interest in CouZoo. We are launching CouZoo Beta soon and will be granting select individuals that have expressed interest, like yourself special early access to CouZoo.com. 
                <br><br>
                Talk to you soon.
                <br /><br />
                CouZoo
                </p>
            </div><!--end welcome-customer-container-head-->
        
        </div><!--END MAIN-COLUMN-->
    
    <div id="side-column"><!--start right side column-->
	</div><!--END right side column-->

</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

<script type="text/javascript">
var url = "http://www.couzoo.com";
var delay = "12000";

window.onload = function ()
{
    DoTheRedirect()
}
function DoTheRedirect()
{
    setTimeout(GoToURL, delay)
}
function GoToURL()
{
    // IE8 and lower fix
    if (navigator.userAgent.match(/MSIE\s(?!9.0)/))
    {
        var referLink = document.createElement("a");
        referLink.href = url;
        document.body.appendChild(referLink);
        referLink.click();
    }

    // All other browsers
    else { window.location.replace(url); }
}
</script>

</body>
</html>
