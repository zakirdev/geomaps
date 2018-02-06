<?php
require "core.php";
$ip = "115.178.236.86";
//var_dump(get($ip));
$get = get($ip);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Zakirdev">
	<meta name="description" content="Project Ip Location">
	<title>GeoMaps</title>
	<style type="text/css">
		* {
			font-family: Gabriola;
			text-decoration: none;
		}
		#map {
			width: 100%;
			height: 400px;
			background-color: grey;
			margin-bottom: 15px;
		}
		#main {
			margin: 20px;
			border: 3px solid transparent;
			padding: 10px;
			background: silver;
		}
		.alert-green {
			padding: 7px;
			color:white;
			background: lime;
			margin: 13px;
			border-radius: 8px;
			border: 2px solid white;
		}
	</style>
	<script type="text/javascript">
			var latitude = <?=$get->geoplugin_latitude;?>;
			var longitude = <?=$get->geoplugin_longitude;?>;
			function initMap() {
				var coordinate = {lat: latitude, lng: longitude};
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 15,
					center: coordinate
				});
				var marker = new google.maps.Marker({
					position: coordinate,
					map: map
				});
			}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdXsmRLg_NcWaeWT7DdVwC9u7ZOWctun8&callback=initMap"></script>
</head>
<body>
<div id="map"></div>
<div id="main">
	<p>Your IP : <?=$get->geoplugin_request;?></p>	
	<p>City : <?=$get->geoplugin_city;?></p>
	<p>Region : <?=$get->geoplugin_region;?></p>
	<p>Country : <?=$get->geoplugin_countryName;?> | Country Code : <?=$get->geoplugin_countryCode;?></p>
</div>
</body>
</html>