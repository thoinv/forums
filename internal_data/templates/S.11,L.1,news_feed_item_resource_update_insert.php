<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

	';
if ($content['resource_update_id'] == $content['description_update_id'])
{
$__output .= '
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' posted the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
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
)) . ' updated the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources/update', $content, array(
'update' => $content['resource_update_id']
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . ': ' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
	';
}
$__output .= '

</h3>

';
if ($content['resource_update_id'] == $content['description_update_id'])
{
$__output .= '
	<p class="snippet">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($content['tag_line'], ENT_QUOTES, 'UTF-8')
)) . '</p>
';
}
else
{
$__output .= '
	<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => '100'
)) . '</p>
';
}
