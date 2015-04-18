<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#map, #mapOverlay {
 	width: 100%;
	margin: 0 auto;
	height: 350px;
	display: block;
}
.sonnb_xengallery_location_index #map {
	height: 550px;
}

#map .windowInfo {
	min-width: 300px;
	min-height: 100px;
}

#map .windowInfo .title a{
	font-size: 1.2em;
	font-weight: bold;
	margin-bottom: 5px;
}

#map .gm-style > div:first-child > div > div:nth-child(3) > div:last-child > div:first-child > div:first-child > div:last-child,
.mapOverlay .gm-style > div:first-child > div > div:nth-child(3) > div:last-child > div:first-child > div:first-child > div:last-child {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . '!important;
}
#map .gm-style > div:first-child > div > div:nth-child(3) > div:last-child > div:first-child > div:first-child > div:nth-child(3) div > div,
.mapOverlay .gm-style > div:first-child > div > div:nth-child(3) > div:last-child > div:first-child > div:first-child > div:nth-child(3) div > div {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . '!important;
}

.pac-container {
	z-index: 19999!important;
}

.xenOverlay .locationForm .xenForm {
	max-width: 100%;
}';
