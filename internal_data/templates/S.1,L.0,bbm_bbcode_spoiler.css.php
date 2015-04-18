<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.bbmSpoilerBlock .quotecontent > .bbm_spoiler > blockquote
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage') . '
}

.bbmSpoilerBlock .bbm_spoil_noscript_desc
{
	font-style:italic;
	font-size:7pt;
}

.bbmSpoilerBlock .bbm_spoiler,
.bbmSpoilerBlock .button
{
	display: none;
}
 
.bbmSpoilerBlock .bbm_spoiler_noscript
{
	color:' . XenForo_Template_Helper_Core::styleProperty('bbm_spoiler_noscript_textcolor') . ';
	cursor: pointer;
}

.bbmSpoilerBlock .bbm_spoiler_noscript:hover
{
	color:' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
}



.bbmSpoilerBlock iframe, .bbmSpoilerBlock object, .bbmSpoilerBlock embed {
	max-height: none;
	max-width: none;
}';
