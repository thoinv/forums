<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' replied to the conversation ' . '<a href="' . XenForo_Template_Helper_Core::link('conversations/message', $content, array(
'message_id' => $extra['message_id']
)) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.';
