<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $content['comment_message']
)) . '</div>
<dl class="secondaryContent pairsInline">
	<dt>' . 'Media' . ':</dt>
	<dd><a href="' . XenForo_Template_Helper_Core::link('media', $content, array()) . '">' . htmlspecialchars($content['media_title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
</dl>';
