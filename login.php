<?php
require_once("includes/config.php");

//echo $_POST['email']."<br>";
//echo $_POST['password'];

if(isset($_POST['submitted']))
{
   if($couzoo->Login())
   {
   	if ($_SESSION['user_merchant'] == 'yes') {
           $url = "merchant-dash.php";
	} else {
 	    $url = "customer-dash.php";
	}

	if ($_SESSION['url'] == "/login.php") {}
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


<!-- START LOGIN PAGE ADD-ONS -->

    <link rel="STYLESHEET" type="text/css" href="css/login-page.css" />
    <link type='text/css' href='css/login.css' rel='stylesheet' media='screen' /><!--Login-->

<!-- END LOGIN PAGE ADD-ONS -->


<div id='login_page'>
<form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset>
<legend>CouZoo Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

<div class='container'>
    <label for='email' >E-mail:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $couzoo->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
	<div class="submit-btn"></div>
	<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
</div>
<div class='short_explanation'><a href='reset-password.php'>Forgot Password?</a></div>
<br>
<div class='short_explanation'>
    <a href='register-customer.php'>Customer Sign-up</a>
    <a href='register-merchant.php' style='float: right'>Merchant Sign-up</a>
</div>
</fieldset>
</form>

</div>

</body>
</html>

<script>
$('.submit-btn').click(function() {
	$('#login_form').submit();
});
</script>

