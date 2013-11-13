<?php
require_once("includes/config.php");

if(isset($_POST['submitted']))
{
   if($couzoo->Login())
   {
   	$url = "customer-dash.php";

	if ($_SESSION['url'] == "/login-customer.php") {}
	elseif (isset($_SESSION['url']))  {
   		$url = $_SESSION['url'];
	}
	
	$guest_id = $id_user;
	$id_user = $couzoo->GetUser();

	$checkCart = mysql_query("SELECT id_coupon FROM CouZoo_Cart WHERE id_user = '$guest_id'");
	while ($cart = mysql_fetch_array($checkCart)) {
		$checkUser = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cart WHERE id_user = '$id_user' AND id_coupon = '$cart[id_coupon]'"));
		if (!$checkUser) {
			$transferCartItems = mysql_query("INSERT INTO CouZoo_Cart (id_user, id_coupon) VALUES ('$id_user', '$cart[id_coupon]')");
		}
	}

	$checkWatch = mysql_query("SELECT id_coupon FROM CouZoo_Watch WHERE id_user = '$guest_id'");
	while ($watch = mysql_fetch_array($checkWatch)) {
		$checkUser = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Watch WHERE id_user = '$id_user' AND id_coupon = '$cart[id_coupon]'"));
		if (!$checkUser) {
			$transferWatchItems = mysql_query("INSERT INTO CouZoo_Watch (id_user, id_coupon) VALUES ('$id_user', '$cart[id_coupon]')");
		}
	}

	$delCart = mysql_query("DELETE FROM CouZoo_Cart WHERE id_user = '$guest_id'");
	$delWatch = mysql_query("DELETE FROM CouZoo_Watch WHERE id_user = '$guest_id'");

	setcookie('CouZoo_guest_id', '', strtotime( '-30 days' ) );

	$couzoo->RedirectToURL("$url");
  }
}
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<!--For div content changer box -->
   
	<script src="js/jquery.formHighlighter.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/LXP.js"></script>
    <script type="text/javascript" src="js/browser-select.js"></script>    

<!--[if IE]>
<style type='text/css'>
* html .myButton { display:inline; }  /* hack per IE 6 */
* + html .myButton { display:inline; }  /* hack per IE 7 */
</style>
<![endif]-->	

    <!--Demo examples-->
    <script type="text/javascript">
        $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 1.0);
            }
            function demoFocus(element) {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 0.5);
            }
        }); 
    </script>
    
      <script type="text/javascript" src="js/jquery.validate.js"></script>


<div id="container">

<div id="page-top-push"></div>

<div id="main-column">

<!--Start Merchant Header-->
<div id="merch-dash-header-container">
<div id="merch-dash-header">

<h1>Account Info</h1>



</div><!--END merch-dash-header -->


<!--START LXP -->
<div id="le-tabs" class="example3 oldlook animSpeed-200 direction-horizontal  autoOrder-false autoplayInterval-0">
			
			<div id="le-tabs_tab_container">
				<a href="#content-1" id="first_tab" class="tab-1x3 box-trigger" data-activates="defualt">log-in to purchase</a>
				<a href="#content-2" class="tab-2x3 box-trigger" data-activates="defualt2">sign up to purchase</a>
                <a href="#content-3" class="tab-3x3 box-trigger" data-activates="seventh">purchase as guest</a>
            </div>

		<div id="advancedCall">
		<form style="" id="form1" action="" name="advancedCall">

			<div id="le-tabs_content_container">
				<div id="le-tabs_content_inner">
				  
					<div id="content-1" class="le-tabs_content cart-account-height">
						<div id="tab-1-top-x3"></div>
                       	 <h2 class="orange-header">Already have an account, Log-in here to purchase.</h2>
                            <div class="sign-in-column-left">
                               <input class="myclass" type="text" name="customerEmail" value="email" /><br />
                               <input class="myclass" type="text" name="customerPassword" value="password" /> <br>
                               <div style="height:6px;"></div>
							   <div class="login-btn"></div>
                            </div>
					</div><!--End Box 1-->
                                       


                    <div id="content-2" class="le-tabs_content cart-account-height">
                      <div id="tab-2-top-x3"></div>
                    	<h2 class="brown-header">Don't have an account, sign up now and purchase.</h2>
                            <div class="sign-in-column-left">
                            	<h2 class="brown-header">Account Info</h2>
                                <input class="myclass" type="text" name="customerFName" value="first name" /><br>
                                <input class="myclass" type="text" name="customerLName" value="last name" /><br><br>
                                
                                <input class="myclass" type="text" name="customerEmail" value="email" /><br>
                                <input class="myclass" type="text" name="customerEmail" value="confirm email" /><br><br>  
                                                     						
                                <input class="myclass" type="text" name="customerPassword" value="create password"/><br>
                                <input class="myclass" type="text" name="customerPassword" value="confirm password"/><br />
                                
                            </div>
                            
                            <div class="sign-in-column-right">
                            	<h2 class="brown-header">Billing Info</h2>
                            	<input class="myclass" type="text" name="customerCardNumber" value="credit/debit card number" /><br>
                                <input class="myclass" type="text" name="customerCardName" value="cardholder name" /><br><br>
                                
                                <input class="myclass" type="text" name="customerCardSecurityCode" value="security code" style="width:140px;" /><br />

                                <input class="myclass" type="text" name="customerCardExpMonth" value="exp month" style="width:140px; margin-right:10px;"/>
								<input class="myclass" type="text" name="customerCardExpYear" value="exp year" style="width:140px;"/><br><br>
                                                                         						
                                <input class="myclass" type="text" name="customerBillingAddress" value="billing address"/>
                                <input class="myclass" type="text" name="customerBillingCity" value="city" style="width:195px; margin-right:10px;"/>
                                <input class="myclass" type="text" name="customerBillingState" value="state" style="width:85px;"/>
                                <input class="myclass" type="text" name="customerBillingZip" value="zip" style="width:140px;"/><br />
                                <div style="height:6px;"></div>
							   <div class="register-btn "></div>
                            </div>
                    </div><!--End Box 2-->
                     
                                       
                    
                    <div id="content-3" class="le-tabs_content merchant-3b-height">
                        <div id="tab-3-top-x3"></div>
                            <h2 class="aqua-header">Don't have an account and don't want one. No worries, purchase as a guest.</h2>
                            <div class="sign-in-column-left">
                            	<input class="myclass" type="text" name="customerFName" value="first name" /><br>
                                <input class="myclass" type="text" name="customerLName" value="last name" /><br><br>
                                
                                <input class="myclass" type="text" name="customerEmail" value="email" /><br>
                                <input class="myclass" type="text" name="customerEmail" value="confirm email" /><br><br>  
                                
                            </div>
                            
                            <div class="sign-in-column-right">
                            	<input class="myclass" type="text" name="customerCardNumber" value="credit/debit card number" /><br>
                                <input class="myclass" type="text" name="customerCardName" value="cardholder name" /><br><br>
                                
                                <input class="myclass" type="text" name="customerCardSecurityCode" value="security code" style="width:140px;" /><br />

                                <input class="myclass" type="text" name="customerCardExpMonth" value="exp month" style="width:140px; margin-right:10px;"/>
								<input class="myclass" type="text" name="customerCardExpYear" value="exp year" style="width:140px;"/><br><br>
                                                                         						
                                <input class="myclass" type="text" name="customerBillingAddress" value="billing address"/>
                                <input class="myclass" type="text" name="customerBillingCity" value="city" style="width:195px; margin-right:10px;"/>
                                <input class="myclass" type="text" name="customerBillingState" value="state" style="width:85px;"/>
                                <input class="myclass" type="text" name="customerBillingZip" value="zip" style="width:140px;"/><br />
                                <div style="height:6px;"></div>
							   <div class="continue-btn "></div>                
                       </div>
                   </div><!--End Box 2-->                    
                                        
                   
                    <br clear="all"/><br clear="all"/>
                                                 
               </div><!--END le-tabs_content_inner-->
          </div><!--le-tabs_content_container-->
    
    </form>
    </div><!--End Advanced Call-->
          
		</div><!--END merch-dash-container-->         
		<br clear="all"/>
	</div>
</div><!--END MAIN-COLUMN-->




<div id="side-column"><!--start right side column-->

</div><!--END right side column-->
<div class="push-box"></div>
<div class="push"></div>
</div><!--end container-->
<br clear="all"/>

<!--START FOOTER-->
	<?php include ("footer.php"); ?>
<!--END FOOTER-->

</body>
</html>
