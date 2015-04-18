<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . ' - ' . (($like) ? ('Unlike Media') : ('Like Media'));
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/like', $media, array()) . '" method="post" class="xenForm">

	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>
			';
if ($like)
{
$__output .= '
				' . 'Are you sure you want to unlike this media?' . '
			';
}
else
{
$__output .= '
				' . 'Are you sure you want to like this media?' . '
			';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($like) ? ('Unlike Media') : ('Like Media')) . '" accesskey="s" class="button primary" autofocus="true" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
