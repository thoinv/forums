<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="previewTooltip">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,false,array(
'user' => '$post',
'size' => 's'
),'')) . '
	
	<div class="text">
		<blockquote class="previewText">' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $post['messageParsed'],
'1' => $xenOptions['discussionPreviewLength']
))
)) . '</blockquote>
		
		<div class="posterDate muted">' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => htmlspecialchars($post['post_date'], ENT_QUOTES, 'UTF-8'),
'class' => 'faint'
))) . '</div>
	</div>
</div>';
