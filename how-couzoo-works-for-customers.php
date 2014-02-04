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
        <div class="how-it-works-head">
            <h1>How CouZoo Works</h1>
            <p>Simply search and save. With CouZoo you'll find tons of great local coupons and deals for a low, up-front cost.</p>
        </div><!--end how it works head-->
    </div><!--END MAIN-COLUMN-->
    
    <div class="how-it-works-customer-main">
    	<div class="hiw-line">
        	<div class="hiwc-step-1-image">
       	    	<img src="images/hiwc-1.png" alt="" width="343" height="288" />
            </div>
            <div class="hiwc-step-1-copy">
                <div class="hiw-step-number">1</div>
                <div class="hiw-copy">Search CouZoo for whatever type of coupon you are looking, restaurant, spa, gym, oil change, pizza, lawyer ...anything you want.</div>
            </div>
        </div>
        
        <br clear="all"/>
        
        <div class="hiw-line hiw-line-step-2">
            <div class="hiwc-step-2-copy">
                <div class="hiw-step-number">2</div>
                <div class="hiw-copy">Buy the coupon you like for $1 to $5 up-front or subscribe for $7.49 a month and get as many as you like for no additional cost.</div>
            </div>
            <div class="hiwc-step-2-image">
       	    	<img src="images/hiwc-2.png" alt="" width="468" height="245" />
            </div>
        </div>
        
        <br clear="all"/>
        
        <div class="hiw-line hiw-line-step-3">
        	<div class="hiwc-step-3-image">
       	    	<img src="images/hiwc-3.png" alt="" width="326" height="214" />
            </div>
            <div class="hiwc-step-3-copy">
                <div class="hiw-step-number">3</div>
                <div class="hiw-copy">Go to your the local establishment the your coupon is for.</div>
            </div>
        </div>
    
        <br clear="all"/>
        
        <div class="hiw-line hiw-line-step-4">
            <div class="hiwc-step-4-copy">
                <div class="hiw-step-number">4</div>
                <div class="hiw-copy">Whip out your smart phone, go to couzoo.com, and log into your account. Show the merchant your couzoo coupon.</div>
            </div>
            <div class="hiwc-step-4-image">
       	    	<img src="images/hiwc-4.png" alt="" width="298" height="291" />
            </div>
        </div>
        
        <br clear="all"/>
        
        <div class="hiw-line hiw-copy-step-5">
        	<div class="hiwc-step-5-image">
       	    	<img src="images/hiwc-5.png" alt="" width="205" height="304" />
            </div>
            <div class="hiwc-step-5-copy">
                <div class="hiw-step-number">5</div>
                <div class="hiw-copy">Purchase your item or service and pocket the savings.</div>
            </div>
        </div>
        
        <br clear="all"/>
        
        <div class="hiw-nav-container">
            <ul class="hiw-nav">
                <li><a href="" class="hiw-nav-sign-up">sign up now</a></li>
                <li><a href="" class="hiw-nav-search">search coupons</a></li>
            </ul>
        </div>
        
    	<br clear="all"/>
        
    </div><!--END full-width-main-->
    
    	<br clear="all"/>


</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

</body>
</html>
