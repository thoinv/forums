<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.itemGallery.itemCamera {
	max-width: ' . XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_camera_width') . ';
	min-width: ' . XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_camera_width') . ';
}

.itemGallery.itemCamera .img a {
	width: ' . (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_camera_width') - 20) . 'px;
	padding: 10px;
}

.itemGallery.itemCamera .img img {
	max-width: ' . (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_camera_width') - 20) . 'px;
}

.itemGallery.itemCamera .img {
	background-color: #FFF;
}

.itemGallery.itemCamera .infoAlbum .titleAlbum {
	
}';
