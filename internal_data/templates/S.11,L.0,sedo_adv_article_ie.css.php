<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.advbbcodebar_article{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_article_wrapper') . '
}
.advbbcodebar_article fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_article') . '
	display : block;
	position : relative;	
}

.advbbcodebar_article legend{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_article_title') . '
	position: absolute;
	top:-10px;
	left: 0.5em;	
}

.advbbcodebar_article div.adv_source{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_article_source') . '
}';
