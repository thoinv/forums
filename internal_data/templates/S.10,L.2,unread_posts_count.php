<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($visitor['user_id'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__output .= '

	';
$unread = '';
$__compilerVar2 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
