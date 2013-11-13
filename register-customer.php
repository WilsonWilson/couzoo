<?php
require_once("includes/config.php");
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->


<!-- START CUST REG PAGE ADD-ONS -->

<link rel="STYLESHEET" type="text/css" href="css/login-page.css" />

<!-- END CUST REG PAGE ADD-ONS -->


<?php 
if(isset($_POST['submitted']))
{
   if($couzoo->RegisterCustomer())
   {
	echo "<div class='center-reg'> Thank you for registering with CouZoo. Please complete your registration by confirming your account.<br>
		An e-mail has been sent to you with further instructions.</div>";
	die;
   }
}
?>

<div id='login_page'>
<form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset>
<legend>Customer Registration</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='merchant' id='merchant' value='no' />

<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

<div class='container'>
    <label for='fname' >First Name:</label><br/>
    <input type='text' name='fname' id='fname' value='<?php echo $couzoo->SafeDisplay('fname') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='lname' >Last Name:</label><br/>
    <input type='text' name='lname' id='lname' value='<?php echo $couzoo->SafeDisplay('lname') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='email' >E-mail:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $couzoo->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <label for='confirm_email' >Confirm E-mail:</label><br/>
    <input type='text' name='confirm_email' id='confirm_email' value='<?php echo $couzoo->SafeDisplay('confirm_email') ?>' maxlength="50" /><br/>
    <span id="msgbox" style="display:none"></span>
    <span id='login_username_errorloc' class='error'></span>
<br/>
</div>
<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <label for='confirm_password' >Confirm Password:</label><br/>
    <input type='password' name='confirm_password' id='confirm_password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
	<div class="submit-btn"></div>
	<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
</div>
<div class='short_explanation'><a href='login-customer.php'>Customer Login</a>
<a href='register-merchant.php' style='float: right'>Merchant Sign-up</a></div><br>
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