<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $user, array()) . '">' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s photos' . '</a>';
