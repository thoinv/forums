<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' left a comment on the media <a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a>.' . '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['comment_message'],
'1' => '100'
)) . '</p>';
