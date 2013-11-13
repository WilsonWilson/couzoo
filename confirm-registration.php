<?php
require_once("includes/config.php");
$couzoo->CheckLogin();
?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<div class="center-reg">

<?php
if(isset($_GET['code']))
{
   if($couzoo->ConfirmUser())
   {
	echo "Your registration with CouZoo is complete! Please login above to access your account.";
	die;
   }
}
?>


<h2>Confirm registration</h2>
<p>
Please enter the confirmation code in the box below
</p>

<!-- Form Code Start -->
<div id='login-page'>
<form id='confirm' action='<?php echo $couzoo->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* required fields</div>
<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Confirmation Code:* </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</form>
</div>
</div>

</body>
</html>