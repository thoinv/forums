<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent messageText ugc baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $content['update']['message']
)) . '</div>
<div class="secondaryContent">
	<dl class="pairsRows"><dt>' . 'Resource' . ':</dt>
		<dd><a href="' . XenForo_Template_Helper_Core::link('resources', $content['resource'], array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $content['resource']
)) . htmlspecialchars($content['resource']['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<dl class="pairsRows"><dt>' . 'Category' . ':</dt>
		<dd><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $content['category'], array()) . '">' . htmlspecialchars($content['category']['category_title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
</div>';
