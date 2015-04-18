<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.adv_spoilerbb {
	margin: 5px 20px 20px 20px;
	color:' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
	background-color:' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.adv_spoilerbb_title {
	margin-bottom: 2px;
	font-size: 10pt;
}

.adv_spoilerbb_title span.adv_spoilerbb_caption{
	font-weight: bold;
	vertical-align: bottom;
}

.adv_spoilerbb_title span.adv_spoilerbb_noscript{
	font-style:italic;
	font-size: 10px;
	vertical-align: bottom;
}

.adv_spoilerbb_title input{
	display: none;
	width: 55px;
	margin: 0;
	padding: 1px;
	border: 1px solid black;
	background-color: white;
	font-size: 10px;
	cursor: pointer;	
}

.adv_spoilerbb_content_box{
	margin:0;
	padding: 6px;
	border: 1px dashed ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
}

.adv_spoilerbb_content_noscript{
	color:' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ' !important;
	background-color:' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ' !important;
}

.adv_spoilerbb_content_noscript:hover{
	color:' . XenForo_Template_Helper_Core::styleProperty('contentText') . ' !important;
	background-color:' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ' !important;
}';
