<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'A comment was made by ' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . ' on the album ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/comment', $album, array()) . '" method="post" class="xenForm">

	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>
			<textarea name="message" class="textCtrl Elastic" rows="2" autofocus="true"></textarea>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Post Comment' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
