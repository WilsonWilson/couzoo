<?php
require_once("../includes/config.php");
require_once("check-login.php");
$couzoo->DBLogin();

// Update Coupon
switch ($_GET['q']) 
{
	case "search_coupon":
	{
		$keywords = $couzoo->SanitizeForSQL(trim($_POST['keywords']));

		//Set up search
		$search = "WHERE c.id_user != 0";

		//Get keywords for search terms
		if ($keywords) {
			$kws = explode(" ", strtolower($keywords));
			foreach ($kws as $kw) {
				if (strlen(trim($kw)) > 0) {
		    			$search .= " AND (lower(c.title) LIKE '%$kw%' OR lower(c.categories) LIKE '%$kw%' OR lower(c.description) LIKE '%$kw%' OR lower(c.keywords) LIKE '%$kw%' OR lower(m.fname) LIKE '%$kw%' OR lower(m.lname) LIKE '%$kw%')";
				}
			}
		}

		// Update title of coupon
		$qry = mysql_query("SELECT * FROM CouZoo_Coupons as c LEFT JOIN CouZoo_Members m ON (c.id_user = m.id_user) ".$search);
		$total_coupons = mysql_num_rows($qry);
		$i=0;
		while ($data = mysql_fetch_array($qry)) {
			$coupons_edit .= "<div id='editCoupon_".$i."' class='edit_coupon hide'>
				<form id='edit_coupon' action='' method='POST'>
				<h2>Edit Coupon</h2>
				<input type='hidden' value='".$data['id_coupon']."' id='id_coupon".$i."' name='id_coupon'>
					<ul>
						<li><label>ID:</label> ".$data['id_coupon']."</li>
						<li><label>Listed By:</label> ".$data['fname']." ".$data['lname']."</li>
						<li><label>Title:</label> <input type='text' id='title".$i."' name='title' value='".$data['title']."'></li>
					</ul>
					<div class='admin-submit-btn'></div>
					<div id='".$i."' class='submit-btn edit-coupon-submit'></div> <span id='editStatus".$i."' class='editStatus'></span>
				</form>
			</div>";

	    		$coupons .= "<tr id='coupon_".$i."' class='data'>
					<td>".$data['id_coupon']."</td>
					<td>".$data['fname']." ".$data['lname']."</td>
					<td><div id='c_title".$i."'>".$data['title']."</div></td>
					<td>".$data['price']."</td>
					<td>".ucfirst($data['status'])."</td>
					<td>".$data['views']."</td>
					<td>".$data['date']."</td>
					<td><a href='#editCoupon_".$i."' class='fancybox edit_style' id='edit_coupon' style='text-decoration: none;'>Edit</a> <div class='delete_coupon' id='delCoupon_".$i."'>Delete</div></td>
		      		      </tr>";
			$i++;
		}

		if ($total_coupons < 1) {
			$msg = '<font color="#ff464a">Search successful, but we couldn\'t find any coupons that match those keywords.</font>';
		} else {
			$msg = '<font color="#017c04">Search successful! We found '.$total_coupons.' coupons.</font>';
		}

		if ($qry) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>$msg, 'coupons'=> $coupons, 'coupons_edit'=> $coupons_edit );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "upd_coupon":
	{
		$id_coupon = $couzoo->SanitizeForSQL($_POST['id_coupon']);
		$title = $_POST['title'];

		// No title was entered, return false
		if (strlen($title) < 1) {
			// Set up associative array
			$data = array('success'=> false,'message'=>'<font color="#ff464a">Please enter a title!</font> ');
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		// Update title of coupon
		$qry = mysql_query("UPDATE CouZoo_Coupons SET title = '".$title."' WHERE id_coupon = '".$id_coupon."'");
		$data = mysql_fetch_row(mysql_query("SELECT title FROM CouZoo_Coupons WHERE id_coupon = '".$id_coupon."'"));
		if ($data) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon Updated!</font>', 'title'=>$data[0] );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "del_coupon":
	{
		$id_coupon = $couzoo->SanitizeForSQL($_POST['id_coupon']);

		// Update title of coupon
		$qry = mysql_query("DELETE FROM CouZoo_Coupons WHERE id_coupon = '".$id_coupon."'");
		if (mysql_affected_rows() > 0) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>'<font color="#017c04">Coupon has been deleted.</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		} else {
			// Set up associative array
			$data = array('success'=> false, 'message'=>'<font color="#ff464a">We could not delete that coupon, something went wrong..</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "add_promo":
	{
		$code = $couzoo->SanitizeForSQL(trim($_POST['code']));
		$max_uses = $couzoo->SanitizeForSQL(trim($_POST['max_uses']));
		$date_expires = $couzoo->SanitizeForSQL(trim($_POST['date_expires']));

		// Check if code is unique
		$check = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Promo_Codes WHERE code = '".$code."'"));

		// Check date
		$now = strtotime("now");
		$date_entered = strtotime($date_expires);

		// Promo code validation
		if (strlen($code) < 1) {
			$err = "Please enter a code..";
		}
		elseif ($check > 0) {
			$err = "This coupon code is already in use..";
		}
		elseif ($date_entered > 0 && $now >= $date_entered) {
			$err = "Please enter a future date or no date at all..";
		}

		if ($err) {
			// Set up associative array
			$data = array('success'=> false, 'message'=>'<font color="#ff464a">'.$err.'</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		// Add promo
		$add = mysql_query("INSERT INTO CouZoo_Promo_Codes (code, max_uses, date_expires, status) VALUES ('".$code."', '".$max_uses."', '".$date_expires."', 1) ");
		// Update list of promo codes
		$qry = mysql_query("SELECT * FROM CouZoo_Promo_Codes ORDER BY status DESC");
		$i=0;
		while ($data = mysql_fetch_array($qry)) {
			$promo_edit .= "<div id='editPromo_".$i."' class='edit_coupon hide'>
				<form id='edit_promo' action='' method='POST'>
				<h2>Edit Promo Code</h2>
				<input type='hidden' value='".$data['id']."' id='promo_id".$i."' name='promo_id'>
					<ul>
						<li><label>Code:</label> <input id='promo-code".$i."' type='text' name='promo-code' placeholder='enter promo code' value='".$data['code']."' /></li>
						<li><label>Maximum uses:</label> <input id='promo-uses".$i."' type='text' name='promo-uses' placeholder='leave blank for unlimited' value='".$data['max_uses']."' /></li>
						<li><label>Date Expires:</label> <input class='promo-date-picker' id='promo-date".$i."' type='text' name='promo-date' placeholder='leave blank for no expiration' value='".$data['date_expires']."' /></li>
					</ul>
					<div class='admin-submit-btn'></div>
					<div id='".$i."' class='submit-btn edit-promo-submit'></div> <span id='editPromoStatus".$i."' class='editPromoStatus'></span>
				</form>
			</div>";

			$max_uses = !$data['max_uses'] ? "Unlimited" : $data['max_uses'];
			$uses_left = !$data['max_uses'] ? "Unlimited" : $data['max_uses'] - $data['total_uses'];
			$date_expires = !strtotime($data['date_expires']) ? "None" : $data['date_expires'];
			$status = $data['status'] == 0 ? "Disabled" : "Enabled";

	    		$promos .= "<tr id='promo_".$i."' class='data'>
					<td><div id='promo_code".$i."'>".$data['code']."</div></td>
					<td><div id='promo_max_uses".$i."'>".$max_uses."</div></td>
					<td><div id='promo_total_uses".$i."'>".$data['total_uses']."</div></td>
					<td><div id='promo_uses_left".$i."'>".$uses_left."</div></td>
					<td><div id='promo_date_expires".$i."'>".$date_expires."</div></td>
					<td><div class='upd_promo_status click-me' id='promo_status".$i."'>".$status."</div></td>
					<td><a href='#editPromo_".$i."' class='fancybox edit_style' id='edit_promo' style='text-decoration: none;'>Edit</a> <div class='delete_promo' id='delPromo_".$i."'>Delete</div></td>
		      		      </tr>";
			$i++;
		}

		$msg = '<font color="#017c04">Promo Code Added Successfully!</font>';

		if ($qry) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>$msg, 'promos'=> $promos, 'promo_edit'=> $promo_edit );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "upd_promo":
	{
		$promo_id = $couzoo->SanitizeForSQL(trim($_POST['promo_id']));
		$code = $couzoo->SanitizeForSQL(trim($_POST['code']));
		$max_uses = $couzoo->SanitizeForSQL(trim($_POST['max_uses']));
		$date_expires = $couzoo->SanitizeForSQL(trim($_POST['date_expires']));

		// Check if code is unique
		$check = mysql_num_rows(mysql_query("SELECT * FROM CouZoo_Promo_Codes WHERE id != '".$promo_id."' AND code = '".$code."'"));

		// Check date
		$now = strtotime("now");
		$date_entered = strtotime($date_expires);

		// Promo code validation
		if (strlen($code) < 1) {
			$err = "Please enter a code..";
		}
		elseif ($check > 0) {
			$err = "This coupon code is already in use..";
		}
		elseif ($date_entered > 0 && $now >= $date_entered) {
			$err = "Please enter a future date or no date at all..";
		}

		if ($err) {
			// Set up associative array
			$data = array('success'=> false, 'message'=>'<font color="#ff464a">'.$err.'</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		// Update promo code
		$qry = mysql_query("UPDATE CouZoo_Promo_Codes SET code = '".$code."', max_uses = '".$max_uses."', date_expires = '".$date_expires."' WHERE id = '".$promo_id."'");
		$data = mysql_fetch_array(mysql_query("SELECT * FROM CouZoo_Promo_Codes WHERE id = '".$promo_id."'"));
		if ($data) {
			$max_uses = !$data['max_uses'] ? "Unlimited" : $data['max_uses'];
			$uses_left = !$data['max_uses'] ? "Unlimited" : $data['max_uses'] - $data['total_uses'];
			$date_expires = !strtotime($data['date_expires']) || $data['date_expires'] == "0000-00-00" ? "None" : $data['date_expires'];
			$status = $data['status'] == 0 ? "Disabled" : "Enabled";

			// Set up associative array
			$data = array('success'=> true, 'message'=>'<font color="#017c04">Promo Code Updated!</font>', 'code'=>$data['code'], 
					'max_uses'=>$max_uses, 'total_uses'=>$data['total_uses'], 'uses_left'=>$uses_left, 'date_expires'=>$date_expires, 'status'=>$status  );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "upd_promo_status":
	{
		$promo_id = $couzoo->SanitizeForSQL($_POST['promo_id']);
		$status = $couzoo->SanitizeForSQL($_POST['status']);
		$new_status = $status == "Enabled" ? "0" : "1";
		$new_status_text = $new_status == 1 ? "Enabled" : "Disabled";

		// Update promos
		$qry = mysql_query("UPDATE CouZoo_Promo_Codes SET status = '".$new_status."' WHERE id = '".$promo_id."'");
		if (mysql_affected_rows() > 0) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>'<font color="#017c04">Promo code has changed to '.$new_status_text.'.</font>', 'status'=>$new_status_text );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		} else {
			// Set up associative array
			$data = array('success'=> false, 'message'=>'<font color="#ff464a">We could not update the status of that promo code, something went wrong..</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
	case "del_promo":
	{
		$promo_id = $couzoo->SanitizeForSQL($_POST['promo_id']);

		// Update promos
		$qry = mysql_query("DELETE FROM CouZoo_Promo_Codes WHERE id = '".$promo_id."'");
		if (mysql_affected_rows() > 0) {
			// Set up associative array
			$data = array('success'=> true, 'message'=>'<font color="#017c04">Promo code has been deleted.</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		} else {
			// Set up associative array
			$data = array('success'=> false, 'message'=>'<font color="#ff464a">We could not delete that promo code, something went wrong..</font>' );
	 
			// JSON encode and send back to the server
			echo json_encode($data);
			exit;
		}

		break;
	}
}

?>

