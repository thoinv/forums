<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">';
if ($location['old'])
{
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' moved from ' . '<em>' . htmlspecialchars($location['old'], ENT_QUOTES, 'UTF-8') . '</em>' . ' to ' . '<em>' . htmlspecialchars($location['new'], ENT_QUOTES, 'UTF-8') . '</em>' . '.';
}
else
{
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' set their location as ' . '<em>' . htmlspecialchars($location['new'], ENT_QUOTES, 'UTF-8') . '</em>' . '.';
}
$__output .= '</h3>';
