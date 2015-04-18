<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' tagged the resource ' . '<a href="' . XenForo_Template_Helper_Core::link('resources', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content
)) . htmlspecialchars($content['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' with a tag you are watching.';
