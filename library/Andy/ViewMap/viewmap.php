<html>
<title>View Map</title>
<head>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<?php

error_reporting(E_ALL & ~E_NOTICE);

// get coordinates from URL
$coordinates = $_GET['coordinates'];

?>

<script type="text/javascript">

var height = window.innerHeight - 20;
var map;
var geocoder;
var centerChangedLast;
var markersArray = [];

function initialize()
{
	var latlng = new google.maps.LatLng(<?php echo $coordinates;?>);
	var myOptions = 
	{
		zoom: 11,
		center: latlng,
		scaleControl: true,
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	geocoder = new google.maps.Geocoder();
	
	setupEvents();
	centerChanged();
	addMarkerAtCenter();
}

function setupEvents()
{
	var marker = new google.maps.Marker(
	{
		map: map,
		icon: 'crosshair.gif'
	});
	marker.bindTo('position', map, 'center');
	
	google.maps.event.addListener(map, 'center_changed', centerChanged);
}

function getCenterLatLngText()
{
	document.getElementById("latlng").className="coordinate";	
	return '[map=' + map.getCenter().lat().toFixed(6) +','+ map.getCenter().lng().toFixed(6) +']View Map[/map]';
}

function centerChanged()
{
	centerChangedLast = new Date();
	var latlng = getCenterLatLngText();
	document.getElementById('latlng').innerHTML = latlng;
}

function geocode()
{
	var address = document.getElementById("address").value;
	geocoder.geocode({
	'address': address,
	'partialmatch': true}, geocodeResult);
}

function geocodeResult(results, status)
{
	if (status == 'OK' && results.length > 0)
	{
		map.fitBounds(results[0].geometry.viewport);
	}
	else
	{
		alert("Geocode was not successful for the following reason: " + status);
	}
}

function addMarkerAtCenter()
{
	marker = new google.maps.Marker(
	{
		position: map.getCenter(),
		map: map
	});
	markersArray.push(marker);
}

function deleteOverlays()
{
	if (markersArray)
	{
		for (i in markersArray)
		{
			markersArray[i].setMap(null);
		}
		markersArray.length = 0;
	}
}

</script>

</head>
<body onload="initialize()">

<div id="map">
<div id="map_canvas" style="width:100%;"></div>
</div>

<script type="text/javascript">
var height = window.innerHeight;
height = height - 120;
document.getElementById("map_canvas").style.height = height + "px";
</script>

<br />
<div id="latlng"></div>
<br />

Find Place: <input type="text" id="address"/>
<input type="button" value="Go" onclick="geocode()">
<input type="button" value="Add Marker at Center" onclick="addMarkerAtCenter()"/>
<input type="button" onClick="deleteOverlays()" value="Remove Markers" title="Remove Markers"/>

</body>
</html>