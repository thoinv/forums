<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<p class="description">' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' updated the wiki.' . '</p>

<h3 class="title thread"><a href="' . XenForo_Template_Helper_Core::link('wiki', $content, array()) . '">' . htmlspecialchars($content['page_name'], ENT_QUOTES, 'UTF-8') . '</a></h3>

<p class="snippet post">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['page_content'],
'1' => '100'
)) . '</p>';
