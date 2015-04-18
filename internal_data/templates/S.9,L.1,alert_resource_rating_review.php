<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' reviewed the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $content['resource'], array(
'review' => $content
)) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content['resource']
)) . htmlspecialchars($content['resource']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.';
