<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

	';
if ($content['user_id'] == $visitor['user_id'])
{
$__output .= '

		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked your media <a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a>.' . '
		
	';
}
else
{
$__output .= '

		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked <a href="' . XenForo_Template_Helper_Core::link('members', $content, array()) . '">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s</a> media <a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a>.' . '
		
	';
}
$__output .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['media_description'],
'1' => '100',
'2' => array(
'stripQuote' => '1'
)
)) . '</p>';
