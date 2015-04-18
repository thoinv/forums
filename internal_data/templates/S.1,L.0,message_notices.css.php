<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '	.messageNotices li
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageNotice') . '
	}
	
		.messageNotices .icon
		{
			float: right;
			width: 16px;
			height: 16px;
			background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 1000px 1000px;
		}
	
			.messageNotices .warningNotice .icon { background-position: -48px -32px; }		
			.messageNotices .deletedNotice .icon { background-position: -64px -32px; }		
			.messageNotices .moderatedNotice .icon {background-position: -32px -16px; }';
