<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' bắt đầu một đối thoại mới với bạn: ' . '<a href="' . XenForo_Template_Helper_Core::link('conversations', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.';
