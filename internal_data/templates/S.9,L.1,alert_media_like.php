<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked your media <a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a>.';
