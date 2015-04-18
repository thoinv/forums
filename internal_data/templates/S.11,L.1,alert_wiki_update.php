<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' updated the wiki page ' . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['page_name'], ENT_QUOTES, 'UTF-8') . '</a>' . '. There may be more updates after this.';
