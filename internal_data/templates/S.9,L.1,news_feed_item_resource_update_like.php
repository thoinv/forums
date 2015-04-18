<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

	';
if ($content['user_id'] == $visitor['user_id'])
{
$__output .= '

		';
if ($content['resource_update_id'] == $content['description_update_id'])
{
$__output .= '
			' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked your resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		';
}
else
{
$__output .= '
			' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked your update for the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources/update', $content, array(
'update' => $content['resource_update_id']
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		';
}
$__output .= '

	';
}
else
{
$__output .= '

		';
if ($content['resource_update_id'] == $content['description_update_id'])
{
$__output .= '
			' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s resource</a> ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		';
}
else
{
$__output .= '
			' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('resources/update', $content, array(
'update' => $content['resource_update_id']
)) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s update</a> for the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		';
}
$__output .= '

	';
}
$__output .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => '100',
'2' => array(
'stripQuote' => '1'
)
)) . '</p>';
