<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' bình luận trong <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>bài đăng của bạn</a> trong hồ sơ của ' . htmlspecialchars($content['profile_username'], ENT_QUOTES, 'UTF-8') . '.';
