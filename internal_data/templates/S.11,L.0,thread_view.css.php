<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.thread_view .threadAlerts
{
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 5px;
	font-size: 11px;
	margin: 10px 0;
	padding: 5px;
	line-height: 16px;
	background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\');
}
	
	.thread_view .threadAlerts dt
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
		display: inline;
	}
	
	.thread_view .threadAlerts dd
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
		font-weight: bold;
		display: inline;
	}
	
		.thread_view .threadAlerts .icon
		{
			float: right;
			width: 16px;
			height: 16px;
			margin-left: 5px;
			background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -1000px -1000px;
		}
		
			.thread_view .threadAlerts .deletedAlert .icon { background-position: -64px -32px; }
			.thread_view .threadAlerts .moderatedAlert .icon { background-position: -32px -16px; }
			.thread_view .threadAlerts .lockedAlert .icon { background-position: -16px -16px; }
	
.thread_view .threadAlerts + * > .messageList
{
	border-top: none;
}

.thread_view .threadNotices
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 5px;
	padding: 10px;
	margin: 10px auto;
}

.thread_view .InlineMod
{
	overflow: hidden; zoom: 1;
}

p.viewcount { text-align: right; font-size: 12px; margin-top: -13px; margin-right: 25px; }';
