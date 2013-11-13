<?php
require_once("includes/config.php");

if($couzoo->LoginCustomer())
	{
		echo "true";
}
else 	{
		echo "false";
}
?>