<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Template' . ': ' . htmlspecialchars($template['template_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('wiki/special/delete-template', $template, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Delete Template' . '</dt>
		<dd>
			' . htmlspecialchars($template['template_name'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to delete this template?' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Delete Template' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
