<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Resource Update';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/save-update', $resource, array(
'resource_update_id' => $update['resource_update_id'],
'inline' => '1'
)) . '" method="post"
	class="section AutoValidator InlineMessageEditor NoAutoHeader">

	<h2 class="heading overlayOnly">' . 'Edit Resource Update' . '</h2>

	

	<div class="secondaryContent messageContainer">' . $editorTemplate . '</div>

	<div class="sectionFooter">
		<span class="buttonContainer">
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			<input type="submit" value="' . 'More Options' . '..." name="more_options" class="button JsOnly" />
			<input type="button" value="' . 'Cancel' . '" class="button OverlayCloser" accesskey="r" />
		</span>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
