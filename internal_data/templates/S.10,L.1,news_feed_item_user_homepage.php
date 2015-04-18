<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' set their home page.' . '</h3>

<p class="snippet"><a href="' . htmlspecialchars($homepage['new'], ENT_QUOTES, 'UTF-8') . '" rel="nofollow" target="_blank">' . htmlspecialchars($homepage['new'], ENT_QUOTES, 'UTF-8') . '</a></p>';
