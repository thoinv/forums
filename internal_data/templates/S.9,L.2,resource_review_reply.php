<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Reply to Review';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Reply to Review';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/reviews/reply', $resource, array(
'review' => $review
)) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Nội dung' . ':</label></dt>
		<dd><textarea name="author_response" id="ctrl_message" rows="2" class="textCtrl Elastic"></textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Reply to Review' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
