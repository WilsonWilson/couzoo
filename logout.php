<?php
require_once("includes/config.php");

$url = $_GET['return'];

$couzoo->LogOut();

$couzoo->RedirectToURL("$url");
exit;

?>

<!--START HEADER & Log-in, Log-out, Register, My Account-->
	<?php include ("header.php"); ?>
<!--END HEADER & Log-in, Log-out, Register, My Account-->

<h2>You have logged out</h2>
<p>
<a href='index.php'>Login Again</a>
</p>

</body>
</html>