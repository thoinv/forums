<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

';
if ($content['user_id'] == $content['profile_user_id'])
{
$__output .= '

	';
if ($content['user_id'] == $visitor['user_id'])
{
$__output .= '
		
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' liked your <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '"' . '>status</a>.' . '
	
	';
}
else
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s status</a>.' . '
	
	';
}
$__output .= '

';
}
else
{
$__output .= '

	';
if ($content['user_id'] == $visitor['user_id'])
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '"' . '>your post</a> on ' . htmlspecialchars($content['profile_username'], ENT_QUOTES, 'UTF-8') . '\'s profile.' . '
	
	';
}
else if ($content['profile_user_id'] == $visitor['user_id'])
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s post</a> on your profile.' . '
		
	';
}
else
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s post</a> on ' . htmlspecialchars($content['profile_username'], ENT_QUOTES, 'UTF-8') . '\'s profile.' . '
		
	';
}
$__output .= '

';
}
$__output .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => $xenOptions['newsFeedMessageSnippetLength'],
'2' => array(
'stripPlainTag' => '1'
)
)) . '</p>';
