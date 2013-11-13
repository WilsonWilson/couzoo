<?php
require_once("includes/config.php");

$payer_id = $couzoo->SanitizeForSQL($_POST['payer_id']);
$id_card = $couzoo->SanitizeForSQL($_POST['id_card']);

switch ($_GET['q'])
{
	case "check_promo":
	{
	   	$code = $couzoo->SanitizeForSQL($_POST['code']);
		$promo_check = mysql_fetch_array(mysql_query("SELECT id FROM CouZoo_Promo_Codes WHERE code = '".$code."' LIMIT 1"));
		$valid_promo = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Promo_Codes WHERE id = '".$promo_check['id']."' AND status = 1 AND (max_uses > total_uses OR max_uses = 0) AND (date_expires < 1 OR date_expires > CURDATE())  LIMIT 1"));
		
		if (!$promo_check['id']) {
			$data = array('success'=> false, 'message'=>'<font color="red">This promo code is invalid..</font>');
			echo json_encode($data);
		} elseif (!$valid_promo) {
			$data = array('success'=> false, 'message'=>'<font color="orange">This promo code has expired!</font>');
			echo json_encode($data);
		} else {
			$addLog = mysql_query("INSERT INTO CouZoo_Promo_Log (id_user, promo_id) VALUES ('".$payer_id."', '".$promo_check['id']."') ");
			$data = array('success'=> true, 'message'=>'<font color="green">Promo code applied! You may start listing coupons for free!</font>');
			echo json_encode($data);
		}
		break;
	}
	case "del_card":
	{
	$card = mysql_fetch_array(mysql_query("SELECT payer_id, card_id FROM CouZoo_Cards WHERE id = '$id_card' LIMIT 1"));
	
	if ($card['payer_id'] != $payer_id) {
	    $data = array('success'=> false, 'msg'=> 'You do not have access to do this!');
	    echo json_encode($data);
	    die;
	}

	$card_id = $card['card_id'];
	$delCard = mysql_query("DELETE FROM CouZoo_Cards WHERE id = '$id_card'");
	$total = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Cards WHERE payer_id = '$payer_id'"));

	/* Used to delete a card from PayPal, not needed, but currently not working properly.
	include("includes/paypal.php");
		$pp = new PayPal();
		$url = $pp->host.'/v1/oauth2/token'; 
		$postArgs = 'grant_type=client_credentials';
		$token = $pp->get_access_token($url,$postArgs);
		$url = $pp->host.'/v1/vault/credit-card/'.$card_id;
		$json_resp = $pp->make_del_call($url);
	*/
	 
	$data = array('success'=> true, 'message'=>'<font color="#017c04">Credit Card Removed!</font>', 'total'=> $total);
	echo json_encode($data);
	break;
	}
	case "add_card":
	{
		$cc = $_POST['new_cc'];
		$cc_last_four = substr(mysql_real_escape_string($cc['number']), -4);
		$cc_lname = mysql_real_escape_string($cc['lname']);
		$cc_month = mysql_real_escape_string($cc['exp_month']);
		$cc_check = mysql_query("SELECT *, SUBSTRING(number, -4) AS num FROM CouZoo_Cards HAVING num = '$cc_last_four' AND lname = '$cc_lname' AND exp_month = '$cc_month'");
		if (mysql_num_rows($cc_check)) {
		    	$data = array('success'=> false, 'message'=>'<font color="red">This credit card is already assosciated with another account!</font>');
			echo json_encode($data);
			die;
		}

		include("includes/paypal.php");
		$pp = new PayPal();
		$url = $pp->host.'/v1/oauth2/token'; 
		$postArgs = 'grant_type=client_credentials';
		$token = $pp->get_access_token($url,$postArgs);
		$url = $pp->host.'/v1/payments/payment';

		// Store CC Info through PayPal
		$url = $pp->host.'/v1/vault/credit-card';
		$store_cc = array(
 		   	"payer_id" => $payer_id,
 			"type" => $cc['type'],
 			"number" => $cc['number'],
 			"expire_month" => $cc['exp_month'],
 			"expire_year" => $cc['exp_year'],
 			"first_name" => $cc['fname'],
 		   	"last_name" => $cc['lname']
		);
		$json = json_encode($store_cc);
		$cc_res = $pp->make_post_call($url, $json);
		
		// Add CC to database
		$qry = mysql_query("INSERT INTO CouZoo_Cards (card_id,payer_id,type,number,exp_month,exp_year,fname,lname,valid)
				    	VALUES ('$cc_res[id]','$payer_id','$cc[type]','$cc_res[number]','$cc[exp_month]','$cc[exp_year]','$cc[fname]','$cc[lname]','') ");
	 
	$data = array('success'=> true, 'message'=>'<font color="#017c04">Credit Card Added!</font>');
	echo json_encode($data);
	break;
	}
}
?>