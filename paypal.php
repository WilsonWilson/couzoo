<?php
include("includes/paypal.php");
$pp = new PayPal();

$url = $pp->host.'/v1/oauth2/token'; 
$postArgs = 'grant_type=client_credentials';
$token = $pp->get_access_token($url,$postArgs);
$url = $pp->host.'/v1/payments/payment';
$payment = array(
		'intent' => 'sale',
		'payer' => array(
			'payment_method' => 'credit_card',
			'funding_instruments' => array ( array(
					'credit_card' => array (
						'number' => '5500005555555559',
						'type'   => 'mastercard',
						'expire_month' => 12,
						'expire_year' => 2018,
						'cvv2' => 111,
						'first_name' => 'Robert',
						'last_name' => 'Arone'
						)
					))
			),
		'transactions' => array (array(
				'amount' => array(
					'total' => '5.55',
					'currency' => 'USD'
					),
				'description' => 'payment by a credit card using a test script'
				))
		);
$json = json_encode($payment);
$json_resp = $pp->make_post_call($url, $json);

// Get CC Info for storage
$cc = $json_resp['payer']['funding_instruments'][0]['credit_card'];
	$cc_type = $cc['type'];
	$cc_num = $cc['number'];
	$cc_exp_month = $cc['expire_month'];
	$cc_exp_year = $cc['expire_year'];
	$cc_first = $cc['first_name'];
	$cc_last = $cc['last_name'];

// Return payment info
echo "<b>Payment ID:</b> ".$json_resp['id']."<br>";
echo "<b>Biller's Name:</b> ".$cc_first." ".$cc_last."<br>";
echo "<b>Credit Card Type:</b> ".$cc_type."<br>";
echo "<b>Credit Card Number:</b> ".$cc_num."<br>";
echo "<b>Credit Card Expiration Month:</b> ".$cc_exp_month."<br>";
echo "<b>Credit Card Expiration Year:</b> ".$cc_exp_year."<br>";