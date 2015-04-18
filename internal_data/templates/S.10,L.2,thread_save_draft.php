<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($newPostCount)
{
$__output .= '
	<li class="newMessagesNotice messagesSinceReplyingNotice">' . 'Messages have been posted since you loaded this page.' . ' <a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/show-new-posts', $thread, array(
'last_date' => $lastDate
)) . '" class="NewMessageLoader">' . 'View them?' . '</a></li>
';
}
