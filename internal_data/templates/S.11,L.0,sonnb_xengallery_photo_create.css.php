<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.addPhotoSelect {
	border-bottom: 0 none;
	overflow: hidden;
	padding: 5px;
}
.addPhotoSelect li {
	display: block;
	float: left;
	text-align: center;
	width: 33.3%;
}
.addPhotoSelect li a {
	font-size: 13px;
	font-weight: bold;
}
.addPhotoSelect li a:hover {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}';
