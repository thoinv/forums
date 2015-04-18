<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'New Posts';
$__output .= '

<div class="section">
';
if ($visitor['user_id'] AND !$days AND !$recent)
{
$__output .= '
	' . 'You have no unread posts. You may <a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '" rel="nofollow">view all recent posts</a> instead.' . '
';
}
else
{
$__output .= '
	' . 'No results found.' . '
';
}
$__output .= '
</div>';
