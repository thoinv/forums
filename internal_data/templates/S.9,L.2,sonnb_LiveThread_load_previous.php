<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="secondaryContent" style="padding: 5px; text-align: center; border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; margin-bottom: 10px;">
	<a href="' . XenForo_Template_Helper_Core::link('threads/load-previous-post', $thread, array()) . '"
		class="LivePostLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstPostDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View Previous Posts' . '...</a>
</li>';
