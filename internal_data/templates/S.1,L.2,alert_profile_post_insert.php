<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' gửi một tin nhắn trong <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>Hồ sơ của bạn</a>.';
