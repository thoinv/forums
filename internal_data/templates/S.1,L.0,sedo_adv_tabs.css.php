<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.adv_tabs_wrapper{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_container') . '
}

.adv_tabs_wrapper.bleft {
	margin-left:0 !important;
	margin-right:auto !important;
}

.adv_tabs_wrapper.bcenter {
	margin-left:auto !important;
	margin-right:auto !important;
}

.adv_tabs_wrapper.bright {
	margin-left:auto !important;
	margin-right:0 !important;
}

.adv_tabs_wrapper.fleft {
	float:left;
	margin:1px 10px 5px 0 !important;
}

.adv_tabs_wrapper.fright {
	float:right;
	margin:1px 0 5px 10px !important;
}


.adv_tabs_wrapper ul.advtabs {
	list-style:none !important;
	margin:0 !important;
	padding:0;
	border-bottom:1px solid #666;
	min-height:30px;
}

.adv_tabs_wrapper.alter ul.advtabs li {
	float: none;
}

.adv_tabs_wrapper ul.advtabs li {
	float:left;
	height:30px;
	text-indent:0;
	padding:0;
	margin:0 !important;
	list-style:none !important;
	list-style-image:none !important;
}

.adv_tabs_wrapper ul.advtabs a {
		' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_title') . '
		' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_title.border')
)) . '
		}
}

.adv_tabs_wrapper ul.advtabs a:active {
	outline:none;
}

.adv_tabs_wrapper ul.advtabs a:focus {

}

ul.advtabs a:hover,  ul.advtabs a:focus{
	box-shadow:none;
}

.adv_tabs_wrapper ul.advtabs a.current, ul.advtabs a.current:hover,  ul.advtabs a.current:focus,  ul.advtabs li.current a {
' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_title_hoveractive') . '
} 

.adv_tabs_wrapper .advpanes{
' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_content') . '
}

.adv_tabs_wrapper .advpanes > div {
	display: none;
	overflow: auto;
}

.adv_tabs_wrapper.noscript{
	overflow:auto;
	border: 2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

.adv_tabs_noscript {
	border: 1pt solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

.adv_tabs_noscript_title {
	font-size: 12px;
	font-weight:bold;
	color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
	line-height: 30px;
	height: 30px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
}

.adv_tabs_noscript_content {
	padding:5px;
	overflow: auto;
}';
