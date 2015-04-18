<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . ' - ' . (($like) ? ('Unlike Resource Update') : ('Like Resource Update'));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= (($like) ? ('Unlike Resource Update') : ('Like Resource Update'));
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" method="post" class="xenForm">

	<dl class="ctrlUnit fullWidth surplusLabel">
		<dt></dt>
		<dd>
			';
if ($like)
{
$__output .= '
				' . 'Are you sure you want to unlike this resource update?' . '
			';
}
else
{
$__output .= '
				' . 'Are you sure you want to like this resource update?' . '
			';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($like) ? ('Unlike Resource Update') : ('Like Resource Update')) . '" accesskey="s" class="button primary" autofocus="true" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
