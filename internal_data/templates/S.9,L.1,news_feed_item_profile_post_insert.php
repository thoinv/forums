<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($user['user_id'] == $userReceiver['user_id'])
{
$__output .= '

	<h3 class="description">
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array(
'class' => 'primaryText'
))) . '
		<em>' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $content['message']
)) . '</em>
		<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '">&raquo;</a>
	</h3>

';
}
else
{
$__output .= '

	<h3 class="description">' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' left a message on ' . '<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '">' . htmlspecialchars($userReceiver['username'], ENT_QUOTES, 'UTF-8') . '</a>' . '\'s profile.' . '</h3>

	<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => $xenOptions['newsFeedMessageSnippetLength']
)) . '</p>

';
}
