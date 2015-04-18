<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Revert Page Archive' . ': ' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('wiki/archive/revert', $history, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Revert Page Archive' . '</dt>
		<dd>
			' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to revert this archived page?' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Revert Page Archive' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
