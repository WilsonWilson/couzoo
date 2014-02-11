<div id="expanderContent" style="display:none">
	<div id="menu">
    	<ul>
         <?php if($id_user):?>
                <li><a href="">log out</a></li>
         <?php endif;?>
	     <?php if(!$id_user):?>
                <li><a href="m-log-in.php">log in</a></li>
                <li><a href="m-sign-up-customer.php">sign up</a></li>
                <li><a href="m-sign-up-merchant.php">sign up as a merchant</a></li>
	     <?php endif;?>         
                <li><a href="m-contact-us.php">contact us</a></li>
                <li><a href="index.php">search coupons</a></li>
	     <?php if($id_user):?>
                <li><a href="m-my-account.php">my account</a></li>
                <li><a href="m-my-coupons.php">my coupons</a></li>
                <li><a href="m-my-coupons.php">use a coupon</a></li>  
	     <?php endif;?>           
    	</ul>
    </div>
</div>