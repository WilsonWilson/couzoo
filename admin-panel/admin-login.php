<?php
require_once("../includes/config.php");

session_start();
if (!isset($_SESSION['id_user']))
{
	// Not logged in at all -- redirect them to where they belong
       header("Location: ".SITE_LOC."index.php");
       exit;
}
elseif(isset($_SESSION['id_user']) && isset($_SESSION['admin_access']))
{
	// Valid admin user, redirect them to admin home
       header("Location: ".SITE_LOC . ADMIN_LOC."index.php");
       exit;
}

if(isset($_POST['submitted']))
{
   if($couzoo->AdminLogin())
   {
   	$url = "index.php";
	$couzoo->RedirectToURL("$url");
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Administrator Login</title>
      <link rel="stylesheet" type="text/css" href="css/admin.css" />
      <link rel="stylesheet" type="text/css" href="../css/login-page.css" />
      <link rel="stylesheet" href="../css/style.css" type="text/css" /><!--gerneral-->
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 

</head>
<body>

<?php include ("header.php") ?>

<table id='login-bg'>
<div id='login_page'>
<form id="login_form" action='<?php echo $couzoo->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset>
<legend>Administrator Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='merchant' id='merchant' value='admin' />

<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>

<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
	<div class="submit-btn"></div>
	<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
</div>
</fieldset>
</form>

</div>
</table>

</body>
</html>

<script>
$('.submit-btn').click(function() {
	$('#login_form').submit();
});
</script>