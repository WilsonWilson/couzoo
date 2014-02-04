<div id="expanderContent" style="display:none">
	<div id="menu">
    	<ul>
	     <?php if(!$id_user):?>
                <li><a href="m-log-in.php">log in</a></li>
		  <li><a href="m-sign-up-customer.php">sign up</a></li>
		  <li><a href="m-sign-up-merchant.php">sign up as a merchant</a></li>
	     <?php endif;?> 
                <li><a href="m-contact-us.php">contact us</a></li>
	     <?php if($id_user):?>
                <li><a href="m-merch-account.php">my account</a></li>
                <li><a href="m-edit-merch-profile.php">manage my profile page</a></li>
                <li><a href="m-merch-coupons.php">view my coupons</a></li>
                <li><a href="m-create-coupons.php">create a coupon</a></li> 
	     <?php endif;?>             
    	</ul>
    </div>
</div>