<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' mentioned you in the photo ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '';
