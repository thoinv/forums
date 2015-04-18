<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.sidebar .sharePage .shareControl
{
	margin-top: 10px;
	min-height: 23px;
}

.sidebar .sharePage iframe
{
	width: 200px;
	height: 20px;
}

.sidebar .sharePage iframe.fb_ltr
{
	_width: 200px !important;
}

.sidebar .sharePage .facebookLike iframe
{
	z-index: 52;
}

.mast .sharePage .secondaryContent
{
	overflow: visible !important;
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
	.Responsive .sidebar .sharePage
	{
		display: none;
	}
}
';
}
