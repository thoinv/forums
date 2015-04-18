<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.adv_accordion {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_accordion_wrapper') . '
}

.adv_accordion dt {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_accordion_title') . '
}

.adv_accordion dt.last {
	border-bottom: 0 !important;
}

.adv_accordion dt:hover,.adv_accordion dt.active {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_accordion_title_hover') . '
}

.adv_accordion dd {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_accordion_content') . '
}

.adv_accordion.bleft {
	margin-left:0 !important;
	margin-right:auto !important;
}

.adv_accordion.bcenter {
	margin-left:auto !important;
	margin-right:auto !important;
}

.adv_accordion.bright {
	margin-left:auto !important;
	margin-right:0 !important;
}

.adv_accordion.fleft {
	float:left;
	margin:1px 10px 0 0 !important;
}

.adv_accordion.fright {
	float:right;
	margin:1px 0 0 10px !important;
}
';
