<?php
require_once("location/geoPlugin.php");

	if ((!isset($_COOKIE['UserCity'])) || (!isset($_COOKIE['UserState'])) || (!isset($_COOKIE['UserLat'])) || (!isset($_COOKIE['UserLong']))) {
		$geoplugin = new geoPlugin();
		$geoplugin->locate();
		$userCity = $geoplugin->city;
		$userState = $geoplugin->region;
		$userLong = $geoplugin->longitude;
		$userLat = $geoplugin->latitude;

		setcookie( "UserCity", $userCity, strtotime( '+1 year' ) );
		setcookie( "UserState", $userState, strtotime( '+1 year' ) );
		setcookie( "UserLong", $userLong, strtotime( '+1 year' ) );
		setcookie( "UserLat", $userLat, strtotime( '+1 year' ) );
	}
	else {
		$userCity = $_COOKIE['UserCity'];
		$userState = $_COOKIE['UserState'];
		$userLong = $_COOKIE['UserLong'];
		$userLat = $_COOKIE['UserLat'];
	}

	if (isset($_POST['location'])) {
		$adr = urlencode($_POST['address']);
		$zip = urlencode($_POST['zip']);

		if ($adr == "" && $zip == "") {
			echo "Please enter a city and address or a zip code!";
			die;
		}

		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$adr."+".$zip."&sensor=false");
		$loc = json_decode($json);

		if ($loc->status == 'OK') {
    			foreach ($loc->results[0]->address_components as $address) {
        			if (in_array("locality", $address->types)) {
            				$userCity = $address->short_name;
        			}
        			if (in_array("administrative_area_level_1", $address->types)) {
            				$userState = $address->short_name;
        			}
        			if (in_array("administrative_area_level_2", $address->types)) {
            				$userArea = $address->long_name;
        			}
    			}
			$userState = $userState;
			$userLat = $loc->results[0]->geometry->location->lat;
			$userLong = $loc->results[0]->geometry->location->lng;
		}
		else { echo "Invalid Location!"; die; }

		setcookie( "UserCity", $userCity, strtotime( '+1 year' ) );
		setcookie( "UserState", $userState, strtotime( '+1 year' ) );
		setcookie( "UserLat", $userLat, strtotime( '+1 year' ) );
		setcookie( "UserLong", $userLong, strtotime( '+1 year' ) );

		//header("Location: index.php");
		//exit;
	}

	$userLocation = $userCity.", ".$userState;

	$sqlDist = " ( 3959 * acos( cos( radians($userLong) ) * cos( radians( longitude ) ) * cos( radians( latitude ) - radians($userLat) ) + sin( radians($userLong) ) * sin( radians( longitude ) ) ) ) ";

?>