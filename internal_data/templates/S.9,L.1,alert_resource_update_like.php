<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['resource_update_id'] == $content['description_update_id'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked your resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked your update for the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources/update', $content, array(
'update' => $content['resource_update_id']
)) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . ': ' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
';
}
