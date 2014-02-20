<?php
$preBetaMerchName = $_POST['preBetaMerchName'];
$preBetaMerchContact = $_POST['preBetaMerchContact'];
$preBetaMerchEmail = $_POST['preBetaMerchEmail'];

$preBetaUsedBefore = $_POST['preBetaUsedBefore'];
$preBetaCompanyBefore = $_POST['preBetaCompanyBefore'];
$preBetaUsedHappy = $_POST['preBetaUsedHappy'];
$preBetaMerchComments = $_POST['preBetaMerchComments'];

//Start Email info
$formcontent="
Business Name: $preBetaMerchName \n
Contact Name: $preBetaMerchContact \n
Email Address: $preBetaMerchEmail \n
Used a GOW before: $preBetaUsedBefore \n
GOW Used: $preBetaCompanyBefore \n
Happy with $preBetaCompanyBefore: $preBetaUsedHappy \n
Comments: $preBetaMerchComments \n
";

$recipient = "customer-info@couzoo.com, pete@mymettle.com";
$subject = "Interested Merchant";
$mailheader = "From: $preBetaMerchName \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header( 'Location: beta-access-merchant-thank-you' ) ;
?>