<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$ratingIcon = '';
if ($content['rating']['name'])
{
if ($content['rating']['sprite_mode'])
{
$ratingIcon .= '<img src="styles/default/xenforo/clear.png" alt="" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($content['rating']['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($content['rating']['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($content['rating']['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($content['rating']['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($content['rating']['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px; vertical-align: middle;" />';
}
else
{
$ratingIcon .= '<img src="styles/dark/ratings/' . htmlspecialchars($content['rating']['name'], ENT_QUOTES, 'UTF-8') . '" alt="" style="vertical-align:middle" />';
}
}
$__output .= '

' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' rated your post ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
	
	
	';
