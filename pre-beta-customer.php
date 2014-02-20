<?php
$preBetaCustomerEmail = $_POST['preBetaCustomerEmail'];

//Start Email info
$formcontent="$preBetaCustomerEmail";

$recipient = "customer-info@couzoo.com, pete@mymettle.com";
$subject = "Interested Customer";
$mailheader = "From: $preBetaCustomerEmail \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header( 'Location: beta-access-customer-thank-you' ) ;
?>