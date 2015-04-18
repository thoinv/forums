<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Reassign Resources';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/inline-mod/reassign', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to reassign ' . htmlspecialchars($resourceCount, ENT_QUOTES, 'UTF-8') . ' resource(s)?' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_new_user">' . 'New Owner' . ':</label></dt>
		<dd><input type="text" name="username" id="ctrl_new_user" class="textCtrl AutoComplete AcSingle" /></dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Reassign resources' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($resourceIds AS $resourceId)
{
$__output .= '
		<input type="hidden" name="resources[]" value="' . htmlspecialchars($resourceId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
