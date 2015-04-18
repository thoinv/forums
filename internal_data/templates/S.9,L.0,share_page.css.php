<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.sharePage
{
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.sharePage'
)) . '

	.sharePage .shareControl
	{
		float: left;
	}

	.sharePage .facebookLike .label
	{
		font-size: 11px;
		line-height: 24px;
		float: left;
		margin-right: 7px;
		display: none;
	}
	
	.sharePage iframe
	{
		height: 20px;
	}
	
	.sharePage .facebookLike iframe
	{
		z-index: 52;
	}
	
';
if ($pageIsRtl)
{
$__output .= '
	/* G+1 bugs in RTL - they absolutely position on the left which makes a scrollbar */
	iframe[id^="oauth2relay"]
	{
		rtl-raw.left: auto !important;
		rtl-raw.right: -100px !important;
	}
	
	#___plusone_0, #___plusone_1, #___plusone_2
	{
		rtl-raw.left: auto !important;
		rtl-raw.right: -10000px !important;
	}
';
}
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .sharePage
	{
		display: none;
	}
}
';
}
