<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.advbbcodebar_fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset_wrapper') . '
}
.advbbcodebar_fieldset fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset') . '
}

.advbbcodebar_fieldset legend{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset_title') . '
}

.advbbcodebar_fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset_wrapper') . '
	margin: 0 1px 1px 1px;	
}
.advbbcodebar_fieldset fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset') . '
	display : block;
	position : relative;
}

.advbbcodebar_fieldset legend{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_fieldset_title') . '
	top:-10px;
	position: relative;
}

.advbbcodebar_fieldsetfix
{
	display:block;
	width:100%;
	white-space:normal;
}

.advbbcodebar_fieldset.bleft {
	margin-right:auto;
}

.advbbcodebar_fieldset.bcenter {
	margin-left:auto;
	margin-right:auto;
}

.advbbcodebar_fieldset.bright {
	margin-left:auto;
}';
