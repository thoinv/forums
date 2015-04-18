<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="previewTooltip">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,false,array(
'user' => '$resource',
'size' => 's'
),'')) . '
	
	<div class="text">
		<blockquote class="previewText">' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $update['messageParsed'],
'1' => $xenOptions['discussionPreviewLength']
))
)) . '</blockquote>
		
		<div class="posterDate muted">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8'),
'class' => 'faint'
))) . '</div>
	</div>
</div>';
