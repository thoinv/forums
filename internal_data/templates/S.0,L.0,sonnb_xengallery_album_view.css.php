<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.pageContent .titleBar {
	display:none;
}
.albumControls {
	clear: both;
	display: table;
	margin-bottom: 20px;
	margin-top: 10px;
	width: 100%;
}

.aInfo {
	text-align: center;
	width: 100%;
}
.aInfo h1 {
	font-size:18px
}
.aInfo a {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '!important;
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
