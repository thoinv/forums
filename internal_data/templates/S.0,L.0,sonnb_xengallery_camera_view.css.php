<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.camera-header {
	display:inline-table;
}
.camera-image {
	min-height: 160px;
	width: 300px;
	display: inline;
	float: left;
	position: relative;
}
.camera-model-wrapper {
    position: relative;
}
.camera-model-wrapper, 
.camera-model-wrapper .camera-model-image{
	max-width: 310px;
}

.camera-model-wrapper .camera-model-image {
	display: block;
	margin: 0 auto;
	max-height: 390px;
	text-align: center;
}

.camera-specifications {
	padding-right: 20px;
	display: inline;
	float: left;
	position: relative;
}

.camera-specifications  h3{
	font-weight: bold;
	font-size: 16px;
	margin-bottom: 10px;
}

ul.specs li {
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	padding: 0.25em 0;
}

ul.specs li b {
	display: inline-block;
	margin-right: 1em;
	min-width: 10em;
}
.photo-header{
	margin-top: -16px;
	clear: both;
	margin-bottom: 1em;
	margin-top: 1em;
	position: relative;
}
.photo-header h3{
	font-weight: bold;
	font-size: 16px;
	margin-bottom: 10px;
}

';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll'))
{
$__output .= '
	.hasJs .pageNavLinkGroup.xengallery {
		visibility:hidden;
	}
';
}
