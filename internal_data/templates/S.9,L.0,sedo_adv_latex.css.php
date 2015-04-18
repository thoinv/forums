<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.adv_latex_container.bleft {
	margin-right:auto;
}

.adv_latex_container.bcenter {
	margin-left:auto;
	margin-right:auto;
}

.adv_latex_container.bright {
	margin-left:auto;
	margin-right:15px;
}

.adv_latex_container.fleft {
	float:left;
	margin:1px 15px 0 2px;
	margin-left:2px;margin-right:15px
}

.adv_latex_container.fright {
	float:right;
	margin:1px 15px 0 15px;
}

.adv_latex{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_latex_container') . '
}

.adv_latex img{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_latex_img') . '
}
.adv_latex_title{
	color:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_latex_container.border-all-color') . ';
	margin-left:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_latex_container.margin-left') . ';
}';
