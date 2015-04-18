<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent messageText ugc baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $content['message']
)) . '</div>
<dl class="secondaryContent pairsInline">
	<dt>' . 'Diễn đàn' . ':</dt> <dd>' . htmlspecialchars($content['node_title'], ENT_QUOTES, 'UTF-8') . '</dd>
</dl>';
