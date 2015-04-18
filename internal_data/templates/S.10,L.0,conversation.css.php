<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.conversation_view .messageList
{
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-left: none;
	border-bottom: none;
	padding-right: 10px;
	border-top-right-radius: 10px;
}

	.conversation_view .message:first-child
	{
		border-top: none;
	}

	.conversation_view .message .newIndicator
	{
		margin-top: 0;
		margin-right: -15px;
	}
	
	.conversation_view .attachment
	{
		width: 49.5%;
	}

	.conversation_view .quickReply
	{
		border-top: none;
	}
	
';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .conversation_view .messageList
	{
		border-right: none;
		padding-right: 0;
		border-top-right-radius: 0;
	}
}
';
}
