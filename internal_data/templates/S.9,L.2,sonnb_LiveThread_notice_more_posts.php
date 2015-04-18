<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="newMessagesNotice">' . 'Messages have been posted since you loaded this page.' . ' <a href="' . XenForo_Template_Helper_Core::link('posts', $lastPost, array()) . '#post-' . htmlspecialchars($lastPost['post_id'], ENT_QUOTES, 'UTF-8') . '">' . 'View them?' . '</a></li>';
