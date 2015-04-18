<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<p class="description">' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' submitted a new media.' . '</p>

<h3 class="title thread"><a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

<p class="snippet post">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['media_description'],
'1' => '100'
)) . '</p>

<h4 class="minorTitle forum">' . 'Category' . ': <a href="' . XenForo_Template_Helper_Core::link('media_category', $content, array()) . '">' . htmlspecialchars($content['category_name'], ENT_QUOTES, 'UTF-8') . '</a></h4>';
