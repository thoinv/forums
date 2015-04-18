<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Set this photo as your gallery cover';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Set this photo as your gallery cover';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/photos/set-cover', $content, array()) . '" method="post" class="xenForm">

	<dl class="ctrlUnit fullWidth surplusLabel">
		<dt></dt>
		<dd>
			' . 'Are you sure you want to set this photo as your gallery\'s cover?' . '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" autofocus="true" />
			<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="button primary">' . 'Cancel' . '</a>
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
