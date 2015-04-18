<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Explore User\'s Albums';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/explore-user', false, array()) . '" method="post"
	class="xenForm AutoValidator formOverlay" data-redirect="on">
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_with">' . 'User name is' . ':</label></dt>
		<dd>
			<input type="text" name="username" class="textCtrl AutoComplete AcSingle" id="ctrl_with" autofocus="true"
				data-autoSubmit="true" placeholder="' . 'Type username' . '..." value="" />
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
